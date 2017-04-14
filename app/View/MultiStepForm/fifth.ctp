<?php
//debug($this->request->data);
echo $this->Form->create('Applicant', array('id' => 'Misc_Details', 'url' => Router::url( null, true ))); ?>
<div class="main_content_header">5.  Peer Recognition</div>
<table id="peer_recognition_table" border="2px solid black" style="border-collapse: collapse; border-right: 2px solid black !important;">
    <tr>
        <td width="10%"><?php echo $this->Form->label('Award_Honours', 'Award/honours'); ?></td>
        <td width="30%"><?php echo $this->Form->label('Agency', 'Agency'); ?></td>
        <td width="15%"><?php echo $this->Form->label('Year', 'Year'); ?></td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Applicant.id', array('type' => 'hidden'));
//                  /echo $this->Form->input('Applicant.applicant_id', array('label' => false, 'type' => 'hidden', 'value' => $this->Session->read('applicant_id'))); 
                  echo $this->Form->input('Applicant.award_honour1', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.agency1', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.year1', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Applicant.award_honour2', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.agency2', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.year2', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Applicant.award_honour3', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.agency3', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.year3', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
</table>
<br/>
<div class="main_content_header">6. Referees </div>
<div id="contentContainer">
    <div class="table_headertxt">Names and complete postal addresses of 3 referees: </div>
    <table id="referee_table" border="2px solid black" style="border-collapse: collapse; border-right: 2px solid black !important;">
        <tr>
            <td width="25%"></td>
            <td width="25%"><?php echo $this->Form->label('Referee1', 'Referee-1'); ?></td>
            <td width="25%"><?php echo $this->Form->label('Referee2', 'Referee-2'); ?></td>
            <td width="25%"><?php echo $this->Form->label('Referee3', 'Referee-3'); ?></td>    
        </tr>
        <tr>
            <td>Name & complete postal addresses</td>
            <td><?php //echo $this->Form->input('Applicant.id', array('type', 'hidden'));
                      //echo $this->Form->input('Applicant.user_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));
                      echo $this->Form->input('Applicant.ref_add1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_add2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_add3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $this->Form->input('Applicant.ref_email1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_email2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_email3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Phone (Landline) with STD Code:</td>
            <td><?php echo $this->Form->input('Applicant.ref_landline1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_landline2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_landline3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Mobile Ph:</td>
            <td><?php echo $this->Form->input('Applicant.ref_mobile1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_mobile2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_mobile3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Fax:</td>
            <td><?php echo $this->Form->input('Applicant.ref_fax1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_fax2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_fax3', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
    <br />
    <div class="main_content_header">7. Present Position</div>
    <table id="present_position_table" border="2px solid black" style="border-collapse: collapse; border-right: 2px solid black !important;">
        <tr>
            <td width="10%"><?php echo $this->Form->label('Designation', 'Designation'); ?></td>
            <td width="30%"><?php echo $this->Form->label('NameoftheUniversityInstitution', 'Name of the University/Institution'); ?></td>
            <td width="15%"><?php echo $this->Form->label('BasicPay', 'Basic Pay(Rs.)'); ?></td>
            <td width="20%"><?php echo $this->Form->label('PayScale', 'Grade Pay(Rs.)'); ?></td>
            <td width="15%"><?php echo $this->Form->label('GrossPay', 'Gross Pay/Total Salary p.m. (Rs.)'); ?></td>
            <td width="10%"><?php echo $this->Form->label('IncrementDate', 'Increment date(Date/Month)'); ?></td>
            <!--<td width="10%"><?php echo $this->Form->label('SrNoOfProof', 'Sr. no. of proof enclosed'); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Applicant.presentp_desig', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_nameuniv', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_basic_pay', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_pay_scale', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_gross_salary', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_increment_date', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Applicant.presentp_sr_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
    </table>
    <table>
        <tr>
            <td class="table_headertxt" style="width: 30%">Minimum time required for joining, if selected:</td>
            <td style="width: 30%"><?php echo $this->Form->input('Applicantext.id', array('type' => 'hidden')); 
                                        echo $this->Form->input('Applicantext.time_req_for_joining', array('label' => false, 'maxlength' => '500')); ?></td>
            <td></td>
        </tr>
    </table>
    <div class="main_content_header">8. Miscellaneous</div>
    <table>
        <tr>
            <td class="table_headertxt misc_col1">Any other information relevant to the post applied for:</td>
            <td colspan="2" style="width: 55%"><?php echo $this->Form->input('Applicant.any_other_info', array('label' => false, 'maxlength' => '500'));  ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Membership in Professional Bodies</td>
            <td colspan="2">
                <?php echo $this->Form->input('Applicantext.mem_pro_bodies', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'mem_pro_bodies_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?>
                <?php echo $this->Form->input('Applicantext.mem_pro_bodies', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'mem_pro_bodies_no',
                            'options' => array('no' => 'No'),
                        )); ?>
            </td>
        </tr>
        <tr>
            <td class="mem_details table_headertxt misc_col1">Membership Details</td>
            <td class="mem_details" colspan="2" style="width: 55%">
                <?php echo $this->Form->input('Applicantext.mem_details', array('label' => false, 
                                                                                'maxlength' => '1000',
                                                                                'formnovalidate' => false)); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Have you ever been punished during your service or convicted by a court of law?</td>
            <td colspan="2">
                <?php echo $this->Form->input('Applicantext.convicted', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'convicted_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?>
                <?php echo $this->Form->input('Applicantext.convicted', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'convicted_no',
                            'options' => array('no' => 'No'),
                        )); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Do you have any case pending against you in any court of law?</td>
            <td colspan="2">
                <?php echo $this->Form->input('Applicantext.pending_court', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'pending_court_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?>
                <?php echo $this->Form->input('Applicantext.pending_court', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'pending_court_no',
                            'options' => array('no' => 'No'),
                        )); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Total number of self-attested documents attached with the hard copy of the application form (Applications without self attested testimonials/documents will not be entertained):</td>
            <td colspan="2" style="width: 55%">
                <?php echo $this->Form->input('Applicant.total_self_att_docs_att', array('label' => false, 'maxlength' => '500')); ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">Are you willing to accept the minimum initial pay in the grade? If no, state reason(s)</td>
            <td colspan="2">
                <?php echo $this->Form->input('Applicantext.willg_min_pay', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'willg_min_pay_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?>
                <?php echo $this->Form->input('Applicantext.willg_min_pay', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'willg_min_pay_no',
                            'options' => array('no' => 'No'),
                        )); ?>
            </td>
        </tr>
        <tr>
            <td class="min_pay_reason" colspan="3" style="width: 100%">
                <?php echo $this->Form->input('Applicantext.min_pay_no', array('label' => false, 'maxlength' => '1000')); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1">If selected how would you like to develop your Department/University and your area of interest (only in 200 words):</td>
            <td colspan="2" style="width: 55%"><?php echo $this->Form->input('Applicant.develop_department', array('label' => false, 'maxlength' => '1500'));  ?></td>
        </tr>
    </table>
    <!--
    <table>
        <tr>
            <td class="table_headertxt misc_col1">Any other information relevant to the post applied for:</td>
            <td colspan="2" style="width: 55%"><?php echo $this->Form->input('Applicant.any_other_info', array('label' => false, 'maxlength' => '500'));  ?></td>
        </tr>
    </table>-->
</div>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>
<script>
    $(document).ready(function() {
        $('.mem_details').each(function(){
            $(this).css('display','none');
        });
        
        $('.min_pay_reason').each(function(){
            $(this).css('display','none');
        });
        
        if($("input[name='data[Applicantext][mem_pro_bodies]']:checked").val() == "yes") {
             $('.mem_details').each(function(){
                    $(this).css('display','table-cell');
                });
        };
        
        if($("input[name='data[Applicantext][willg_min_pay]']:checked").val() == "no") {
            $('.min_pay_reason').each(function(){
                    $(this).css('display','table-cell');
                });
        };
        
        $("input[name='data[Applicantext][mem_pro_bodies]']").change(function(){
            if($(this).val() === 'yes') {
                $('.mem_details').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.mem_details').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        $("input[name='data[Applicantext][willg_min_pay]']").change(function(){
            if($(this).val() === 'no') {
                $('.min_pay_reason').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.min_pay_reason').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        <?php 
        if(isset($json_radio)) {
            foreach ($json_radio as $key => $value) {
                if(key($value) == "willg_min_pay" && $value[key($value)] == "no") {
                    echo "$('.min_pay_reason').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n"; 
                }
                else if(key($value) == "mem_pro_bodies" && $value[key($value)] == "yes") {
                    echo "$('.mem_details').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n";
                }
                //echo "$(\":radio[name='data[Applicant][" . key($value) . "]'][value='" . $value[key($value)] . "']\").prop('checked', true);\n";
                //echo "// 12";
            }
        }
        ?>
                
    });
</script>