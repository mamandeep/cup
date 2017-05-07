<?php
echo $this->Html->script('experience');

echo $this->Form->create('Experience', array('id' => 'Experience_Details', 'url' => Router::url( null, true ))); ?>
<div class="main_content_header">3. Chronological list of Experience (starting from Current Employment)</div>
<input type="hidden" name="modified" id="modified" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<fieldset>
    <!--<legend><?php echo __('Educational Qualifications');?></legend>-->
    <table id="grade-table">
        <thead>
            <tr>
                <th rowspan="2">Designation</th>
                <th rowspan="2">Scale of Pay</th>
                <th rowspan="2">Name & address of University / Institution</th>
                <th rowspan="2">Organization / Institute</th>
                <th colspan="3">Period of Experience</th>
                <th rowspan="2">Nature Of Work</th>
                <th rowspan="2">&nbsp;</th>
            </tr>
            <tr>
                <th>From Date <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>To Date <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>No. of Years / Months (as on last date of online form)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Experience'])) {
                    for ($key = 0; $key < count($this->request->data['Experience']); $key++) {
                        echo $this->element('experience', array('key' => $key, 'org' => (!empty($this->request->data['Experience'][$key]['institute_type']) ? $this->request->data['Experience'][$key]['institute_type'] : 'Central Government')));

                        //var attri1 = 'input[name$="data[Experience]['+ $key + '][from_date]"]';
                        //var attri2 = 'input[name$="data[Experience]['+ $key + '][to_date]"]';
                        //var attri3 = 'input[name$="data[Experience]['+ $key + '][no_of_yrs_mnths]"]';
                        echo "<script>";
                        echo "$('input[name$=\"data[Experience][" . $key . "][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experience][" . $key . "][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experience][" . $key . "][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experience][" . $key . "][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths_days]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experience][" . $key . "][from_date]\"]', 'input[name$=\"data[Experience][" . $key . "][to_date]\"]', 'input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths_days]\"]');
                        });";
                        echo "</script>";
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <br/><br/>
    <div style="font-family: sans-serif; font-weight: bold; font-size: 20px; text-decoration-line: underline;">TEACHING EXPERIENCE ACQUIRED SIMULTANEOUSLY DURING PH.D.</div>
    <table id="grade-table">
        <thead>
            <tr>
                <th rowspan="2">Designation</th>
                <th rowspan="2">Scale of Pay</th>
                <th rowspan="2">Name & address of University / Institution</th>
                <th rowspan="2">Organization / Institute</th>
                <th colspan="3">Period of Experience</th>
                <th rowspan="2">Nature Of Service (Full Time)</th>
                <th rowspan="2">Work Load as per UGC Norms</th>
                <th rowspan="2">Fulfilled the minimum eligibility conditions as per UGC and concerned statutory bodies at the time of appointment</th>
                <th rowspan="2">Any leave taken during this period for Ph.D. research</th>                
            </tr>
            <tr>
                <th>From Date <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>To Date <span style="font-size: 12px;">(DD/MM/YYYY)</span></th>
                <th>No. of Years / Months (as on last date of online form)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Experiencephd.0.id") ?>
                    <?php echo $this->Form->hidden("Experiencephd.0.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->text("Experiencephd.0.designation"); ?>
                </td>   
                <td>
                    <?php echo $this->Form->text("Experiencephd.0.scale_of_pay"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.0.name_address"); ?>
                </td>
                <td>
                    <?php 
                                echo $this->Form->input("Experiencephd.0.institute_type", array(
                                'options' => array('Central Government' => 'Central Govt.',
                                                   'State Government' => 'State Govt.',
                                                   'Autonomous' => 'Autonomous',
                                                   'Government Aided' => 'Govt. Aided',
                                                   'Private' => 'Private',
                                                   'Other' => 'Other'),
                                'label' => false,
                                'empty' => ['select' => 'Select']
                            ));
                             ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.0.from_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.0.to_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.0.no_of_mnths_yrs"); ?>
                    <?php 
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][0][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][0][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][0][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][0][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][0][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][0][from_date]\"]', 'input[name$=\"data[Experiencephd][0][to_date]\"]', 'input[name$=\"data[Experiencephd][0][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.0.nature_of_service", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.0.work_load", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.0.minimum_eligibility", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.0.leave_taken", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Experiencephd.1.id") ?>
                    <?php echo $this->Form->hidden("Experiencephd.1.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->text("Experiencephd.1.designation"); ?>
                </td>   
                <td>
                    <?php echo $this->Form->text("Experiencephd.1.scale_of_pay"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.1.name_address"); ?>
                </td>
                <td>
                    <?php 
                                echo $this->Form->input("Experiencephd.1.institute_type", array(
                                'options' => array('Central Government' => 'Central Govt.',
                                                   'State Government' => 'State Govt.',
                                                   'Autonomous' => 'Autonomous',
                                                   'Government Aided' => 'Govt. Aided',
                                                   'Private' => 'Private',
                                                   'Other' => 'Other'),
                                'label' => false,
                                'empty' => ['select' => 'Select']
                            ));
                             ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.1.from_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.1.to_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.1.no_of_mnths_yrs"); ?>
                    <?php 
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][1][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][1][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][1][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][1][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][1][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][1][from_date]\"]', 'input[name$=\"data[Experiencephd][1][to_date]\"]', 'input[name$=\"data[Experiencephd][1][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.1.nature_of_service", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.1.work_load", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.1.minimum_eligibility", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.1.leave_taken", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Experiencephd.2.id") ?>
                    <?php echo $this->Form->hidden("Experiencephd.2.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->text("Experiencephd.2.designation"); ?>
                </td>   
                <td>
                    <?php echo $this->Form->text("Experiencephd.2.scale_of_pay"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.2.name_address"); ?>
                </td>
                <td>
                    <?php 
                                echo $this->Form->input("Experiencephd.2.institute_type", array(
                                'options' => array('Central Government' => 'Central Govt.',
                                                   'State Government' => 'State Govt.',
                                                   'Autonomous' => 'Autonomous',
                                                   'Government Aided' => 'Govt. Aided',
                                                   'Private' => 'Private',
                                                   'Other' => 'Other'),
                                'label' => false,
                                'empty' => ['select' => 'Select']
                            ));
                             ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.2.from_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.2.to_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.2.no_of_mnths_yrs"); ?>
                    <?php 
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][2][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][2][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][2][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][2][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][2][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][2][from_date]\"]', 'input[name$=\"data[Experiencephd][2][to_date]\"]', 'input[name$=\"data[Experiencephd][2][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.2.nature_of_service", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.2.work_load", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.2.minimum_eligibility", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.2.leave_taken", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Experiencephd.3.id") ?>
                    <?php echo $this->Form->hidden("Experiencephd.3.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->text("Experiencephd.3.designation"); ?>
                </td>   
                <td>
                    <?php echo $this->Form->text("Experiencephd.3.scale_of_pay"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.3.name_address"); ?>
                </td>
                <td>
                    <?php 
                                echo $this->Form->input("Experiencephd.3.institute_type", array(
                                'options' => array('Central Government' => 'Central Govt.',
                                                   'State Government' => 'State Govt.',
                                                   'Autonomous' => 'Autonomous',
                                                   'Government Aided' => 'Govt. Aided',
                                                   'Private' => 'Private',
                                                   'Other' => 'Other'),
                                'label' => false,
                                'empty' => ['select' => 'Select']
                            ));
                             ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.3.from_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.3.to_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.3.no_of_mnths_yrs"); ?>
                    <?php 
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][3][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][3][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][3][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][3][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][3][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][3][from_date]\"]', 'input[name$=\"data[Experiencephd][3][to_date]\"]', 'input[name$=\"data[Experiencephd][3][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.3.nature_of_service", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.3.work_load", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.3.minimum_eligibility", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.3.leave_taken", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Experiencephd.4.id") ?>
                    <?php echo $this->Form->hidden("Experiencephd.4.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->text("Experiencephd.4.designation"); ?>
                </td>   
                <td>
                    <?php echo $this->Form->text("Experiencephd.4.scale_of_pay"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.4.name_address"); ?>
                </td>
                <td>
                    <?php 
                                echo $this->Form->input("Experiencephd.4.institute_type", array(
                                'options' => array('Central Government' => 'Central Govt.',
                                                   'State Government' => 'State Govt.',
                                                   'Autonomous' => 'Autonomous',
                                                   'Government Aided' => 'Govt. Aided',
                                                   'Private' => 'Private',
                                                   'Other' => 'Other'),
                                'label' => false,
                                'empty' => ['select' => 'Select']
                            ));
                             ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.4.from_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.4.to_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.4.no_of_mnths_yrs"); ?>
                    <?php 
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][4][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][4][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][4][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][4][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][4][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][4][from_date]\"]', 'input[name$=\"data[Experiencephd][4][to_date]\"]', 'input[name$=\"data[Experiencephd][4][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.4.nature_of_service", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.4.work_load", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.4.minimum_eligibility", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.4.leave_taken", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Experiencephd.5.id") ?>
                    <?php echo $this->Form->hidden("Experiencephd.5.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->text("Experiencephd.5.designation"); ?>
                </td>   
                <td>
                    <?php echo $this->Form->text("Experiencephd.5.scale_of_pay"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.5.name_address"); ?>
                </td>
                <td>
                    <?php 
                                echo $this->Form->input("Experiencephd.5.institute_type", array(
                                'options' => array('Central Government' => 'Central Govt.',
                                                   'State Government' => 'State Govt.',
                                                   'Autonomous' => 'Autonomous',
                                                   'Government Aided' => 'Govt. Aided',
                                                   'Private' => 'Private',
                                                   'Other' => 'Other'),
                                'label' => false,
                                'empty' => ['select' => 'Select']
                            ));
                             ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.5.from_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.5.to_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.5.no_of_mnths_yrs"); ?>
                    <?php 
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][5][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][5][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][5][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][5][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][5][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][5][from_date]\"]', 'input[name$=\"data[Experiencephd][5][to_date]\"]', 'input[name$=\"data[Experiencephd][5][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.5.nature_of_service", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.5.work_load", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.5.minimum_eligibility", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.5.leave_taken", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Experiencephd.6.id") ?>
                    <?php echo $this->Form->hidden("Experiencephd.6.applicant_id", array('value' => $this->Session->read('applicant_id'))); ?>
                    <?php echo $this->Form->text("Experiencephd.6.designation"); ?>
                </td>   
                <td>
                    <?php echo $this->Form->text("Experiencephd.6.scale_of_pay"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.6.name_address"); ?>
                </td>
                <td>
                    <?php 
                                echo $this->Form->input("Experiencephd.6.institute_type", array(
                                'options' => array('Central Government' => 'Central Govt.',
                                                   'State Government' => 'State Govt.',
                                                   'Autonomous' => 'Autonomous',
                                                   'Government Aided' => 'Govt. Aided',
                                                   'Private' => 'Private',
                                                   'Other' => 'Other'),
                                'label' => false,
                                'empty' => ['select' => 'Select']
                            ));
                             ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.6.from_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.6.to_date"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Experiencephd.6.no_of_mnths_yrs"); ?>
                    <?php 
                        echo "<script>";
                        echo "$('input[name$=\"data[Experiencephd][6][from_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][6][from_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][6][to_date]\"]').on('focusout', function(){
                            dateFormatCheck('input[name$=\"data[Experiencephd][6][to_date]\"]');
                        });";
                        echo "$('input[name$=\"data[Experiencephd][6][no_of_mnths_yrs]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experiencephd][6][from_date]\"]', 'input[name$=\"data[Experiencephd][6][to_date]\"]', 'input[name$=\"data[Experiencephd][6][no_of_mnths_yrs]\"]');
                        });";
                        echo "</script>";
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.6.nature_of_service", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td>
                <td>
                    <?php echo $this->Form->input("Experiencephd.6.work_load", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.6.minimum_eligibility", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input("Experiencephd.6.leave_taken", array(
                        'options' => array(
                            'Yes' => 'Yes',
                            'No' => 'No'
                        ),
                        'label' => false,
                        'empty' => ['select' => 'Select']
                     )); ?>
                </td> 
            </tr>
        </tbody>
    </table>
    <table>
        <tr>
            <td>Total period of experience
            <?php echo $this->Form->input('Applicant.id', array('type' => 'hidden')); ?>
            <td>Years</td>
            <td><?php echo $this->Form->input('Applicant.tot_exp_years', array('label' => false, 'maxlength' => '500')); ?></td>
            <td>Months</td>
            <td><?php echo $this->Form->input('Applicant.tot_exp_mnths', array('label' => false, 'maxlength' => '500')); ?></td>
            <td>Days</td>
            <td><?php echo $this->Form->input('Applicant.tot_exp_days', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="table_headertxt">Gaps in experience: If yes, give reason(s) </td>
            <td><?php 
                      echo $this->Form->input('Applicant.gaps_in_experience', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
</fieldset>
<script id="grade-template" type="text/x-underscore-template">
    <?php echo $this->element('experience'); ?>
</script>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>
<script>
    function checkleapyear(datea)
    {
        if(datea.getYear()%4 == 0)
        {
            if(datea.getYear()% 10 != 0)
            {
                return true;
            }
            else
            {
                if(datea.getYear()% 400 == 0)
                    return true;
                else
                    return false;
            }
        }
        return false; 
    } 
    
    function DaysInMonth(Y, M) {
        with (new Date(Y, M, 1, 12)) {
            setDate(0);
            return getDate();
        } 
    } 

    function datediff(date1, date2) {
        var y1 = date1.getFullYear(), m1 = date1.getMonth(), d1 = date1.getDate(),
        y2 = date2.getFullYear(), m2 = date2.getMonth(), d2 = date2.getDate();
        if (d1 < d2) {
            m1--;
            d1 += DaysInMonth(y2, m2);
        }
        if (m1 < m2) {
            y1--;
            m1 += 12;
        }
        return [y1 - y2, m1 - m2, (d1 - d2) + 1 ]; 
    }
    
    function calDiff(from, to) {
        var dat = $(to).val().split("/");
        var date2 = new Date(dat[1]+'/'+dat[0]+'/'+dat[2]);
        var curday = date2.getDate();
        var curmon = date2.getMonth()+1;
        var curyear = date2.getFullYear();
        var dob = $(from).val().split("/");
        var calday = dob[0];
        var calmon = dob[1];
        var calyear = dob[2];
        var curd = new Date(curyear,curmon-1,curday);
        var cald = new Date(calyear,calmon-1,calday);
        var diff = Date.UTC(curyear,curmon,curday,0,0,0) - Date.UTC(calyear,calmon,calday,0,0,0);
        var dife = datediff(curd,cald);
        return dife;
    }
    
    function dateFormatCheck(attr) {
        if(attr && $(attr).val().trim() !== '') {
            var t = $(attr).val().match(/^(\d{2})\/(\d{2})\/(\d{4})$/);
            if(t === null) {
                alert('Date is not in a correct format.');
                //var diff_years = calage();
                /*if(diff_years[0] > 35) {
                    alert('Age is more than eligibilty criteria');
                }
                else {*/
                //$('.age_computed').val(diff_years[0]+' Years, ' + diff_years[1]+' Months, ' + diff_years[2]+' Days');
                //}
            }
            else {
                return true;
            }
        }
    }
    
    function calcuateDiff(from, to, diff) {
        var diff_years;
        if(dateFormatCheck(from) && dateFormatCheck(to)) {
            diff_years = calDiff(from, to);
            $(diff).val(diff_years[0]+' Y, ' + diff_years[1]+' M, ' + diff_years[2]+' D');
        }
    }
    
    $(document).ready(function () {
        
        $('#physical_disable').css('display', 'none');
        $('.age_computed').attr('disabled', 'true');
        dateFormatCheck();
        
        $("#date_of_birth").focusout(function(){
            dateFormatCheck();
        });
    });
</script>