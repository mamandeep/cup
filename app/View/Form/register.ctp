<table>
    <tr>    
        <td style="width: 20%"></td>
        <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
            Make Payment: 
        </td>
        <td width="20%"><a href="<?php echo $this->webroot; ?>form/prepayment" class="button" id="payment_bt"  >Click Here</a></td>
        <td></td>
    </tr>
</table>
<?php echo $this->Form->create('Registereduser', array('id' => 'Reg_User_Details', 'url' => Router::url( null, true ))); 
if(isset($this->request->query['payment_status']) && strval(base64_decode($this->request->query['payment_status'])) == "0") { ?>
<div id="contentContainer">
    <table>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                <div class="main_content_header">Register</div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                <?php echo $this->Form->input('Registereduser.id', array('type' => 'hidden'));
                      echo $this->Form->input('Registereduser.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));  ?>
                First Name
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.first_name', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Last Name
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.last_name', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Date of Birth (DD/MM/YYYY)
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.dob', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Email:
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.email', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                Mobile Number:
            </td>
            <td width="20%"><?php echo $this->Form->input('Registereduser.mobile_no', array('label' => false)); ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 20%"></td>
            <td class="table_headertxt" style="padding-top: 17px; width: 20%;">
                <div class="submit">
                    <?php 
                            echo $this->Form->submit('Submit', array('div' => false)); 
                        ?>
                </div>
            </td>
            <td width="20%"></td>
            <td></td>
        </tr>
    </table>
    
</div>
<?php } echo $this->Form->end(); ?>

<script>
    $(document).ready(function () {
        <?php if(isset($this->request->query['payment_status']) && strval(base64_decode($this->request->query['payment_status'])) == "0") { echo "$('#payment_bt').on(\"click\", function (e) {
        e.preventDefault();
    });"; } ?>
        });
</script>