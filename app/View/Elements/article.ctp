<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Researcharticle.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Researcharticle.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Researcharticle.{$key}.authors"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.title_of_book"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.title_of_article"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.place_of_publication"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.publisher_ISBN"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.page_no"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>