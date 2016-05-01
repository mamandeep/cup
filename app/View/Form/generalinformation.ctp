<div>
    <span class="generalinfoheader">General Information</span>
    <table width="100%" style="table-layout: fixed;">
        <!--<tr>
            <td colspan="3" style="width: 20%;">Last Date to Apply: 28<sup>th</sup> Decemeber, 2015</td>
        </tr>-->
        <tr>
            <td colspan="3" style="width: 20%;">The fee for SC/ST/PWD applicants is Rs. 150 and for others fee is Rs. 600. </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 20%;">If the candidate is selected, he/she will be required to submit Aadhar within one month of joining.</td>
        </tr>
	<tr>
            <td colspan="3" style="width: 20%; font-weight: bold;">In case of payment failure, the final submission of application will not take place. The candiate will not be able to print the form.</td>
        </tr>
	<tr>
            <td colspan="3" style="width: 20%; font-weight: bold;">If payment fails, it will be automatically refunded to the same account.</td>
        </tr>
	<tr>
            <td colspan="3" style="width: 20%; font-weight: bold;">Billing Address is the address of Credit/Debit card holder.</td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 20%;"><div class="print_required">
                        <label>I have read the General Conditions to Apply: (Tick the box below to continue)</label>
                        <input type="checkbox" id="declaration" name="declaration"></input>
                    </div>
            </td>
            <td></td>
        </tr>
    </table>
    <table width="100%" style="table-layout: fixed;">
    <tr>
        <td>
            <span style="font-weight: bold; font-size: 20px; color:#0a0;">Post Applied For: *</span>
        </td>
        <td>
            <select id="post_applied_for" name="post_applied_for" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="professor">Professor</option>
                <option value="associateprofessor">Associate Professor</option>
                <option value="assistantprofessor">Assistant Professor</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <span style="font-weight: bold; font-size: 20px; color:#0a0;">Area: *</span>
        </td>
        <td>
            <select id="area" name="area" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="science">Science</option>
                <option value="humanities">Humanities</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <span style="font-weight: bold; font-size: 20px; color:#0a0;">Centre: *</span>
        </td>
        <td>
            <select id="centre" name="centre" style="width: auto;">
            </select>
        </td>
    </tr>
    </table>
    <table>
        <tr>
            <td style="width: 15%"></td>
            <td><div id="post_selected_elig" style="display:none;" class="min_qualification"></div></td>
            <td style="width: 15%"></td>
        </tr>
    </table>
    <div style="text-align: center; font-size: 30px;">
        <?php echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/multi_step_form/wizard/first', true ))); ?>
        <?php echo $this->Form->submit('Continue', array('div' => false, 'id' => 'continue_bt' )); ?>
        <?php echo $this->Form->end(); ?>
        <!--<a href="<?php echo $this->webroot; ?>multi_step_form/wizard/first" class="button" id="continue_bt">Continue</a>-->
    </div>
    <div id="elig_content">
        <div id="professor_science" style="display:none;">
            <ol type="i">Minimum Qualifications:
<li>Master's Degree with at least 55% of the marks or its equivalent grade of "B" in UGC seven point scale. </li>
<li>At least 15 years of experience as Assistant Professor in the AGP of Rs. 7000 and above or with 08 years of service in the AGP of Rs. 8000 and above including as Associate Professor along with experience in educational administration.
<br />Or
Comparable experience in research establishment and / or other institutions of higher education. 
<br />Or
15 years of administrative experience, of which 08 years should be as Deputy Registrar or an equivalent post.</li>
 </ol>
        </div>
        <div id="professor_humanities" style="display:none;">
        <ol type="i">Minimum Qualifications:
<li>Master's Degree with at least 55% of the marks or its equivalent grade of "B" in UGC seven point scale. </li>

