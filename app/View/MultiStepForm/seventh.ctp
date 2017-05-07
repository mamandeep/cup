<div id="wrapper">
  <div id="maincontent">
        <table>
            <tr>
                <td colspan="4" style="text-align: center"><div class="main_content_header">Preview Documents</div></td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%"></td>
                <td width="20%"><label style="color: red;">* clear cache to preview latest document.</label></td>
            </tr>
            <tr>
                <td></td>
                <td>Photograph</td>
                <td><img src="<?php if(!empty($image['Document']['filename']) && file_exists(WWW_ROOT . DS . $image['Document']['filename'])) { echo $this->webroot . $image['Document']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"/></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Date of Birth Certificate</td>
                <td><img src="<?php if(!empty($image['Document']['filename2']) && file_exists(WWW_ROOT . DS . $image['Document']['filename2'])) { echo $this->webroot . $image['Document']['filename2']; } else { echo ""; } ?>" alt="Date of Birth Certificate" height="132px" width="132px"/></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Caste Certificate</td>
                <td><img src="<?php if(!empty($image['Document']['filename3']) && file_exists(WWW_ROOT . DS . $image['Document']['filename3'])) { echo $this->webroot . $image['Document']['filename3']; } else { echo ""; } ?>" alt="Caste Certificate" height="132px" width="132px"/></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Signature</td>
                <td><img src="<?php if(!empty($image['Document']['filename4']) && file_exists(WWW_ROOT . DS . $image['Document']['filename4'])) { echo $this->webroot . $image['Document']['filename4']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"/></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>API Proforma</td>
                <td><?php $link = ""; 
                        if(!empty($image['Document']['filename5']) && file_exists(WWW_ROOT . DS . $image['Document']['filename5'])) { 
                            $link = $this->webroot . $image['Document']['filename5'];        
                        } else { 
                            $link = ""; 
                        } ?>
                    <a href="<?php echo $link; ?>" target="_blank">Download</a>
                <td></td>
            </tr>
        </table>
      <?php echo $this->Form->create('Document', array('id' => 'Image_Details', 'url' => Router::url( null, true ))); ?>
        <div class="submit">
            <input type="hidden" name="temp" value="1"/>
            <?php echo $this->Form->submit('Continue', array('div' => false)); ?>
        </div>
      <?php echo $this->Form->end(); ?>
  </div>
</div>