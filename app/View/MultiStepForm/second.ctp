<?php echo $this->element('nav-top');
echo $this->Html->script('education');
//print_r($this->request->data);
echo $this->Form->create('Education', array('id' => 'Education_Details', 'url' => Router::url( null, true ), 'enctype' => 'multipart/form-data')); ?>
<div class="main_content_header">2. Educational Qualifications (in chronological order starting from Matric or equivalent and onwards)</div>
<input type="hidden" name="modified" id="modified" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<?php /*
<fieldset>
    <!--<legend><?php echo __('Educational Qualifications');?></legend>-->
    <table id="grade-table">
        <thead>
            <tr>
                <th>Name of Degree / Diploma / Certificate / Class</th>
                <th>Name of Course</th>
                <th>Board / University</th>
                <th>Grade / CGPA / Division</th>
                <th>Percentage</th>
                <th>Year of Passing</th>
                <th>Subjects</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Education'])) {
                    for ($key = 0; $key < count($this->request->data['Education']); $key++) {
                        echo $this->element('education', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <table>
        <tr>
            <td class="table_headertxt">Gaps in education: If yes, give reason(s) </td>
            <td><?php echo $this->Form->input('Applicant.id', array('type', 'hidden'));
                      echo $this->Form->input('Applicant.gaps_in_education', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
</fieldset>
*/ ?>
<fieldset>
    <!--<legend><?php echo __('Educational Qualifications');?></legend>-->
    <table id="grade-table">
        <thead>
            <tr>
                <th width="10%">Name of Degree / Diploma / Certificate / Class</th>
                <th>Name of Course</th>
                <th>Board / University</th>
                <th width="10%">Mode of Study</th>
                <th>Grade / CGPA / Division</th>
                <th>Percentage</th>
                <th>Year of Passing</th>
                <th>Subjects</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.0.id");
                          echo $this->Form->hidden("Education.0.applicant_id", array('value' => $this->Session->read('applicant_id')));
                          echo $this->Form->input('Education.0.qualification', array('type' => 'text',
                                            'readonly' => 'readonly',
                                            'value' => 'Matric',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.0.course', array('type' => 'text',
                                            'readonly' => 'readonly',
                                            'value' => 'Matric',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.0.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.0.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.1.id") ?>
                    <?php echo $this->Form->hidden("Education.1.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.1.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Higher Secondary',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.1.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.1.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.1.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.1.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.1.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.1.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.1.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.2.id") ?>
                    <?php echo $this->Form->hidden("Education.2.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.2.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Diploma',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.2.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.2.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.2.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.2.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.2.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.2.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.2.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.3.id") ?>
                    <?php echo $this->Form->hidden("Education.3.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.3.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Graduation',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.3.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.3.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.3.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.3.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.3.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.3.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.3.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.4.id") ?>
                    <?php echo $this->Form->hidden("Education.4.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.4.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Post Graduation',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.4.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.4.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.4.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.4.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.4.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.4.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.4.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.5.id") ?>
                    <?php echo $this->Form->hidden("Education.5.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.5.qualification', array('type' => 'text',
                                            'readonly' => 'readonly',
                                            'value' => 'M.Phil.',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.5.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false
                                            )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.5.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.5.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.5.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.5.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.5.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.5.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.6.id") ?>
                    <?php echo $this->Form->hidden("Education.6.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.6.qualification', array('type' => 'textarea',
                                            'readonly' => 'readonly',
                                            'value' => 'Ph.D. Awarded',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.6.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.6.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.6.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Long Distance' => 'Long Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.6.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.6.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.6.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.6.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.7.id") ?>
                    <?php echo $this->Form->hidden("Education.7.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.7.qualification', array('type' => 'textarea',
                                            'value' => 'Any Other Exam',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.7.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.7.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.7.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.7.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.7.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.7.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.7.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.8.id") ?>
                    <?php echo $this->Form->hidden("Education.8.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.8.qualification', array('type' => 'textarea',
                                            'value' => 'Any Other Exam',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.8.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.8.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.8.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.8.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.8.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.8.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.8.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.9.id") ?>
                    <?php echo $this->Form->hidden("Education.9.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.9.qualification', array('type' => 'textarea',
                                            'value' => 'Any Other Exam',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.9.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.9.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.9.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.9.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.9.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.9.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.9.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.10.id") ?>
                    <?php echo $this->Form->hidden("Education.10.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.10.qualification', array('type' => 'textarea',
                                            'value' => 'Any Other Exam',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.10.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.10.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.10.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.10.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.10.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.10.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.10.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.11.id") ?>
                    <?php echo $this->Form->hidden("Education.11.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.11.qualification', array('type' => 'textarea',
                                            'value' => 'Any Other Exam',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.11.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.11.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.11.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.11.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.11.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.11.year_of_passing", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.11.subjects", array('type' => 'textarea',
                                                'label' => false,
                                                'div' => false,
                                                'style' => 'overflow-y: scroll; height: 60px;')); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br/><br/>
    <div style="font-family: sans-serif; font-size: 20px; font-weight: bold">If Ph.D. Pursuing</div>
    <table>
        <tr>
            <th width="10%">Name of Degree / Diploma / Certificate / Class</th>
            <th>Name of Course</th>
            <th>Board / University</th>
            <th width="10%">Mode of Study</th>
            <th>Grade / CGPA / Division</th>
            <th>Percentage (%)</th>
            <th>Date of Registration (DD/MM/YYYY)</th>
        </tr>
        <tbody>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.12.id") ?>
                    <?php echo $this->Form->hidden("Education.12.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->input('Education.12.qualification', array('type' => 'textarea',
                                            'value' => 'Ph.D. Pursuing',
                                            'label' => false,
                                            'style' => 'overflow-y: scroll; height: 60px;',
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Education.12.course', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.12.board", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Education.12.mode_of_study", array(
                    'options' => array(
                        'Regular' => 'Regular',
                        'Part Time' => 'Part Time',
                        'Distance' => 'Distance'
                    ),
                    'style' => 'width: 100%;',
                    'empty' => ['select' => 'Select'],
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.12.grade", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.12.percentage", ['div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.12.year_of_passing", ['div' => false]); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br/>
    <div style="font-family: sans-serif; font-size: 20px; font-weight: bold">If you have any other qualification, upload the document in PDF format. (Click "Save & Continue" to upload file and save other information)</div>
    <?php   echo $this->Form->input('Document.id', array('type' => 'hidden'));
            echo $this->Form->input('Document.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));
            echo $this->Form->input('Document.filename6', array('label' => false, 'type' => 'file')); ?>
    <br/>
    <div style="font-family: sans-serif; font-size: 20px; font-weight: bold">UGC-NET Details</div>
    <table id="grade-table">
        <thead>
            <tr>
                <th width="10%">Name of Subject</th>
                <th>Year of Passing</th>
                <th>Roll No.</th>
                <th width="10%">Marks</th>
                <th>Total Marks</th>
                <th>Cut-off Marks</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>
                    <?php  echo $this->Form->input('Applicantugcnet.id', array('type' => 'hidden'));
                            echo $this->Form->text('Applicantugcnet.ugc_net_subject', array('type' => 'text',
                                            'label' => false,
                                            'div' => false)); ?>
                </td>
                <td>
                    <?php echo $this->Form->text('Applicantugcnet.ugc_net_mnth_yr', ['type' => 'number', 'maxlength' => '10', 'div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Applicantugcnet.ugc_net_rollno", ['type' => 'number', 'maxlength' => '10', 'div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Applicantugcnet.ugc_net_marks", ['type' => 'number', 'maxlength' => '10', 'step' => '.01', 'div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Applicantugcnet.ugc_net_total_marks", ['type' => 'number', 'maxlength' => '10', 'step' => '.01','div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Applicantugcnet.ugc_net_cutoff_marks", ['type' => 'number', 'maxlength' => '10', 'step' => '.01', 'div' => false]); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('Applicantugcnet.ugc_net_category', array(
                    'options' => array(
                        'General' => 'General',
                        'SC' => 'SC',
                        'ST' => 'ST',
                        'OBC' => 'OBC'),
                    'empty' => 'Select',
                    'style' => 'width: 100%;',
                    'label' => false,
                    'div' => false
                )); ?>
                </td>
            </tr>
    </table>
    <br/><br/>
    <div style="font-family: sans-serif; font-size: 20px; font-weight: bold; padding-left: 0px">Gaps in Education: If yes, give reason(s)</div>
    <table>
        <tr>
            <td style="font-family: sans-serif; font-size: 20px; font-weight: bold">Reason for Gap in Education 1</td>
            <td><?php echo $this->Form->input('Applicant.gaps_in_education', array('type' => 'textarea',  'div' => false, 'style' => 'overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td style="font-family: sans-serif; font-size: 20px; font-weight: bold">Reason for Gap in Education 2</td>
            <td><?php echo $this->Form->input('Applicant.gaps_in_education2', array('type' => 'textarea', 'div' => false, 'style' => 'overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td style="font-family: sans-serif; font-size: 20px; font-weight: bold">Reason for Gap in Education 3</td>
            <td><?php echo $this->Form->input('Applicant.gaps_in_education3', array('type' => 'textarea', 'div' => false, 'style' => 'overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
</fieldset>

<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('id' => 'formSubmit' , 'div' => false)); ?>
    <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); 
            echo $this->Form->button('Reset', array(
                    'type' => 'reset',
                    'div' => false            
                )); ?>
</div>

<?php echo $this->Form->end(); ?>