<li>At least 15 years of experience as Assistant Professor in the AGP of Rs. 7000 and above or with 08 years of service in the AGP of Rs. 8000 and above including as Associate Professor along with experience in educational administration.
<br/>Or
Comparable experience in research establishment and / or other institutions of higher education. 
<br/>Or
<br/>15 years of administrative experience, of which 08 years should be as Deputy Registrar or an equivalent post.
</li>
</ol>
</div>
        <div id="associateprofessor_science" style="display:none;">
        <ol type="i">Minimum Qualifications:
<li>Master's Degree with at least 55% of the marks or its equivalent grade of "B" in UGC seven point scale. </li>
<li>At least 15 years of experience as Assistant Professor in the AGP of Rs. 7000 and above or with 08 years of service in the AGP of Rs. 8000 and above including as Associate Professor along with experience in educational administration. 
<br>Or
Comparable experience in research establishment and / or other institutions of higher education. 
<br>Or
15 years of administrative experience, of which 08 years should be as Deputy Registrar or an equivalent post.</li>
</ol>
</div>
        <div id="associateprofessor_humanities" style="display:none;">        
        <ol type="i">Minimum Qualifications:
<li>A  Master’s Degree in Library Science/Information Science/Documentation with at least 55% marks or its equivalent grade of B in the UGC seven point scale and a consistently good academic record.</li>
<li>At least thirteen years as a Deputy Librarian in a University library or eighteen years’ experience as a College Librarian.</li>
<li>Evidence of innovative library service and organization of published work. </li>
</ol>
<br />
<br />
<ul>Desirable: 
<li>M.Phil./ Ph.D. degree in Library Science/ Information Science/ Documentation/ Archives and  Manuscript – Keeping</li>
</ul>
<br/><br/>
<ol type="i">Minimum Qualifications for Deputation:
<li>	A  Master’s Degree in Library Science/Information Science/Documentation with at least 55% marks or its equivalent grade of B in the UGC seven point scale and a consistently good academic record.</li>
<li>	At least thirteen years as a Deputy Librarian in the Pay Scale:Rs.15600-39100 (AGP Rs.8000/-) in a University library or eighteen years’ experience as a College Librarian.</li>
<li>	Evidence of innovative library service and organization of published work. </li>
</ol>
<br/>
<ul>Desirable: 
<li>M.Phil./ Ph.D. degree in Library Science/ Information Science/ Documentation/ Archives and  Manuscript – Keeping</li>
</ul>
</div>
        <div id="assistantprofessor_science" style="display:none;">
        <ol type="i">Minimum qualifications:  
<li>    A Master's Degree in Library Science/Information Science/Documentation Science with at least 55% marks or its equivalent grade of B in the UGC seven-point scale and consistently good academic record.</li>
<li>    Five years experience as an Assistant University Librarian/College Librarian.</li>
<li>	Evidence of Innovative Library Services, organization of published work and professional commitment, computerization of Library.</li>
</ol>
<br/>
<br/>
<ul>Desirable qualification:
<li>	M.Phil./Ph.D. degree in Library Science/Information Science/Documentation/ Archives and Manuscript - Keeping / Computerization of Library.</li>
</ul>
</div>
        <div id="assistantprofessor_humanities" style="display:none;">
        <ol type="i">Minimum qualifications :
