<table width='100%' cellpadding='0' cellspacing="0" >
	<tr>
            <td>

                <?php if(isset($paymentStatus) && $paymentStatus == "0") {
                        echo "Your payment has been successful.";
                      }
                      else {
                        echo "Your payment failed.";
                      }
                ?>

            </td>
	</tr>
	<?php if(isset($paymentStatus) && $paymentStatus == "0") { ?>
	<tr>
		<td>
			Status: <?php echo $paymentStatusStr ?>
		</td>
		
	</tr>
	<?php } 
	 if(isset($paymentStatus) && $paymentStatus == "0") { ?>
	<tr>
		<td>
			Transaction ID: <?php echo $transID ?>
		</td>
		
	</tr>
	<?php } 
	if(isset($paymentStatus) && $paymentStatus == "0") { ?>
	<tr>
		<td>
			Transaction Amount: Rs. <?php echo $tras_amount ?>
		</td>
		
	</tr>
	<?php } ?>
	<tr>
            <?php if(isset($paymentStatus) && $paymentStatus == "0") { ?>
            <td>
                    <div style="text-align: center; font-size: 30px;">
                    <?php echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/users/dashboard', true ))); ?>
                    <?php echo $this->Form->submit('Continue', array('div' => false, 'id' => 'continue_bt' )); ?>
                    <?php echo $this->Form->end(); ?>
                    <!--<a href="<?php echo $this->webroot; ?>multi_step_form/wizard/first" class="button" id="continue_bt">Continue</a>-->
                    </div>
            </td>
                  <?php }
                  else { 
                    echo "<td>" . isset($error_mesg) ? $error_mesg : "An error has occured during the payment." . "</td>";
                  }
            ?>
	</tr>
</table>
