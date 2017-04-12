<?php 
echo $this->Html->script('education');
//print_r($this->request->data);
echo $this->Form->create('Education', array('id' => 'Education_Details', 'url' => Router::url( null, true ))); ?>
<div class="main_content_header">2. Educational Qualifications (in chronological order starting from Matric or equivalent and onwards)</div>
<input type="hidden" name="modified" id="modified" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<!--
<fieldset>
    <!--<legend><?php echo __('Educational Qualifications');?></legend>-->
    <table id="grade-table">
        <thead>
            <tr>
                <th>Name of Degree / Diploma / Certificate / Class</th>
                <th>Name of Course</th>
                <th>Board / University</th>
                <th>Grade / CGPA / Division</th>
                <th>Percentage</th>
                <th>Year of Passing</th>
                <th>Subjects</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Education'])) {
                    for ($key = 0; $key < count($this->request->data['Education']); $key++) {
                        echo $this->element('education', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <table>
        <tr>
            <td class="table_headertxt">Gaps in education: If yes, give reason(s) </td>
            <td><?php echo $this->Form->input('Applicant.id', array('type', 'hidden'));
                      echo $this->Form->input('Applicant.gaps_in_education', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
</fieldset>
-->
<fieldset>
    <!--<legend><?php echo __('Educational Qualifications');?></legend>-->
    <table id="grade-table">
        <thead>
            <tr>
                <th>Name of Degree / Diploma / Certificate / Class</th>
                <th>Name of Course</th>
                <th>Board / University</th>
                <th>Mode of Study</th>
                <th>Grade / CGPA / Division</th>
                <th>Percentage</th>
                <th>Year of Passing</th>
                <th>Subjects</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>
                    <?php echo $this->Form->hidden("Education.0.id") ?>
                    <?php echo $this->Form->hidden("Education.0.applicant_id") ?>
                    <?php echo $this->Form->text("Education.0.qualification"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.course"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.board"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.mode_of_study"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.grade"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.percentage"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.year_of_passing"); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Education.0.subjects"); ?>
                </td>
            </tr>
            
            <?php 
                if (is_array($this->request->data['Education'])) {
                    for ($key = 0; $key < count($this->request->data['Education']); $key++) {
                        echo $this->element('education', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <table>
        <tr>
            <td class="table_headertxt">Gaps in education: If yes, give reason(s) </td>
            <td><?php echo $this->Form->input('Applicant.id', array('type', 'hidden'));
                      echo $this->Form->input('Applicant.gaps_in_education', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
</fieldset>
<script id="grade-template" type="text/x-underscore-template">
    <?php echo $this->element('education');?>
</script>

<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('id' => 'formSubmit' , 'div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>

<?php echo $this->Form->end(); ?>
<!--
<script>
$(document).ready(function() {
    var
        gradeTable = $('#grade-table'),
        gradeBody = gradeTable.find('tbody'),
        gradeTemplate = _.template($('#grade-template').remove().text()),
        numberRows = gradeTable.find('tbody > tr').length;

    gradeTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();

            $(gradeTemplate({key: numberRows++}))
                .hide()
                .appendTo(gradeBody)
                .fadeIn('fast');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();

            $(this)
                .closest('tr')
                .fadeOut('fast', function() {
                    $(this).remove();
                });
        });

        if (numberRows === 0) {
            gradeTable.find('a.add').click();
        }
});
</script>
-->
