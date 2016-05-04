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
                <th>No. of Years / Months (as on last date of filling online form)</th>
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
                        echo "$('input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths]\"]').on('focusin', function(){
                            calcuateDiff('input[name$=\"data[Experience][" . $key . "][from_date]\"]', 'input[name$=\"data[Experience][" . $key . "][to_date]\"]', 'input[name$=\"data[Experience][" . $key . "][no_of_yrs_mnths]\"]');
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
        return [y1 - y2, m1 - m2, d1 - d2]; 
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