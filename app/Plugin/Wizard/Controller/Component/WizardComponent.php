<?php
/**
 * Wizard component by jaredhoyt (forked by prilka).
 *
 * Handles multi-step form navigation, data persistence, validation callbacks, and plot-branching navigation.
 *
 * PHP version 5
 *
 * Comments and bug reports welcome at jaredhoyt AT gmail DOT com
 *
 * Licensed under The MIT License
 *
 * @writtenby		jaredhoyt, prilka
 * @lastmodified	Date: Nov 8, 2012 
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */ 
class WizardComponent extends Component {
/**
 * The Component will redirect to the "expected step" after a step has been successfully
 * completed if autoAdvance is true. If false, the Component will redirect to 
 * the next step in the $steps array. (This is helpful for returning a user to 
 * the expected step after editing a previous step w/o them having to navigate through
 * each step in between.)
 *
 * @var boolean
 */
	public $autoAdvance = true;
/**
 * Option to automatically reset if the wizard does not follow "normal"
 * operation. (ie. manual url changing, navigation away and returning, etc.)
 * Set this to false if you want the Wizard to return to the "expected step"
 * after invalid navigation.
 *
 * @var boolean
 */
	public $autoReset = false;
/**
 * If no processCallback() exists for the current step, the component will automatically
 * validate the model data against the models included in the controller's uses array.
 *
 * @var boolean
 */
	public $autoValidate = false;
/**
 * List of steps, in order, that are to be included in the wizard.
 *		basic example: $steps = array('contact', 'payment', 'confirm');
 * 
 * The $steps array can also contain nested steps arrays of the same format but must be wrapped by a branch group.
 * 		plot-branched example: $steps = array('job_application', array('degree' => array('college', 'degree_type'), 'nodegree' => 'experience'), 'confirm');
 *
 * The 'branchnames' (ie 'degree', 'nodegree') are arbitrary but used as selectors for the branch() and unbranch() methods. Branches
 * can point to either another steps array or a single step. The first branch in a group that hasn't been skipped (see branch())
 * is included by default (if $defaultBranch = true). 
 *
 * @var array
 */
	public $steps = array();
/**
 * Controller action that processes your step. 
 *
 * @var string
 */
	public $wizardAction = 'wizard';
/**
 * Url to be redirected to after the wizard has been completed.
 * Controller::afterComplete() is called directly before redirection.
 *
 * @var mixed
 */
	public $completeUrl = '/';
/**
 * Url to be redirected to after 'Cancel' submit button has been pressed by user.
 *
 * @var mixed
 */
	public $cancelUrl = '/';
/**
 * Url to be redirected to after 'Draft' submit button has been pressed by user.
 *
 * @var mixed
 */
	public $draftUrl = '/';
/**
 * If true, the first "non-skipped" branch in a group will be used if a branch has
 * not been included specifically.
 *
 * @var boolean
 */
	public $defaultBranch = true;
/**
 * If true, the user will not be allowed to edit previously completed steps. They will be
 * "locked down" to the current step.
 *
 * @var boolean
 */	
	public $lockdown = false;
/**
 * If true, the component will render views found in views/{wizardAction}/{step}.ctp rather
 *  than views/{step}.ctp.
 *
 * @var boolean
 */	
	public $nestedViews = false;
/**
 * Internal step tracking.
 *
 * @var string
 */
	protected $_currentStep = null;
/**
 * Holds the session key for data storage.
 *
 * @var string
 */
	protected $_sessionKey = null;
/**
 * Other session keys used.
 *
 * @var string
 */
	protected $_configKey = null;
	protected $_branchKey = null;
/**
 * Holds the array based url for redirecting.
 * 
 * @var array
 */
	protected $_wizardUrl = array();
/**
 * Other components used.
 *
 * @var array
 */
	public $components = array('Session');
/**
 * Initializes WizardComponent for use in the controller
 *
 * @param object $controller A reference to the instantiating controller object
 */
	public function initialize(Controller $controller) {
		$this->controller = $controller;
		
		$this->_sessionKey	= $this->Session->check('Wizard.complete') ? 'Wizard.complete' : 'Wizard.' . $controller->name;
		$this->_configKey 	= 'Wizard.config';
		$this->_branchKey	= 'Wizard.branches.' . $controller->name;
	}
/**
 * Component startup method.
 *
 * @param object $controller A reference to the instantiating controller object
 */	
	public function startup(Controller $controller) {		
		$this->steps = $this->_parseSteps($this->steps);
		
		$this->config('wizardAction', $this->wizardAction);
		$this->config('steps', $this->steps);
		
		if (!in_array('Wizard.Wizard', $this->controller->helpers) && !array_key_exists('Wizard.Wizard', $this->controller->helpers)) {
			$this->controller->helpers[] = 'Wizard.Wizard';
		}
	}
/**
 * Main Component method.
 *
 * @param string $step Name of step associated in $this->steps to be processed.
 * @param array $actionParams Params to pass to the action.
 */		
	public function process($step, $actionParams = array()) {
		if (isset($this->controller->request->data['Cancel'])) {
			if (method_exists($this->controller, '_beforeCancel')) {
				$this->controller->_beforeCancel($this->_getExpectedStep());
			}
			$this->reset();
			$this->controller->redirect($this->cancelUrl);
		}
		if (isset($this->controller->request->data['Draft'])) {
			if (method_exists($this->controller, '_saveDraft')) {
				$draft = array('_draft' => array('current' => array('step' => $step, 'data' => $this->controller->request->data)));	
				$this->controller->_saveDraft(array_merge_recursive((array)$this->read(), $draft));
			}
			
			$this->reset();
			$this->controller->redirect($this->draftUrl);
		} 
		
		if (empty($step)) {
			if ($this->Session->check('Wizard.complete')) { 
				if (method_exists($this->controller, '_afterComplete')) {
					$this->controller->_afterComplete();
				}
				$this->reset();
				$this->controller->redirect($this->completeUrl);
			}
			
			$this->autoReset = false;
		} elseif ($step == 'reset') {
			if (!$this->lockdown) {
				$this->reset();
			}
		} else {
			if ($this->_validStep($step)) {
				$this->_setCurrentStep($step);
												
				if (!empty($this->controller->request->data) && !isset($this->controller->request->data['Previous'])) { 
					$proceed = false;
					
					$processCallback = '_' . Inflector::variable('process_' . $this->_currentStep);
					if (method_exists($this->controller, $processCallback)) {
						$proceed = call_user_func_array(array($this->controller, $processCallback), $actionParams);
					} elseif ($this->autoValidate) {
						$proceed = $this->_validateData();
					} else {
						trigger_error(__('Process Callback not found. Please create Controller::%s', $processCallback), E_USER_WARNING);
					}
					
					if ($proceed) {
						$this->save();
					
						if (next($this->steps)) {
							if ($this->autoAdvance) {
								$this->redirect();
							}
							$this->redirect(current($this->steps));
						} else {
							$this->Session->write('Wizard.complete', $this->read());		
							$this->reset();
							
							$this->controller->redirect($this->wizardAction);
						}
					}
				} elseif (isset($this->controller->request->data['Previous']) && prev($this->steps)) { 
					$this->redirect(current($this->steps));
				} elseif ($this->Session->check("$this->_sessionKey._draft.current")) {
					$this->controller->request->data = $this->read('_draft.current.data');
					$this->Session->delete("$this->_sessionKey._draft.current");
				} elseif ($this->Session->check("$this->_sessionKey.$this->_currentStep")) {
					$this->controller->request->data = $this->read($this->_currentStep);
				}
			
				$prepareCallback = '_' . Inflector::variable('prepare_' . $this->_currentStep);
				if (method_exists($this->controller, $prepareCallback)) {
					call_user_func_array(array($this->controller, $prepareCallback), $actionParams);
				}
				
				$this->config('activeStep', $this->_currentStep);
				
				if ($this->nestedViews) {
					$this->controller->viewPath .= DS . $this->wizardAction;
				}
		
				return $this->controller->autoRender ? $this->controller->render($this->_currentStep) : true;
			} else {
				trigger_error(__('Step validation: %s is not a valid step.', $step), E_USER_WARNING);
			}
		}
	
		if ($step != 'reset' && $this->autoReset) {
			$this->reset();
		}

		$this->redirect();
	}
/**
 * Selects a branch to be used in the steps array. The first branch in a group is included by default.
 *
 * @param string $name Branch name to be included in steps.
 * @param boolean $skip Branch will be skipped instead of included if true.
 */	
	public function branch($name, $skip = false) {	
		$branches = array();
		
		if ($this->Session->check($this->_branchKey)) {
			$branches = $this->Session->read($this->_branchKey);
		}
		
		if (isset($branches[$name])) {
			unset($branches[$name]);
		}
		
		$value = $skip ? 'skip' : 'branch';
		$branches[$name] = $value;
		
		$this->Session->write($this->_branchKey, $branches);
	}
/**
 * Saves configuration details for use in WizardHelper or returns a config value. 
 * This is method usually handled only by the component.
 *
 * @param string $name Name of configuration variable.
 * @param mixed $value Value to be stored.
 * @return mixed 
 */	
	public function config($name, $value = null) {
		if ($value == null) {
			return $this->Session->read("$this->_configKey.$name");
		}
		$this->Session->write("$this->_configKey.$name", $value);
	}
/**
 * Loads previous draft session. 
 * 
 * @param array $draft Session data of same format passed to Controller::_saveDraft()
 * @see WizardComponent::process()
 */
	public function loadDraft($draft = array()) {
		if (!empty($draft['_draft']['current']['step'])) {
			$this->restore($draft);
			$this->redirect($draft['_draft']['current']['step']);
		}
		$this->redirect();
	}
/**
 * Get the data from the Session that has been stored by the WizardComponent.
 *
 * @param mixed $name The name of the session variable (or a path as sent to Set.extract)
 * @return mixed The value of the session variable
 */
	public function read($key = null) {
		$sessionKey = $this->_sessionKey;
		if(!is_null($key)) {
			$sessionKey .= ".$key";
		}		
		return $this->Session->read($sessionKey);
	}
	
/**
 * Saves wizard-data into the session.
 *
 * @param string|null $key Name / path of the session variable. NULL = Set / replace all wizard-data
 * @param mixed $data The value to store.
 * @return boolean
 */	
	public function write($key, $data) {
		$sessionKey = $this->_sessionKey;
		if(!is_null($key)) {
			$sessionKey .= ".$key";
		}
		return $this->Session->write($sessionKey, $data);
	}	
	
