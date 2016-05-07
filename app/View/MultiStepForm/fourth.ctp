<?php 
echo $this->Html->script('papers');
echo $this->Html->script('articles');
echo $this->Html->script('researchproject');

//print_r($this->request->data);

echo $this->Form->create('ResearchPaper', array('id' => 'Researchpaper_Details', 'url' => Router::url( null, true ))); ?>
<div class="main_content_header">4. Research Work</div>
<div class="main_content_header">Research Papers, if any</div>
<input type="hidden" name="modified_papers" id="modified_papers" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<fieldset>
    <table id="paper-table">
        <thead>
            <tr>
                <th>Name of Author(s)</th>
                <th>Title of the Paper</th>
                <th>Journal's Name & Place of Publication</th>
                <th>Publication & ISSN</th>
                <th>Vol./Page No/Year</th>
                <th>Impact Factor</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Researchpaper'])) {
                    for ($key = 0; $key < count($this->request->data['Researchpaper']); $key++) {
                        echo $this->element('papers', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>

<script id="paper-template" type="text/x-underscore-template">
    <?php echo $this->element('papers');?>
</script>

<div class="main_content_header">Research Articles, if any</div>
<input type="hidden" name="modified_articles" id="modified_articles" value="false" />
<fieldset>
    <table id="article-table">
        <thead>
            <tr>
                <th>Name of Author(s)</th>
                <th>Title of the Book</th>
                <th>Title of the Article</th>
                <th>Place of Publication</th>
                <th>Publisher & ISBN</th>
                <th>Page No.</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Researcharticle'])) {
                    for ($key = 0; $key < count($this->request->data['Researcharticle']); $key++) {
                        echo $this->element('article', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>

<script id="article-template" type="text/x-underscore-template">
    <?php echo $this->element('article');?>
</script>

<div class="main_content_header">Research Projects, if any</div>
<input type="hidden" name="modified_rp" id="modified_rp" value="false" />
<fieldset>
    <table id="rp-table">
        <thead>
            <tr>
                <th>Title of Projects</th>
                <th>Completed / Ongoing</th>
                <th>Funding Agency</th>
                <th>As PI/CO-PI or Investigator</th>
                <th>Amount of grant</th>
                <th>Duration</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Researchproject'])) {
                    for ($key = 0; $key < count($this->request->data['Researchproject']); $key++) {
                        echo $this->element('researchproject', array('key' => $key,
                                                                     'rp' => (!empty($this->request->data['Researchproject'][$key]['comp_ongoing']) ? $this->request->data['Researchproject'][$key]['comp_ongoing'] : 'completed' )));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>

<script id="rp-template" type="text/x-underscore-template">
    <?php echo $this->element('researchproject');?>
</script>

<br/><br/>
<table border="1px solid black" width="100%" id="seminars_attended" style="border-collapse: collapse; border-right: 1px solid black; " >
    <tr>
        <td width="30%" class="table_headertxt">Seminars / Conferences / Workshops / Training programmes, attended.</td>
        <td class="table_headertxt">National (No.)</td>
        <td class="table_headertxt">International (No.)</td>
        <td class="table_headertxt">Total (No.)</td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->Form->input('Applicant.sem_att_national', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.sem_att_international', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.sem_att_total', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
</table>
<br/>
<br/>
<table border="1px solid black" width="100%" id="seminars_org" style="border-collapse: collapse; border-right: 1px solid black; ">
    <tr>
        <td width="30%" class="table_headertxt">Seminars / Conferences / Workshops / Training programmes, organized.</td>
        <td class="table_headertxt">National (No.)</td>
        <td class="table_headertxt">International (No.)</td>
        <td class="table_headertxt">Total (No.)</td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->Form->input('Applicant.sem_org_national', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.sem_org_international', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.sem_org_total', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
</table>
<br/>
<br/>
<table border="1px solid black" width="100%" id="research_guidance" style="border-collapse: collapse; border-right: 1px solid black;  ">
    <tr>
        <td width="30%" class="table_headertxt">Research Guidance (No. of students guided)</td>
        <td class="table_headertxt">M.Phil. / Equivalent (No.)</td>
        <td class="table_headertxt">Ph.D. (No.)</td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding-top: 20px;">Completed</td>
        <td><?php echo $this->Form->input('Applicant.rg_mphil_completed', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.rg_phd_completed', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding-top: 20px;">Under supervision</td>
        <td><?php echo $this->Form->input('Applicant.rg_mphil_undersup', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.rg_phd_undersup', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
</table>
<br/>
<table width="100%" id="factors_disable">
    <tr>
        <td width="30%" class="table_headertxt" style="padding-top: 20px;">Total Impact Factor as per SCI/SCOPUS</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.id', array('type', 'hidden'));
                                        echo $this->Form->input('Applicant.tot_impact_sci', array('label' => false, 'maxlength' => '500')); ?></td>
        <td width="40%" class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding-top: 20px;">Total Impact Factor as per Google search</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.tot_impact_google', array('label' => false, 'maxlength' => '500')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding-top: 20px;">h-Index Factor as per SCOPUS</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.h_index_scopus', array('label' => false, 'maxlength' => '500')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding-top: 20px;">h-Index Factor as per Google search</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.h_index_google', array('label' => false, 'maxlength' => '500')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding-top: 20px;">i-10 Index Factor as per Google search</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.i10_index_google', array('label' => false, 'maxlength' => '500')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
</table>
<br>
<br/>
<?php if($this->request->data['Applicant']['post_applied_for'] == "Professor"
        || $this->request->data['Applicant']['post_applied_for'] == "Associate Professor") { ?>
<style>
table#api_score tr td {border: 1px solid black;}
</style>
<div class="main_content_header">API Score</div>
<table border="1px solid black" width="100%" id="api_score" style="border-collapse: collapse; border-right: 1px solid black; ">
    <tr>
        <td width="10%" class="table_headertxt"></td>
        <td colspan="2" class="table_headertxt">Category</td>
        <td width="15%" class="table_headertxt">API Score Claimed by Applicant in each Category</td>
        <td width="15%" class="table_headertxt">Sub Total</td>
    </tr>
    <tr>
        <td rowspan="3" width="10%" class="table_headertxt">III (A)</td>
        <td colspan="2" class="table_headertxt">Referred Journals *</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.id', array('label' => false, 'type' => 'hidden'));
                                                      echo $this->Form->input('ApiScore.applicant_id', array('label' => false, 'type' => 'hidden'));
                                                      echo $this->Form->input('ApiScore.rp_refered_jour', array('label' => false, 'maxlength' => '50')); ?></td>
        <td rowspan="3" width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.total_IIIA', array('id' => 'total_IIIA', 'label' => false, 'maxlength' => '50', 'readonly' => 'readonly'));?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Non-referred but recognized and reputable journals and periodicals, having ISBN/ISSN numbers.</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.rp_nonref_reco', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Conference proceedings as full papers, etc. (Abstracts not to be included).</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.rp_conf_full_paper', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td rowspan="5" width="10%" class="table_headertxt">III (B)</td>
        <td colspan="2" class="table_headertxt">Text or  Reference Books Published by International Publishers with an established peer review system</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.rpu_int_pub', array('label' => false, 'maxlength' => '50')); ?></td>
        <td rowspan="5" width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.total_IIIB', array('id' => 'total_IIIB', 'label' => false, 'maxlength' => '50', 'readonly' => 'readonly'));?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Subjects Books by National level publishers/State and Central Govt. Publications with ISBN/ISSN numbers.</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.rpu_national_pub', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Subject Books by Other local publishers with ISBN/ISSN numbers.</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.rpu_local_pub', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Chapters contributed to edited knowledge based volumes published by International Publishers.</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.rpu_chap_int_pub', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Chapters in knowledge based volumes by Indian/National level publishers with ISBN/ISSN numbers and with numbers of national and international directories.</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.rpu_chap_nat_pub', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td rowspan="3" width="10%" class="table_headertxt">III (C)(i) Sponsored Projects carried out/ongoing</td>
        <td class="table_headertxt">Major Projects amount mobilized with grants above 30.0 lakhs</td>
        <td class="table_headertxt">Major Projects amount mobilized with grants above 5.0 lakhs</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.sponp_gabov_30', array('label' => false, 'maxlength' => '50')); ?></td>
        <td rowspan="6" width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.total_IIIC', array('id' => 'total_IIIC', 'label' => false, 'maxlength' => '50', 'readonly' => 'readonly'));?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Major Projects amount mobilized with grants above 5.0 lakhs upto 30.0 lakhs.</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.sponp_gabov_5', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Minor Projects (Amount mobilized with grants above Rs. 50,000 up to Rs. 5.0 lakhs.</td>
        <td class="table_headertxt"><?php echo $this->Form->input('ApiScore.sponp_gabov_50k', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td width="10%" class="table_headertxt">III (C)(ii) Consultancy Projects carried out/ongoing</td>
        <td colspan="2" class="table_headertxt">Amount mobilized with minimum of Rs. 10.00 lakh</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.consp_gabove_10', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td width="10%" class="table_headertxt">III (C)(iii) Completed Projects: Quality Evaluation</td>
        <td colspan="2" class="table_headertxt">Completed project Report (Acceptance from funding agency)</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.comp_projects_qe', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td width="10%" class="table_headertxt">III (C)(iv) Projects Outcome / Outputs </td>
        <td colspan="2" class="table_headertxt">Patent/Technology transfer/Product/Process</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.proj_patent', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td width="10%" class="table_headertxt">III (D)(i) M.Phil.</td>
        <td colspan="2" class="table_headertxt">Degree awarded only</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.rg_mphil', array('label' => false, 'maxlength' => '50')); ?></td>
        <td rowspan="3" width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.total_IIID', array('id' => 'total_IIID', 'label' => false, 'maxlength' => '50', 'readonly' => 'readonly'));?></td>
    </tr>
    <tr>
        <td rowspan="2" width="10%" class="table_headertxt">III (D)(ii) Ph.D</td>
        <td colspan="2" class="table_headertxt">Degree awarded</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.rg_phd', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Thesis submitted</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.rg_thesis_sub', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td rowspan="2" width="10%" class="table_headertxt">III (E)(i) Refresher courses, Methodology workshops, Training, Teaching-Learning-Evaluation Technology Programmes, Soft Skills development.</td>
        <td colspan="2" class="table_headertxt">Not less than two weeks duration</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.refreshc_train_2week', array('label' => false, 'maxlength' => '50')); ?></td>
        <td rowspan="8" width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.total_IIIE', array('id' => 'total_IIIE', 'label' => false, 'maxlength' => '50', 'readonly' => 'readonly'));?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">One week duration</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.refreshc_one_week', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td rowspan="4" width="10%" class="table_headertxt">III (E)(ii) Papers in Conferences/Seminars/workshops etc. **</td>
        <td colspan="2" class="table_headertxt">Participation and Presentation of research papers (oral/poster) in International conference</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.pap_pp_int', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Participation and Presentation of research papers (oral/poster) in National</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.pap_pp_nat', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Participation and Presentation of research papers (oral/poster) in Regional/State level</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.pap_pp_reg', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">Participation and Presentation of research papers (oral/poster) in Local - University/College level</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.pap_pp_local', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td rowspan="2" width="10%" class="table_headertxt">III (E)(iii) Invited lectures or presentations for conferences/symposia.</td>
        <td colspan="2" class="table_headertxt">International</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.invited_lec_int', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="table_headertxt">National level</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.invited_lec_nat', array('label' => false, 'maxlength' => '50')); ?></td>
    </tr>
    <tr>
        <td colspan="3" class="table_headertxt"></td>
        <td class="table_headertxt">Total</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.total_api', array('id' => 'total_api', 'label' => false, 'maxlength' => '50', 'readonly' => 'readonly'));?></td>
    </tr>
    <tr>
        <td colspan="3" class="table_headertxt"></td>
        <td class="table_headertxt">API Score after Capping</td>
        <td width="15%" class="table_headertxt"><?php echo $this->Form->input('ApiScore.total_api_capped', array('id' => 'total_api_capped', 'label' => false, 'maxlength' => '50', 'readonly' => 'readonly', 'step' => '0.01'));?></td>
    </tr>
</table>
<div class="table_headertxt">*Wherever relevant to any specific discipline, the API score for paper in refereed journal would be augmented as follow:
    <ol  type="i">
            <li>indexed journals - by 5 points</li>
            <li>papers with impact factor between 1 and 2 by 10 points</li>
            <li>papers with impact factor between 2 and 5 by 15 points</li>
            <li>papers with impact factor between 5 and 10 by 25 points</li>
    </ol>
</div>
<div class="table_headertxt">** If a paper presented in Conference/Seminar is published in the form of Proceedings, the points would accrue for the publication (III(a)) and not under presentaion (III (e)(ii)).  <ol>
</div>
<div class="table_headertxt"><a href="<?php echo $this->webroot . '/files/API Result.docx'; ?>" target="_blank">For details on API Calculations, click here.</a></div>
<?php } ?>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('id' => 'formSubmit' , 'div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>

<?php echo $this->Form->end(); ?>

<script>
    $(document).ready(function(){
        
        function calculateTotalAPI() {
            var T = 0;
            var A = $("#total_IIIA").val();
            if(!isNaN(A) && A.length!=0) {
                T += parseInt(A);
            }
            var B = $("#total_IIIB").val();
            if(!isNaN(B) && B.length!=0) {
                T += parseInt(B);
            }
            var C = $("#total_IIIC").val();
            if(!isNaN(C) && C.length!=0) {
                T += parseInt(C);
            }
            var D = $("#total_IIID").val();
            if(!isNaN(D) && D.length!=0) {
                T += parseInt(D);
            }
            var E = $("#total_IIIE").val();
            if(!isNaN(E) && E.length!=0) {
                T += parseInt(E);
            }
            $("#total_api").val(T);
            $("#total_api_capped").val((Math.min(A, 0.3 * T) + Math.min(B, 0.25 * T) + Math.min(C, 0.2 * T) + Math.min(D, 0.1 * T)+ Math.min(E, 0.15 * T)).toFixed(2));
        }
        
        function calculateTotalIIIA() {
            //alert("in function");
            var sum = 0;
             $("input[name='data[ApiScore][rp_refered_jour]'], input[name='data[ApiScore][rp_nonref_reco]'], input[name='data[ApiScore][rp_conf_full_paper]']").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseInt(this.value);
                }
            });
            $("#total_IIIA").val(sum);
        }
        function calculateTotalIIIB() {
            //alert("in function");
            var sum = 0;
             $("input[name='data[ApiScore][rpu_int_pub]'], input[name='data[ApiScore][rpu_national_pub]'], input[name='data[ApiScore][rpu_local_pub]'] , input[name='data[ApiScore][rpu_chap_int_pub]'], input[name='data[ApiScore][rpu_chap_nat_pub]']").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseInt(this.value);
                }
            });
            $("#total_IIIB").val(sum);
        }
        function calculateTotalIIIC() {
            var sum = 0;
             $("input[name='data[ApiScore][sponp_gabov_30]'], input[name='data[ApiScore][sponp_gabov_5]'], input[name='data[ApiScore][sponp_gabov_50k]'], input[name='data[ApiScore][consp_gabove_10]'], input[name='data[ApiScore][comp_projects_qe]'], input[name='data[ApiScore][proj_patent]']").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseInt(this.value);
                }
            });
            $("#total_IIIC").val(sum);
        }
        function calculateTotalIIID() {
            var sum = 0;
             $("input[name='data[ApiScore][rg_mphil]'], input[name='data[ApiScore][rg_phd]'], input[name='data[ApiScore][rg_thesis_sub]']").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseInt(this.value);
                }
            });
            $("#total_IIID").val(sum);
        }
        function calculateTotalIIIE() {
            var sum = 0;
             $("input[name='data[ApiScore][refreshc_train_2week]'], input[name='data[ApiScore][refreshc_one_week]'], input[name='data[ApiScore][pap_pp_int]'], input[name='data[ApiScore][pap_pp_nat]'], input[name='data[ApiScore][pap_pp_reg]'], input[name='data[ApiScore][pap_pp_local]'], input[name='data[ApiScore][invited_lec_int]'], input[name='data[ApiScore][invited_lec_nat]']").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseInt(this.value);
                }
            });
            $("#total_IIIE").val(sum);
        }
        
        // IIIA
        $("input[name='data[ApiScore][rp_refered_jour]']").keyup(function(){ calculateTotalIIIA(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rp_nonref_reco]']").keyup(function(){ calculateTotalIIIA(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rp_conf_full_paper]']").keyup(function(){ calculateTotalIIIA(); calculateTotalAPI(); });
        // IIIB
        $("input[name='data[ApiScore][rpu_int_pub]']").keyup(function(){ calculateTotalIIIB(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rpu_national_pub]']").keyup(function(){ calculateTotalIIIB(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rpu_local_pub]']").keyup(function(){ calculateTotalIIIB(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rpu_chap_int_pub]']").keyup(function(){ calculateTotalIIIB(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rpu_chap_nat_pub]']").keyup(function(){ calculateTotalIIIB(); calculateTotalAPI(); });
        
        // IIIC
        $("input[name='data[ApiScore][sponp_gabov_30]']").keyup(function(){ calculateTotalIIIC(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][sponp_gabov_5]']").keyup(function(){ calculateTotalIIIC(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][sponp_gabov_50k]']").keyup(function(){ calculateTotalIIIC(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][consp_gabove_10]']").keyup(function(){ calculateTotalIIIC(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][comp_projects_qe]']").keyup(function(){ calculateTotalIIIC(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][proj_patent]']").keyup(function(){ calculateTotalIIIC(); calculateTotalAPI(); });
        
        // IIID
        $("input[name='data[ApiScore][rg_mphil]']").keyup(function(){ calculateTotalIIID(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rg_phd]']").keyup(function(){ calculateTotalIIID(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][rg_thesis_sub]']").keyup(function(){ calculateTotalIIID(); calculateTotalAPI(); });
        
        // III E
        $("input[name='data[ApiScore][refreshc_train_2week]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][refreshc_one_week]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][pap_pp_int]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][pap_pp_nat]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][pap_pp_reg]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][pap_pp_local]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][invited_lec_int]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        $("input[name='data[ApiScore][invited_lec_nat]']").keyup(function(){ calculateTotalIIIE(); calculateTotalAPI(); });
        
        calculateTotalAPI();
    });
</script>