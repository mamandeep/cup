<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <!--<fieldset>-->
    <table width="100%" style="table-layout: fixed;">
        <tr>
            <td style="width: 50%"><legend><?php echo __('Please enter your username and password'); ?> </legend></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $this->Form->input('email'); ?></td>
        </tr>
        <tr>
            <td>&nbsp;(DD/MM/YYYY)<?php echo $this->Form->input('dob', array('label' => 'Date of Birth')); ?></td>
        </tr>
        <!--
        <tr>
            <td><?php echo $this->Form->input('applicant_id', array('label' => 'Applicant Id.', 
                                                                    'type' => 'text')); ?></td>
        </tr>-->
    </table>
        
    <!--</fieldset>-->
<?php echo $this->Form->end(__('Login')); ?>
<?php echo $this->Html->link(
            'Register!!',
            '/Form/register',
            array('target' => '_blank')
      ); ?>
</div>