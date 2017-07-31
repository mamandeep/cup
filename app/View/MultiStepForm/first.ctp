<?php echo $this->element('nav-top'); 
echo $this->Form->create('Applicant', array('id' => 'Applicant_Details', 
                                'url' => Router::url( null, true ))); 
//print_r($this->request->data);
        ?>
        <table>
            <tr>
                <td><?php 
                    //echo $this->Form->input('Applicant.appId', array('type' => 'hidden'));
                    echo $this->Form->input('Applicant.id', array('type' => 'hidden'));
                    echo $this->Form->input('Applicant.advertisement_no', array(
                        'type' => 'text',
                        'readonly' => 'readonly',
                        'value' => 'T-02 (2017)'
                    )); ?></td>
                <td><?php $post = !empty($postAppliedFor) ? $postAppliedFor : '';
                //$options = array( $post => $post );
                echo $this->Form->input('Applicant.post_applied_for', array(
                    'type' => 'text',
                     'readonly' => 'readonly',
                    'value' => $post
                )); ?></td>
            </tr>
            <tr>
                <td><?php 
                    //echo $this->Form->input('Applicant.appId', array('type' => 'hidden'));
                    //echo $this->Form->input('Applicant.id', array('type' => 'hidden'));
                    echo $this->Form->input('Applicant.centre', array(
                        'type' => 'text',
                        'readonly' => 'readonly'
                    )); ?></td>
                <td><!--<?php
                echo $this->Form->input('Applicant.area', array(
                    'type' => 'text',
                     'readonly' => 'readonly',
                )); ?>--></td>
            </tr>
            <!--
            <tr>
                <td>
                    <div style="font-size: 20px; font-weight: bold; color: #0a0;">Payment Details</div>
                    <div>-->
                        <!--<span><a href="javascript:showChallan();" target="_blank">Challan</a></span>
                        <span style="margin: 0px 30px;"></span>
                        <span><a href="javascript:showDraft();" target="_blank">Draft</a></span>-->
                    <!--</div>
                </td>
                <td></td>
                <td></td>
            </tr>-->
        </table>
        <!--<table>-->
            <!--
            <tr class="challan">
                <td><?php echo $this->Form->input('Applicant.challan_no', array('label' => 'Challan No.', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.challan_date', array('label' => 'Challan Date', 'maxlength' => '500')); ?></td>
                <td></td>
            </tr>-->
            <!--
            <tr class="draft">
                <td><?php echo $this->Form->input('Applicant.appfee_dd_no', array('label' => 'DD No.', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.appfee_dd_date', array('label' => 'Date', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.appfee_dd_amt', array('label' => 'Amount', 'maxlength' => '500')); ?></td>
            </tr>
            <tr class="draft">
                <td><?php echo $this->Form->input('Applicant.appfee_dd_bank', array('label' => 'Name of the Bank', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.appfee_dd_branch', array('label' => 'Branch Name', 'maxlength' => '500')); ?></td>
                <td></td>
            </tr>
            -->
        <!--</table>-->
        <table>
            <tr>
                <td>
                    <div class="main_content_header">1. Applicant's Personal Details</div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.first_name', array('label' => 'First Name:', 'maxlength' => '500'));
                 ?></td>
                <td><?php echo $this->Form->input('Applicant.middle_name', array('label' => 'Middle Name:', 'maxlength' => '500'));
                ?></td>
                <td><?php 
                    echo $this->Form->input('Applicant.last_name', array('label' => 'Last Name:', 'maxlength' => '500'));
                ?></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.father_name', array('label' => 'Father\'s Name:', 'maxlength' => '500'));
                ?></td>
                <td><?php echo $this->Form->input('Applicant.mother_name', array('label' => 'Mother\'s Name:', 'maxlength' => '500'));
                ?></td>
                <td><?php echo $this->Form->input('Applicant.nationality', array('label' => 'Nationality:', 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.email', array('label'=>'Email:', 'maxlength' => '500'));
		?></td>
                <td><?php echo $this->Form->input('Applicant.mobile_no', array('label' => 'Mobile Number:', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.aadhar_no', array('label' => 'Aadhar Number: (xxxx xxxx xxxx)', 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.marital_status', array(
                    'options' => array('Single' => 'Single', 'Married' => 'Married'),
                    'empty' => 'Select',
                    'selected' => (!empty($maritalStatusSelected) ? $maritalStatusSelected : 'Select'),
                    'style' => 'width: 100%;'
                ));
                 ?></td>
                <td> <?php echo $this->Form->input('Applicant.category', array(
                    'options' => array(
                        'General' => 'General',
                        'SC' => 'SC',
                        'ST' => 'ST',
                        'OBC' => 'OBC'),
                    'empty' => 'Select',
                    //'selected' => (!empty($category) ? $category : 'Select'),
                    'style' => 'width: 100%;',
                    'label' => 'Category of the applicant'
                )); ?></td>
                <td><?php echo $this->Form->input('Applicant.gender', array(
                    'options' => array(
                        'Male' => 'Male',
                        'Female' => 'Female',
                        'Transgender' => 'Transgender'),
                    'empty' => 'Select',
                    'selected' => (!empty($gender) ? $gender : 'Select'),
                    'style' => 'width: 100%;'
                )); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.spouse_name', array('label' => 'If Married, specify name of the spouse: ', 'maxlength' => '500')); ?></td>
                <td> 
                    <?php echo $this->Form->input('Applicant.category_applied', array(
                    'options' => array(
                        'General' => 'General',
                        'SC' => 'SC',
                        'ST' => 'ST',
                        'OBC' => 'OBC'),
                    'empty' => 'Select',
                    //'selected' => (!empty($category) ? $category : 'Select'),
                    'style' => 'width: 100%;',
                    'label' => 'Category of the post applied for'
                )); ?></td>
                <td><?php echo $this->Form->input('Applicant.area_of_sp', array('label' => 'Area of Specialization', 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.date_of_birth', array('id' => 'date_of_birth' , 'label' => 'Date of Birth (DD/MM/YYYY)', 'maxlength' => '500')); ?></td>
                <td><label class="table_headertxt">Age as on last date to Apply: </label>
                    <input type="text" class="age_computed"></input>
                </td>
                <td><?php echo $this->Form->input('Applicant.area_sub_sp', array('label' => 'Area of Sub-Specialization', 'maxlength' => '100')); ?></td>
            </tr>
        </table>
        <br/>
        <?php
        echo $this->Form->input('Applicant.physically_disabled', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'selected' => (!empty($physically_disabled) ? $physically_disabled : 'no'),
                        'label' => 'If differently abled',
                        'id' => 'physical_disable_select'
                    )); ?>
        <table id="physical_disable">
            <tr>
                <td class="table_headertxt"></td>
                <td class="table_headertxt">If applicable write 'Yes'</td>
                <td class="table_headertxt">Percentage of disability(%)</td>
            </tr>
            <tr>
                <td>a. Blindness or low vision</td>
                <td><?php echo $this->Form->input('Applicant.blindness', array('label' => false, 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.blindness_pertge', array('label' => false, 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td>b. Hearing impairment</td>
                <td><?php echo $this->Form->input('Applicant.hearing', array('label' => false, 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.hearing_pertge', array('label' => false, 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td>c. Locomotor disability or cerebral palsy</td>
                <td><?php echo $this->Form->input('Applicant.locomotor', array('label' => false, 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.locomotor_pertge', array('label' => false, 'maxlength' => '500')); ?></td>
            </tr>
        </table>
        <br/>
        <!--
        <?php
        echo $this->Form->input('Applicant.departmental_cand', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'selected' => (!empty($departmental_cand) ? $departmental_cand : 'no'),
                        'label' => 'Are you a Departmental Candidate ?',
                        'id' => 'departmental_cand'
                    ));  ?>
        <br/>
	<br/>
        <?php
        echo $this->Form->input('Applicant.internal_cand', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'selected' => (!empty($internal_cand) ? $internal_cand : 'no'),
                        'label' => 'Are you an Internal Candidate ? (Contractual Employee)',
                        'id' => 'internal_cand'
                    ));  ?>
        -->
        <br/>
        <div class="table_headertxt">Name & Complete Address with Pincode *</div>
        <table id="address_table" border="2px solid black" style="border-collapse: collapse; border-right: 2px solid black !important;">
            <tr>
                <td width="20%"><?php echo $this->Form->label('MailingAddress', 'Mailing Address'); ?></td>
                <td width="20%" colspan='2'><?php echo $this->Form->label('PermanentAddress', 'Permanent Address'); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.mailing_address', array('label' => false, 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.permanent_address', array('label' => false, 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->label('PhoneNo', 'Phone No. (landline with STD code)'); ?></td>
                <td><?php echo $this->Form->label('FaxNo', 'Fax. No.'); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.landline', array('label' => false, 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.fax', array('label' => false, 'maxlength' => '500')); ?></td>
            </tr>
        </table>
        <?php echo $this->Form->input('Applicant.age_on_adv_yrs', array('label' => false, 'type' => 'hidden')); ?>
        <?php echo $this->Form->input('Applicant.age_on_adv_mnths', array('label' => false, 'type' => 'hidden')); ?>
        <?php echo $this->Form->input('Applicant.age_on_adv_days', array('label' => false, 'type' => 'hidden')); ?>
	<div class="submit">
            <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
            <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); 
                  echo $this->Form->button('Reset', array(
                    'type' => 'reset',
                    'div' => false            
                )); ?>
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
        return [y1 - y2, m1 - m2, d1 - d2]; 
    }
    
    function calage() {
        var dat = new Date("08/17/2017");
        var curday = dat.getDate();
        var curmon = dat.getMonth()+1;
        var curyear = dat.getFullYear();
        var dob = $("#date_of_birth").val().split("/");
        var calday = dob[0];
        var calmon = dob[1];
        var calyear = dob[2];
        var curd = new Date(curyear,curmon-1,curday);
        var cald = new Date(calyear,calmon-1,calday);
        var diff = Date.UTC(curyear,curmon,curday,0,0,0) - Date.UTC(calyear,calmon,calday,0,0,0);
        var dife = datediff(curd,cald);
        return dife;
    }
    
    function dateFormatCheck() {
        if($("#date_of_birth").val().trim() !== '') {
            var t = $("#date_of_birth").val().match(/^(\d{2})\/(\d{2})\/(\d{4})$/);
            if(t !== null) {
                var diff_years = calage();
                /*if(diff_years[0] > 35) {
                    alert('Age is more than eligibilty criteria');
                }
                else {*/
                $('.age_computed').val(diff_years[0]+' Y, ' + diff_years[1]+' M, ' + diff_years[2]+' D');
                $('input[name="data[Applicant][age_on_adv_yrs]"]').val(diff_years[0]);
                $('input[name="data[Applicant][age_on_adv_mnths]"]').val(diff_years[1]);
                $('input[name="data[Applicant][age_on_adv_days]"]').val(diff_years[2]);
                //}
            }
            else {
                $('.age_computed').val('');
                $('input[name="data[Applicant][age_on_adv_yrs]"]').val('');
                $('input[name="data[Applicant][age_on_adv_mnths]"]').val('');
                $('input[name="data[Applicant][age_on_adv_days]"]').val('');
                alert('Date of birth is not in a correct format.');
            }
        }
        else {
            $('.age_computed').val('');
            $('input[name="data[Applicant][age_on_adv_yrs]"]').val('');
            $('input[name="data[Applicant][age_on_adv_mnths]"]').val('');
            $('input[name="data[Applicant][age_on_adv_days]"]').val('');
        }
    }
    
    function aadharFormatCheck() {
        if($("input[name='data[Applicant][aadhar_no]']").val().trim() !== '') {
            var t = $("input[name='data[Applicant][aadhar_no]']").val().match(/^(\d{4}) (\d{4}) (\d{4})$/);
            if(t === null) {
                alert('Aadhar Number is not in a correct format.');
            }
        }
    }
    
    $(document).ready(function () {
        if($("#physical_disable_select option:selected").text() === "Yes") {
            $('#physical_disable').css('display', 'table');
        }
        else {
            $('#physical_disable').css('display', 'none');
        }
        $('.age_computed').attr('disabled', 'true');
        dateFormatCheck();
        
        $("#date_of_birth").focusout(function(){
            dateFormatCheck();
        });
        
        $("input[name='data[Applicant][aadhar_no]']").focusout(function(){
            aadharFormatCheck();
        });
        
        $("select[name='data[Applicant][physically_disabled]']").change(function(){
            if($(this).val() === 'no') {
                $('#physical_disable').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#physical_disable').each(function(){
                    $(this).css('display','table');
                });
            }
        });
    });
    
</script>
            
