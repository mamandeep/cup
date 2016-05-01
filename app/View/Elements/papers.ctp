<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Researchpaper.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Researchpaper.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Researchpaper.{$key}.authors"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.title"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.name_place_publication"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.publication_ISSN"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.vol_page_year"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.impact_factor"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>