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
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>