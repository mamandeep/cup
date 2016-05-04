<style type="text/css">

    td {

        /* css-3 */
        white-space: -o-pre-wrap; 
        word-wrap: break-word;
        white-space: pre-wrap; 
        white-space: -moz-pre-wrap; 
        white-space: -pre-wrap; 

    }

    table { 
        table-layout: fixed;
        width: 100%
    }

    .print_required label:after { content:"*"; }

    .print_headers {
        font-size: 12px;
        font-weight: bold;
        color: #0a0;
    }

    .print_value {
        font-size: 12px;
        color: black;
    }

    .misc_col1 {
        width: 45%;
    }

</style>
<?php if($data_set === 'true') {
$this->Html->css('cake.generic.css');
echo $this->Html->script('jquery-1.11.1-min');
?>
<span style="padding: 1px 10px; float: right;">
<?php
    echo $this->Html->link(('Logout'), array('controller'=>'users', 'action'=>'logout'));
?>
</span>
<div id="contentContainer" style="width: 650px; max-width: 650px; margin-left: 100px;">
    <p style="font-size: 28px; font-weight: bold; text-align: center">CENTRAL UNIVERSITY OF PUNJAB</p>
    <p style="font-size: 12px; font-weight: bold; text-align: center">(Established vide Act no 25(2009) of Parliament)</p>
    <p style="font-size: 28px; font-weight: bold; text-align: center">Online Application Form for Teaching Positions</p>
    <p style="font-size: 24px; font-weight: bold; text-align: center">Position: <?php echo $applicant['Applicant']['post_applied_for']?></p>
    <table id="onlineformdata"  class="print_table" style="table-layout:fixed;">
        <tr>
            <td width="40%" class="print_headers">Advertisement No.</td>
            <td width="40%" class="print_value"><?php echo $applicant['Applicant']['advertisement_no'] ?></td>
            <td width="20%"><img src="<?php if(!empty($image['Document']['filename'])) { echo $this->webroot . '/' . $image['Document']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"></td>
        </tr>
        <tr>
            <td width="40%" class="print_headers">Application Number</td>
            <td width="40%" class="print_value"><?php echo $applicant['Applicant']['id'] ?></td>
            <td width="20%"><img src="<?php if(!empty($image['Document']['filename4'])) { echo $this->webroot . '/' . $image['Document']['filename4']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"></td>
        </tr>
        <tr>
            <td class="print_headers">Details of application fee</td>
            <td style="word-wrap: normal;" class="print_value">Transaction ID:<?php echo $applicant['Applicant']['payment_transaction_id']?> Date:<?php echo $applicant['Applicant']['payment_date_created']?> Amount:<?php echo $applicant['Applicant']['payment_amount']?>
            </td>
        </tr>
        <br />
        <tr>
            <td class="print_headers">Name of the Applicant</td>
            <td class="print_value"><?php echo $applicant['Applicant']['first_name']?>&nbsp;<?php echo $applicant['Applicant']['middle_name']?>&nbsp;<?php echo $applicant['Applicant']['last_name']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Gender</td>
            <td class="print_value"><?php echo $applicant['Applicant']['gender']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Date of Birth</td>
            <td class="print_value"><?php echo $applicant['Applicant']['date_of_birth']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Category</td>
            <td class="print_value"><?php echo $applicant['Applicant']['category']?></td>
        </tr>
        <tr>
            <td class="print_headers">Differently Abled</td>
            <td class="print_value"><?php echo $applicant['Applicant']['physically_disabled']?></td>
        </tr>
        <?php if(!empty($applicant['Applicant']['physically_disabled']) && $applicant['Applicant']['physically_disabled'] == "yes") { ?>
            <tr>
                <td class="print_headers" style="padding-left: 20px;">a. Blindness or low vision</td>
                <td class="print_value"><?php echo $applicant['Applicant']['blindness']?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['blindness_pertge']?></td>
            </tr>
            <tr>
                <td class="print_headers" style="padding-left: 20px;">b. Hearing impairment</td>
                <td class="print_value"><?php echo $applicant['Applicant']['hearing']?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['hearing_pertge']?></td>
            </tr>
            <tr>
                <td class="print_headers" style="padding-left: 20px;">c. Locomotor disability or cerebral palsy</td>
                <td class="print_value"><?php echo $applicant['Applicant']['locomotor']?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['locomotor_pertge']?></td>
            </tr>
        <?php } ?>
        <tr>
            <td class="print_headers">Email: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['email']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Mobile No: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['mobile_no']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Father's Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['father_name']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Mother's Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mother_name']?></td>
        </tr>
        <tr>
            <td class="print_headers">Marital Status: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['marital_status']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Aadhar No: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['aadhar_no']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Nationality: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['nationality']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Area</td>
            <td class="print_value"><?php echo $applicant['Applicant']['area']?></td>
        </tr>
        <tr>
            <td class="print_headers">Centre</td>
            <td class="print_value"><?php echo $applicant['Applicant']['centre']?></td>
        </tr>
        <?php if(!empty($applicant['Applicant']['post_applied_for']) && ($applicant['Applicant']['post_applied_for'] == "Professor" || $applicant['Applicant']['post_applied_for'] == "Associate Professor")) { ?>
            <tr>
                <td class="print_headers">Api Score Total</td>
                <td class="print_value"><?php echo $apiscore['ApiScore']['total_api']?></td>
            </tr>
            <tr>
                <td class="print_headers">Api Score (Capped)</td>
                <td class="print_value"><?php echo $apiscore['ApiScore']['total_api_capped']?></td>
            </tr>
        <?php } ?>
    </table>
    <br />
    <div class="print_headers">Education Qualifications</div>
    <table border="1px solid black" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="5%" class="print_headers">Name of Degree / Diploma / Certificate / Class</td>
            <td width="10%" class="print_headers">Course</td>
            <td width="30%" class="print_headers">Board / University</td>
            <td width="5%" class="print_headers">Grade / CGPA / Division</td>
            <td width="5%" class="print_headers">Percentage</td>
            <td width="5%" class="print_headers">Year of Passing</td>
            <td width="10%" class="print_headers">Subjects</td>
        </tr>
        <?php
        foreach($education_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['qualification'] . "</td>";
        echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['course'] . "</td>";
        echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['board'] . "</td>";
        //echo "<td>" . $education_arr[$key]['Education']['system'] . "</td>";
        echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['grade'] . "</td>";
        echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['percentage'] . "</td>";
        echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['year_of_passing'] . "</td>";
        echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['subjects'] . "</td>";
        echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="2" class="print_headers">Gaps in Education: </td>
            <td colspan="5" class="print_value"><?php echo $applicant['Applicant']['gaps_in_education']; ?></td>
        </tr>
    </table>
    <br />
    <!--<p style="page-break-after:always;"></p>-->
    <div class="print_headers">Experience</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td rowspan="2" width="10%" class="print_headers">Designation</td>
            <td rowspan="2" width="10%" class="print_headers">Scale of Pay</td>
            <td rowspan="2" width="10%" class="print_headers">Name & address of University / Institute</td>
            <td rowspan="2" width="10%" class="print_headers">Organization / Institute</td>
            <td colspan="3"><div style="text-align: center" class="print_headers">Period of Experience</div></td>
            <td rowspan="2" width="10%" class="print_headers">Nature Of Work</td>
            <!--<td rowspan="2" width="10%">Sr. No. of Proof Enclosed</td>-->
        </tr>
        <tr>
            <td width="10%" class="print_headers">From Date</td>
            <td width="10%" class="print_headers">To Date</td>
            <td width="10%" class="print_headers">No. of Years/Months(as on date of advertisement)</td>
        </tr>
        <?php
        foreach($exp_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['designation'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['scale_of_pay'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['name_address'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['institute_type'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['from_date'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['to_date'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['no_of_yrs_mnths_days'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['nature_of_work'] . "</td>";
        //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
        echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="1" class="print_headers">Total period of experience</td>
            <td class="print_headers">Years</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_exp_years']; ?></td>
            <td class="print_headers">Months</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_exp_mnths']; ?></td>
            <td class="print_headers">Days</td>
            <td colspan="2" class="print_value"><?php echo $applicant['Applicant']['tot_exp_days']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Gaps in Experience: </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['gaps_in_experience']; ?></td>
        </tr>
    </table>
    <br />
    <div class="print_headers">Research Papers</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="10%" class="print_headers">Authors</td>
            <td width="30%" class="print_headers">Title of the Paper</td>
            <td width="15%" class="print_headers">Journal's Name & Place of Publication</td>
            <td width="20%" class="print_headers">Publication & ISSN</td>
            <td width="15%" class="print_headers">Vol./Page No/Year</td>
            <td width="10%" class="print_headers">Impact Factor</td>
        </tr>
        <?php
        foreach($rpaper_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['authors'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['title'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['name_place_publication'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['publication_ISSN'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['vol_page_year'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['impact_factor'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br />
    <div class="print_headers">Research Articles</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="10%" class="print_headers">Authors</td>
            <td width="30%" class="print_headers">Title of the Book</td>
            <td width="15%" class="print_headers">Title of the Article</td>
            <td width="20%" class="print_headers">Place of Publication</td>
            <td width="15%" class="print_headers">Publisher & ISBN</td>
            <td width="10%" class="print_headers">Page No</td>
        </tr>
        <?php
        foreach($rarticle_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['authors'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['title_of_book'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['title_of_article'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['place_of_publication'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['publisher_ISBN'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['page_no'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br />
    <div class="print_headers">Research Projects</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="30%" class="print_headers">Title of Project</td>
            <td width="10%" class="print_headers">Completed / Ongoing</td>
            <td width="15%" class="print_headers">Funding Agency</td>
            <td width="20%" class="print_headers">As PI/CO-PI or Investigator</td>
            <td width="15%" class="print_headers">Amount of Grant</td>
            <td width="10%" class="print_headers">Duration</td>
        </tr>
        <?php
        foreach($rproject_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['title'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['comp_ongoing'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['funding_agency'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['investigator'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['amount_of_grant'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['duration'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Total Impact Factor as per SCI/SCOPUS</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_impact_sci']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Total Impact Factor as per Google search</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_impact_google']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">h-Index Factor as per SCOPUS</td>
            <td class="print_value"><?php echo $applicant['Applicant']['h_index_scopus']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">h-Index Factor as per Google search</td>
            <td class="print_value"><?php echo $applicant['Applicant']['h_index_google']; ?></td>
        </tr>
        <td class="print_headers">i-10 Index Factor as per Google search</td>
        <td class="print_value"><?php echo $applicant['Applicant']['i10_index_google']; ?></td>
        </tr>
    </table>
    <br/>
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Seminars / Conferences / Workshops / Training programmes, attended</td>
            <td class="print_headers">National (No.)</td>
            <td class="print_headers">International (No.)</td>
            <td class="print_headers">Total (No.)</td>
        </tr>
        <tr>
            <td></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_att_national']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_att_international']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_att_total']; ?></td>
        </tr>
    </table>
    <br/>
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Seminars / Conferences / Workshops / Training programmes, organized</td>
            <td class="print_headers">National (No.)</td>
            <td class="print_headers">International (No.)</td>
            <td class="print_headers">Total (No.)</td>
        </tr>
        <tr>
            <td></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_org_national']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_org_international']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_org_total']; ?></td>
        </tr>
    </table>
    <br/>
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Research Guidance (No. of students guided)</td>
            <td class="print_headers">M.Phil. / Equivalent (No.)</td>
            <td class="print_headers">Ph.D. (No.)</td>
        </tr>
        <tr>
            <td class="print_headers">Completed</td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_mphil_completed']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_phd_completed']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Under supervision</td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_mphil_undersup']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_phd_undersup']; ?></td>
        </tr>
    </table>
    <br/>
    <div class="print_headers">Referees</div>
    <table width="100%" border="1px solid black" style="border-collapse: collapse;">
        <tr>
            <td width="25%"> </td>
            <td width="25%" class="print_headers">Referee 1</td>
            <td width="25%" class="print_headers">Referee 2</td>
            <td width="25%" class="print_headers">Referee 3</td>    
        </tr>
        <tr>
            <td class="print_headers">Name & complete postal addresses</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_add1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_add2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_add3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Email:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_email1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_email2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_email3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Phone (Landline) with STD Code:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_landline1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_landline2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_landline3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Mobile Ph:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_mobile1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_mobile2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_mobile3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Fax:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_fax1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_fax2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_fax3']; ?></td>
        </tr>
    </table>
    <br />
    <div class="print_headers">Present Position</div>
    <table id="present_position_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="10%" class="print_headers">Designation</td>
            <td width="30%" class="print_headers">Name of the University / Institution</td>
            <td width="20%" class="print_headers">Basic Pay(Rs.)</td>
            <td width="15%" class="print_headers">Grade Pay(Rs.)</td>
            <td width="15%" class="print_headers">Gross Pay / Total Salary p.m. (Rs.)</td>
            <td width="10%" class="print_headers">Increment date (Date/Month)</td>
        </tr>
        <tr>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_desig']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_nameuniv']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_basic_pay']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_pay_scale']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_gross_salary']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_increment_date']; ?></td>
        </tr>
    </table>
    <br/>
    <table border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td class="print_headers misc_col1">Time required for joining if selected:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['time_req_for_joining']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Any Other Information/qualification relevant to the post applied for:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['any_other_info']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Membership in Professional Bodies:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mem_pro_bodies']; ?></td>
        </tr>
        <?php if($applicant['Applicant']['mem_pro_bodies'] == "yes") { ?>
        <tr>
            <td class="print_headers misc_col1">Membership Details:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mem_details']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="print_headers misc_col1">Have you ever been punished during your service or convicted by a court of law?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['convicted']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Do you have any case pending against you in any court of law?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['pending_court']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Are you willing to accept the minimum initial pay in the grade?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['willg_min_pay']; ?></td>
        </tr>
        <?php if($applicant['Applicant']['willg_min_pay'] == "no") { ?>
        <tr>
            <td class="print_headers misc_col1">Reason(s):</td>
            <td class="print_value"><?php echo $applicant['Applicant']['min_pay_no']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="print_headers misc_col1">Total number of self-attested documents attached: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['total_self_att_docs_att']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">If selected how would you like to develop your Department/University and your area of interest: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['develop_department']; ?></td>
        </tr>
    </table>
    <br/>
    <!--<p style="page-break-after:always;"></p>-->
    <div class="print_headers">Applicant's Name and Address for correspondence</div>
    <table width="100%" id="address_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="20%"></td>
            <td width="40%" class="print_headers">Mailing Address</td>
            <td width="40%" class="print_headers">Permanent Address</td>
        </tr>
        <tr>
            <td class="print_headers">Name & Complete Address with Pincode</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mailing_address']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['permanent_address']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Phone No. (landline)</td>
            <td class="print_headers">Fax. No.</td>
        </tr>
        <tr>
            <td colspan="2" class="print_value"><?php echo $applicant['Applicant']['landline']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['fax']; ?></td>
        </tr>
    </table>
    <br />
    <div class="print_required">
        <label>Declaration:</label>
        <input type="checkbox" id="declaration" name="declaration"></input>
    </div>
    <p>I, hereby declare that all the statements and entries made in this application are 
        true, complete and correct to the best of my knowledge and belief. No information has been concealed. In the event of any 
        information being found false or incorrect or ineligibility being detected in future 
        at any stage, my candidature may be cancelled by the University.
    </p>
    <div>
        <table>
            <tr>
                <td colspan="3">The hard copy of the completed form with the required enclosures is to be sent by post.</td>
            </tr>
            <tr>
                <td style="width: 40%;"><input type="button" onclick="window.print()" value="Print" style="width: 100px;"/></td>
                <td></td>
                <td style="width: 40%;">
                    <!--<a href="<?php echo $this->webroot; ?>/multi_step_form/wizard/finalsubmit" class="button" id="finalsubmit" style="font-size: 20px;">Final Submit</a>-->
                    <?php echo $this->Form->create('Temp', array('id' => 'Temp_Details', 'url' => Router::url( '/form/final_submit', true ))); ?>
                    <?php echo $this->Form->input('Document.id', array('type' => 'hidden','name' => 'temp', 'value' => 'temp')); ?>
                    <?php echo $this->Form->submit('Final Submit', array('div' => false, 'id' => 'finalsubmit' )); ?>
                    <?php echo $this->Form->end(); ?>
                    <!--<input id="finalsubmit" type="button" value="Final Submit" style="width: 200px;"/>-->
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<script>
    $('document').ready(function () {
        $('#finalsubmit').prop('disabled', true);

        $('#declaration').change(function () {
            if ($(this).is(':checked')) {
                $('#finalsubmit').prop('disabled', false);
            }
            else {
                $('#finalsubmit').prop('disabled', true);
            }
        });
    });

</script>
