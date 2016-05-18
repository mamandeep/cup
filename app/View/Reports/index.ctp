<table>
    <tr>
        <td><a href="<?php echo $this->webroot . 'Reports/index?t=t'; ?>">Download Teaching Report</a></td>
    </tr>
    <tr>
        <td><a href="<?php echo $this->webroot . 'Reports/index?nt=nt'; ?>">Download Non Teaching Report</a></td>
    </tr>
</table>
<?php /* echo $this->Form->create('Reports', array('id' => 'Reports_Details', 
                                'url' => Router::url( null, true ))); 
//print_r($this->request->data);
        ?>
        <table>
            <tr>
                <td><?php 
                    echo $this->Form->input('Reports.id', array('type' => 'hidden'));
                    $dropd = array('teaching' => 'Teaching', 'nonteaching' => 'Non Teaching');
                    echo $this->Form->input('Reports.t_nt', array(
                        'readonly' => 'readonly',
                        'label' => 'Report Type',
                        'options' => $dropd,
                        'default' => 'teaching'
                    )); ?></td>
            </tr>
        </table>
        
        
	<div class="submit">
            <?php echo $this->Form->submit('Download', array('div' => false)); ?>
	</div>
<?php echo $this->Form->end(); */ ?>

<script>
    
    $(document).ready(function () {
        
    });
    
</script>
            
