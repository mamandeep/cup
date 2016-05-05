<div>
<table width="650px" style="table-layout: fixed; margin: 0 auto;">
<tr>
    <td width="20%"></td>
    <td width="30%"><span class="generalinfoheader">General Information</span></td>
    <td width="30%"></td>
    <td width="20%"></td>
</tr>
<tr>
    <td></td>
    <td>The fee for SC/ST/PWD applicants is Rs. 250 and for others fee is Rs. 750. </td>
    <td>Essential Qualifications   for Professors, Associate Professors, and Assistant Professors: <br/>
        As per “UGC REGULATIONS ON MINIMUM QUALIFICATIONS FOR APPOINTMENT OF TEACHERS AND OTHER ACADEMIC STAFF IN UNIVERSITIES AND COLLEGES AND MEASURES FOR THE MAINTENANCE OF STANDARDS IN HIGHER EDUCATION 2010“ and the 2nd Amendments to the regulation issued in June 2013. 
        <br/>
        For details: <a href="http://www.ugc.ac.in/oldpdf/regulations/revised_finalugcregulationfinal10.pdf" target="_blank">(i)</a>
        <br/>
        <a href="http://www.ugc.ac.in/pdfnews/8539300_English.pdf" target="_blank">(ii)</a> and University rules.   
        <br/>
        NCTE Regulation 2009: <a href="http://www.ncte-india.org/regulation/RegulationsE-2009.pdf" target="_blank">(iii)</a>
    </td>
    <td>Advertisement</td>
</tr>
<tr>
    <td></td>
    <td>If the candidate is selected, he/she will be required to submit Aadhar within one month of joining.</td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>In case of payment failure, the final submission of application will not take place. The candiate will not be able to print the form.</td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>If payment fails, it will be automatically refunded to the same account.</td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>Billing Address is the address of Credit/Debit card holder.</td>
    <td></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td>
        <span>For detailed qualifications, please <a href="javascript: void(0);" target="_blank">click here</a></span>.
    </td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td><label>I have read the General Conditions to Apply: (Tick the box to continue)</label>
    </td>
    <td><input type="checkbox" id="declaration" name="declaration"></input></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">Post Applied For: *</span>
    </td>
    <td><select id="post_applied_for" name="post_applied_for" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="professor">Professor</option>
                <option value="associateprofessor">Associate Professor</option>
                <option value="assistantprofessor">Assistant Professor</option>
            </select></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">School: *</span></td>
    <td><select id="area" name="area" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="bas">Basic and Applied Sciences</option>
                <option value="edu">Education</option>
                <option value="et">Engineering and Technology</option>
                <option value="ees">Environment and Earth Sciences</option>
                <option value="gr">Global Relations</option>
                <option value="hs">Health Sciences</option>
                <option value="llc">Languages, Literature and Culture</option>
                <option value="lsg">Legal Studies and Governance</option>
                <option value="sps">Sports Sciences</option>
                <option value="ss">Social Sciences</option>
            </select></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">Centre: *</span>
    </td>
    <td><select id="centre" name="centre" style="width: auto;">
            </select></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><div id="post_selected_elig" style="display:none;" class="min_qualification"></div>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><div style="text-align: center; font-size: 30px;">
        <?php if(isset($applicant) && $applicant['Applicant']['final_submit'] != "1" ) {
              echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/multi_step_form/wizard/first', true ))); 
              echo $this->Form->submit('Continue', array('div' => false, 'id' => 'continue_bt' ));
              echo $this->Form->end(); 
            } ?>
        <!--<a href="<?php echo $this->webroot; ?>multi_step_form/wizard/first" class="button" id="continue_bt">Continue</a>-->
    </div>
    </td>
    <td><div style="text-align: center; font-size: 30px;"><?php if(isset($applicant) && $applicant['Applicant']['final_submit'] == "1" ) {
              echo $this->Form->create('Temp2', array('id' => 'Print_Form', 'url' => Router::url( '/form/print_bfs', true ))); 
              echo $this->Form->submit('Print', array('div' => false, 'id' => 'print_bt' ));
              echo $this->Form->end(); 
              } ?>
        </div>
    </td>
    <td></td>
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

                bas: {
                    text: ['Animal Sciences', 
                           'Biochemistry and Microbial Sciences', 
                           'Chemical Sciences', 
                           'Computational Sciences',
                           'Mathematics & Statistics',
                           'Pharmaceutical Sciences and Natural Products',
                           'Physical Sciences',
                           'Plant Sciences'
                          ],
                    value: ['Animal Sciences', 
                            'Biochemistry and Microbial Sciences', 
                            'Chemical Sciences', 
                            'Computational Sciences',
                            'Mathematics and Statistics',
                            'Pharmaceutical Sciences and Natural Products',
                            'Physical Sciences',
                            'Plant Sciences'
                           ]
                },
                edu: {
                    text: ['Education'
                          ],
                    value: ['Education'
                           ]
                },
                et: {
                    text: ['Agribusiness/Food Processing Technology', 
                           'Computer Science & Technology'
                          ],
                    value: ['Agribusiness or Food Processing Technology', 
                            'Computer Science and Technology'
                           ]
                },
                ees: {
                    text: ['Environmental Sciences & Technology', 
                           'Geography & Geology'
                          ],
                    value: ['Environmental Sciences and Technology', 
                            'Geography & Geology'
                           ]
                },
                gr: {
                    text: ['South & Central Asian Studies (Including Historical Studies)'
                          ],
                    value: ['South and Central Asian Studies (Including Historical Studies)'
                           ]
                },
                hs: {
                    text: ['Human Genetics and Molecular Medicine'
                          ],
                    value: ['Human Genetics and Molecular Medicine'
                           ]
                },
                llc: {
                    text: ['Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)', 
                           'Comparative Literature'
                          ],
                    value: ['Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)', 
                            'Comparative Literature'
                           ]
                },
                lsg: {
                    text: ['Law'
                          ],
                    value: ['Law'
                           ]
                },
                ss: {
                    text: ['Economic Studies', 
                           'Sociology'
                          ],
                    value: ['Economic Studies',
                            'Sociology'
                           ]
                },
                sps: {
                    text: ['Sports Sciences'
                          ],
                    value: ['Sports Sciences'
                           ]
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

<!--
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
-->
