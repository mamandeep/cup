<div>
<table width="650px" style="table-layout: fixed; margin: 0 auto;">
<tr>
    <td width="20%"></td>
    <td width="30%"><span class="generalinfoheader">General Information</span></td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%">The fee for SC/ST/PWD applicants is Rs. 150 and for others fee is Rs. 600. </td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%">If the candidate is selected, he/she will be required to submit Aadhar within one month of joining.</td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%">In case of payment failure, the final submission of application will not take place. The candiate will not be able to print the form.</td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%">If payment fails, it will be automatically refunded to the same account.</td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%">Billing Address is the address of Credit/Debit card holder.</td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%"><label>I have read the General Conditions to Apply: (Tick the box to continue)</label>
    </td>
    <td width="30%"><input type="checkbox" id="declaration" name="declaration"></input></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%"><span style="font-weight: bold; font-size: 20px; color:#0a0;">Post Applied For: *</span>
    </td>
    <td width="30%"><select id="post_applied_for" name="post_applied_for" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="professor">Professor</option>
                <option value="associateprofessor">Associate Professor</option>
                <option value="assistantprofessor">Assistant Professor</option>
            </select></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%"><span style="font-weight: bold; font-size: 20px; color:#0a0;">Area: *</span></td>
    <td width="30%"><select id="area" name="area" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="science">Science</option>
                <option value="humanities">Humanities</option>
            </select></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%"><span style="font-weight: bold; font-size: 20px; color:#0a0;">Centre: *</span>
    </td>
    <td width="30%"><select id="centre" name="centre" style="width: auto;">
            </select></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%"><div id="post_selected_elig" style="display:none;" class="min_qualification"></div>
    </td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%"><div style="text-align: center; font-size: 30px;">
        <?php echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/multi_step_form/wizard/first', true ))); ?>
        <?php echo $this->Form->submit('Continue', array('div' => false, 'id' => 'continue_bt' )); ?>
        <?php echo $this->Form->end(); ?>
        <!--<a href="<?php echo $this->webroot; ?>multi_step_form/wizard/first" class="button" id="continue_bt">Continue</a>-->
    </div>
    </td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td width="20%"></td>
    <td width="30%">
        <div id="elig_content">
        <div id="professor_science" style="display:none;">
            <ol type="i">Minimum Qualifications:
                <li>An eminent scholar with Ph.D. qualification(s) in the concerned/allied/relevant discipline
                and published work of high quality actively engaged in research with evidence of
                published work with a minimum of 10 publications as books and/or research/policy
                papers.</li>
                <li>A minimum of ten years of teaching experience in university/college, and/or experience
                in research at the University/National level institutions/industries, including experience
                of guiding candidates for research at doctoral level.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and
                technology –mediated teaching learning process.</li>
                <li>A minimum score as stipulated in the Academic Performance Indicator (API) based
                Performance Based Appraisal System (PBAS).</li>
            </ol>
            <br />Or
            <br />
            <ol>
                <li>
                An outstanding professional, with an exceptional accomplishment established reputation
                in the relevant field, who has made significant contributions to the knowledge in the
                concerned/allied/relevant discipline, to be substantiated by credentials
                </li>
            </ol>
        </div>
        <div id="professor_humanities" style="display:none;">
        <ol type="i">Minimum Qualifications:
                <li>An eminent scholar with Ph.D. qualification(s) in the concerned/allied/relevant discipline
                and published work of high quality actively engaged in research with evidence of
                published work with a minimum of 10 publications as books and/or research/policy
                papers.</li>
                <li>A minimum of ten years of teaching experience in university/college, and/or experience
                in research at the University/National level institutions/industries, including experience
                of guiding candidates for research at doctoral level.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and
                technology –mediated teaching learning process.</li>
                <li>A minimum score as stipulated in the Academic Performance Indicator (API) based
                Performance Based Appraisal System (PBAS).</li>
            </ol>
            <br />Or
            <br />
            <ol>
                <li>
                An outstanding professional, with an exceptional accomplishment established reputation
                in the relevant field, who has made significant contributions to the knowledge in the
                concerned/allied/relevant discipline, to be substantiated by credentials
                </li>
            </ol>
        </div>
        <div id="associateprofessor_science" style="display:none;">
            <ol type="i">Minimum Qualifications:
                <li>Good academic record with a Ph.D. Degree in the concerned/allied/relevant
				disciplines.</li>
                <li>A Master’s Degree with at least 55% marks (or an equivalent grade in a point scale wherever grading system
				is followed).</li>
                <li>A minimum of eight years of experience of teaching and/or research in an academic/research position
				equivalent to that of Assistant Professor in a University, College or Accredited Research Institution/industry
				excluding the period of Ph.D. research with evidence of published work and a minimum of 5 publications as
				books and/or research/policy papers.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and technology – mediated
				teaching learning process with evidence of having guided doctoral candidates and research students. </li>
				<li>A minimum score as stipulated in the Academic Performance Indicator (API) based Performance Based
				Appraisal System (PBAS), set out in UGC Regulations for appointment of teachers and other academic staff in
				universities and colleges and measures for the maintenance of standards in higher education, 2010
				(Appendix B).</li>
            </ol>
        </div>
        <div id="associateprofessor_humanities" style="display:none;">        
        <ol type="i">Minimum Qualifications:
                <li>Good academic record with a Ph.D. Degree in the concerned/allied/relevant
				disciplines.</li>
                <li>A Master’s Degree with at least 55% marks (or an equivalent grade in a point scale wherever grading system
				is followed).</li>
                <li>A minimum of eight years of experience of teaching and/or research in an academic/research position
				equivalent to that of Assistant Professor in a University, College or Accredited Research Institution/industry
				excluding the period of Ph.D. research with evidence of published work and a minimum of 5 publications as
				books and/or research/policy papers.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and technology – mediated
				teaching learning process with evidence of having guided doctoral candidates and research students. </li>
				<li>A minimum score as stipulated in the Academic Performance Indicator (API) based Performance Based
				Appraisal System (PBAS), set out in UGC Regulations for appointment of teachers and other academic staff in
				universities and colleges and measures for the maintenance of standards in higher education, 2010
				(Appendix B).</li>
            </ol>
        </div>
        <div id="assistantprofessor_science" style="display:none;">
            <ol type="i">Minimum Qualifications:
                <li>Good academic record as defined by the concerned university with at least 55%
				marks (or an equivalent grade in a point scale wherever grading system is followed)
				at the Master’s Degree level in a relevant subject from an Indian University, or an
				equivalent degree from an accredited foreign university.</li>
                <li>Besides fulfilling the above qualifications, the candidate must have cleared the
				National Eligibility Test (NET) conducted by the UGC, CSIR or similar test accredited
				by the UGC like SLET/SET. </li>
                <li>Notwithstanding anything contained in sub-clauses (i) and (ii) to this Clause 4.4.1,
				candidates, who are, or have been awarded a Ph. D. Degree in accordance with the
				University Grants Commission (Minimum Standards and Procedure for Award of
				Ph.D. Degree) Regulations, 2009, shall be exempted from the requirement of the
				minimum eligibility condition of NET/SLET/SET for recruitment and appointment of
				Assistant Professor or equivalent positions in Universities/Colleges/Institutions.</li>
                <li>NET/SLET/SET shall also not be required for such Masters Programmes in
				disciplines for which NET/SLET/SET is not conducted.</li>
            </ol>
        </div>
        <div id="assistantprofessor_humanities" style="display:none;">
        <ol type="i">Minimum Qualifications:
                <li>Good academic record as defined by the concerned university with at least 55%
				marks (or an equivalent grade in a point scale wherever grading system is followed)
				at the Master’s Degree level in a relevant subject from an Indian University, or an
				equivalent degree from an accredited foreign university.</li>
                <li>Besides fulfilling the above qualifications, the candidate must have cleared the
				National Eligibility Test (NET) conducted by the UGC, CSIR or similar test accredited
				by the UGC like SLET/SET. </li>
                <li>Notwithstanding anything contained in sub-clauses (i) and (ii) to this Clause 4.4.1,
				candidates, who are, or have been awarded a Ph. D. Degree in accordance with the
				University Grants Commission (Minimum Standards and Procedure for Award of
				Ph.D. Degree) Regulations, 2009, shall be exempted from the requirement of the
				minimum eligibility condition of NET/SLET/SET for recruitment and appointment of
				Assistant Professor or equivalent positions in Universities/Colleges/Institutions.</li>
                <li>NET/SLET/SET shall also not be required for such Masters Programmes in
				disciplines for which NET/SLET/SET is not conducted.</li>
            </ol>
        </div>
    </div>
    </td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
</table>
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
