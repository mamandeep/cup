<?php echo $this->Form->create('NewAPIScore', array('id' => 'Applicant_Details', 
                                'url' => Router::url( null, true ))); ?>
<table>
    <tr>
        <td>
            <div class="main_content_header">API Score Details</div>
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('NewAPIScore.id', array('type' => 'hidden'));
            echo $this->Form->input('NewAPIScore.apiscore_cat_2', array('label' => 'API Score Category II:', 'maxlength' => '10'));
         ?></td>
        <td><?php echo $this->Form->input('NewAPIScore.apiscore_cat_3', array('label' => 'API Score Category III:', 'maxlength' => '10'));
        ?></td>
        <td><?php 
            echo $this->Form->input('NewAPIScore.totalapiscore_cat_2_3', array('label' => 'Total API Score Category II & III:', 'maxlength' => '10'));
        ?></td>
    </tr>
</table>
<br/>
<div style="font-weight: bold; font-size: 16px; color: crimson; ">The list of self attested testimonials attached (original to be produced at the time of interview). Please attach in order as applicable.</div>
<br/>
<div style="padding-left: 50px;">
<ol>
    <li><p>Matriculation marksheet / certificate</p></li>
    <li><p>Intermediate marksheet / certificate</p></li>
    <li><p>B.A. / B.Sc. / B.Com (Final) marksheet / degree</p></li>
    <li><p>M.A. / M.Sc. / M.Com (Final) marksheet / degree</p></li>
    <li><p>L.L.B (Final) marksheet / degree</p></li>
    <li><p>L.L.M marksheet / degree</p></li>
    <li><p>M.Phil. degree</p></li>
    <li><p>Ph.D. / D.Phil degree</p></li>
    <li><p>D.Litt, D.Sc., L.L.D degree</p></li>
    <li><p>NET, UGC-JRF, CSIR-JRF Award Certificate</p></li>
    <li><p>Caste Certificate issued by the Government of India (OBC/SC/ST/etc)</p></li>
    <li><p>Experience certificates</p></li>
    <li><p>Recommendation letter(s)</p></li>
    <li><p>Award (s) / Fellowship (s)</p></li>
    <li><p>Publication (s)</p></li></li>
</ol>
</div>

<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>