	/**
	 * Convenience method to read / write step-data
	 * 
	 * @param $step Name of the step. NULL = current step
	 * @param $data Data to save for the step. NULL = read step-data instead of write.
	 * @return mixed TRUE/FALSE on save, else array with step-data.
	 */
	public function data($step = null, $data = null) {
		if (is_null($step)) {
			$step = $this->_currentStep;
		}
		if (is_null($data)) {
			return $this->read($step);
		}
		else {
			return $this->write($step, $data);
		}
	}
/**
 * Handles Wizard redirection. A null url will redirect to the "expected" step.
 *
 * @param string $step Stepname to be redirected to.
 * @param integer $status Optional HTTP status code (eg: 404)
 * @param boolean $exit If true, exit() will be called after the redirect
 * @see Controller::redirect()
 */
	public function redirect($step = null, $status = null, $exit = true) {
		if ($step == null) {
			$step = $this->_getExpectedStep();
		}
		$url = array('controller' => Inflector::underscore($this->controller->name), 'action' => $this->wizardAction, $step);
		$this->controller->redirect($url, $status, $exit);
	}
/**
 * Resets the wizard by deleting the wizard session.
 *
 */	
	public function resetWizard() {
		$this->reset();
	}
/**
 * Resets the wizard by deleting the wizard session.
 *
 */		
	public function reset() {
		$this->Session->delete($this->_branchKey);
		$this->Session->delete($this->_sessionKey);
	}
/**
 * Sets data into controller's wizard session. Particularly useful if the data
 * originated from WizardComponent::read() as this will restore a previous session.
 * 
 * @param array $data Data to be written to controller's wizard session.
 */
	public function restore($data = array()) {
		$this->Session->write($this->_sessionKey, $data);
	}
/**
 * Saves the data from the current step into the Session.
 *
 * Please note: This is normally called automatically by the component after 
 * a successful _processCallback, but can be called directly for advanced navigation purposes.
 *
 */		
	public function save($step = null, $data = null) {
		if (is_null($step)) {
			$step = $this->_currentStep;
		}
		if (is_null($data)) {
			$data = $this->controller->request->data;
		}		
		
		$this->write($step, $data);
	}
/**
 * Removes a branch from the steps array.
 *
 * @param string $branch Name of branch to be removed from steps array.
 */	
	public function unbranch($branch) {
		$this->Session->delete("$this->_branchKey.$branch");
	}
/**
 * Finds the first incomplete step (i.e. step data not saved in Session).
 *
 * @return string $step or false if complete
 */	
	protected function _getExpectedStep() {
		foreach ($this->steps as $step) {
			if (!$this->Session->check("$this->_sessionKey.$step")) {
				$this->config('expectedStep', $step);	
				return $step;
			}
		}
		return false;
	}
/**
 * Saves configuration details for use in WizardHelper.
 *
 * @return mixed
 */		
	protected function _branchType($branch) {
		if ($this->Session->check("$this->_branchKey.$branch")) {
			return $this->Session->read("$this->_branchKey.$branch");
		}
		return false;
	}
/**
 * Parses the steps array by stripping off nested arrays not included in the branches
 * and returns a simple array with the correct steps. 
 *
 * @param array $steps Array to be parsed for nested arrays and returned as simple array.
 * @return array
 */	
	protected function _parseSteps($steps) {
		$parsed = array();

		foreach ($steps as $key => $name) {
			if (is_array($name)) { 
				foreach ($name as $branchName => $step) {
					$branchType = $this->_branchType($branchName);

					if ($branchType) {
						if ($branchType !== 'skip') {
							$branch = $branchName;
						}
					} elseif (empty($branch) && $this->defaultBranch) {
						$branch = $branchName;
					}
				}
				
				if (!empty($branch)) {
					if (is_array($name[$branch])) {
						$parsed = array_merge($parsed, $this->_parseSteps($name[$branch]));
					} else {
						$parsed[] = $name[$branch];
					}
				}
			} else {
				$parsed[] = $name;
			}
		}
		return $parsed;
	}
/**
 * Moves internal array pointer of $this->steps to $step and sets $this->_currentStep.
 *
 * @param $step Step to point to.
 */		
	protected function _setCurrentStep($step) {
		$this->_currentStep = reset($this->steps);
		
		while(current($this->steps) != $step) {
			$this->_currentStep = next($this->steps);
		}
	}
/**
 * Validates controller data with the correct model if the model is included in
 * the controller's uses array. This only occurs if $autoValidate = true and there
 * is no processCallback in the controller for the current step.
 *
 * @return boolean
 */	
	protected function _validateData() {
		$controller = $this->controller;
		
		if(is_array($controller->uses)) {
    		foreach ($controller->request->data as $model => $data) {
    			if (in_array($model, $controller->uses)) {
    				$controller->{$model}->set($data);
    				
    				if (!$controller->{$model}->validates()) {
    					return false;
    				}
    			}
    		}
		}
		return true;
	}
/**
 * Validates the $step in two ways:
 *   1. Validates that the step exists in $this->steps array.
 *   2. Validates that the step is either before or exactly the expected step.
 *
 * @param $step Step to validate.
 * @return mixed
 */		
	protected function _validStep($step) {
		if (in_array($step, $this->steps)) {
			if ($this->lockdown) {
				return (array_search($step, $this->steps) == array_search($this->_getExpectedStep(), $this->steps));
			}
			return (array_search($step, $this->steps) <= array_search($this->_getExpectedStep(), $this->steps));
		}
		return false;
	}
}
