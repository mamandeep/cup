<?php
$key = isset($key) ? $key : '<%= key %>';
$rp = isset($rp) ? $rp : 'completed';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Researchproject.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Researchproject.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Researchproject.{$key}.title"); ?>
    </td>
    <td>
        <?php 
                    echo $this->Form->input("Researchproject.{$key}.comp_ongoing", array(
                    'options' => array('completed' => 'Completed',
                                       'ongoing' => 'Ongoing'
                                       ),
                    'selected' => $rp,
                    'label' => false
                ));
                 ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.funding_agency"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.investigator"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.amount_of_grant"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.duration"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>