<li>	Master’s Degree with at least 55% marks or its equivalent grade of B in the UGC seven point scale.</li>
<li>	Nine years of experience as a Assistant Professor in the AGP of Rs. 6,000/- and above with experience in educational administration.
<br/>OR
Comparable Experience in research establishment and/or other institution of higher education
<br/>OR
Five years of administrative experience as Assistant Registrar or in an equivalent post.
</li>
</ol>
<br/><br/>
<ul>Deputation: 
<li>Officers holding analogous posts on regular basis or with five years regular service in PB-3 (Rs. 15600-39100) + Grade Pay Rs. 6600 in the Central/ State Government, Universities and other autonomous organizations.</li>
</ul>
</div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#post_applied_for').val('none');
        $('#continue_bt').prop('disabled', true);
        $('#declaration').prop('checked', false);

        $('#area, #post_applied_for, #declaration, #centre').on('change', function() {
            if($('#post_applied_for').val() === 'none' || $('#area').val() === 'none' || 
                $('#declaration').is(':checked') == false) {
                    $('#post_selected_elig').css("display","none");
                    $('#continue_bt').prop('disabled',true);
            }
            else {
                $('#post_selected_elig').empty();
                $('#post_selected_elig').append($('#' + $('#post_applied_for').val() + 
                                                '_' + $('#area').val()).clone().css('display','block'));
                $('#post_selected_elig').css("display","block");
                $('#continue_bt').prop('disabled', false);
            }
        });

        $('#continue_bt').on('click', function(e){
            if($('#post_applied_for').find(":selected").val() === 'none' || 
                $('#area').find(":selected").val() === 'none') {
                e.preventDefault();
            }
            else {
                e.preventDefault();
                window.location.href = '<?php echo $this->webroot; ?>multi_step_form/wizard/first?post=' + 
                                $('#post_applied_for').find(":selected").text() + '&area=' + 
                                $('#area').find(":selected").text() + '&centre=' +
                                $('#centre').find(":selected").text();
            }
        });
        
        
        <?php 
            if(!empty($this->Session->read('disabled_posts'))) {
                foreach ($this->Session->read('disabled_posts') as $value) {
                    echo "$(\"#post_applied_for option[text='" . $value .  "']\").remove();";
                    echo "$('#post_applied_for option').each(function() {\n
                        if ( $(this).text() == '" . $value . "' ) {\n
                            $(this).remove();\n
                        }\n
                    });\n";
                }
            }
         ?>
         

         $('#declaration').change(function(){
            if($(this).is(':checked')) {
                $('#continue_bt').prop('disabled', false);
            }
            else {
                $('#continue_bt').prop('disabled',true);
            }
        });

        var Select_List_Data = {
            'centre': { // name of associated select box
                // names match option values in controlling select box

                science: {
                    text: ['Science 1', 'Science 2', 'Science 3', 'Science 4', 'Science 5'],
                    value: ['science1', 'science2', 'science3', 'science4', 'science5']
                },
                humanities: {
                    text: ['Humanities 1', 'Humanities 2', 'Humanities 3', 'Humanities 4'],
                    value: ['humanities1', 'humanities2', 'humanities3', 'humanities4']
                },
                none: {
                    text: ['None'],
                    value: ['none']
                }
            }    
        };


        // anonymous function assigned to onchange event of controlling select box
        $('#area').on("change", function(e) {
            // name of associated select box
            var relName = 'centre';

            // reference to associated select box 
            //var relList = this.form.elements[ relName ];

            // get data from object literal based on selection in controlling select box (this.value)
            var obj = Select_List_Data[ relName ][ $(this).val() ];

            //remove current option elements
            //removeAllOptions(relList, true);
            $('#centre')
                .find('option')
                .remove()
                .end();
                //.append('<option value="whatever">text</option>')
                //.val('whatever');


            // call function to add optgroup/option elements
            // pass reference to associated select box and data for new options
            //appendDataToSelect(relList, obj);
            $.each(obj.text, function (index, value) {
                $('#centre').append($('<option/>', { 
                    value: obj.value[index],
                    text : value 
                }));
            });
        });


        // populate associated select box as page loads
        (function() { // immediate function to avoid globals

            var form = document.forms['demoForm'];

            // reference to controlling select box
            var sel = $('#area');
            sel.selectedIndex = 0;

            // name of associated select box
            var relName = 'centre';
            // reference to associated select box
            //var rel = form.elements[ relName ];
            var rel = $('#centre');

            // get data for associated select box passing its name
            // and value of selected in controlling select box
            var data = Select_List_Data[ relName ][ sel.val() ];

            // add options to associated select box
            //appendDataToSelect(rel, data);
            $.each(data.text, function (index, value) {
                $('#centre').append($('<option/>', { 
                    value: data.value[index],
                    text : value 
                }));
            });

        }());
    });
</script>
