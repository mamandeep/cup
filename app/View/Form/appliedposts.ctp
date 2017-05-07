<style type="text/css">
.table_header {
    font-size: 16px;
    font-weight: bold;
}
</style>
<div>
    <span class="generalinfoheader">List of Applied Posts</span>
    <table width="100%" style="table-layout: fixed;">
        <tr>
            <td width="20%" class="table_header">S.No.</td>
            <td width="20%" class="table_header">Post Applied For</td>
            <td width="40%" class="table_header">Centre</td>
            <td width="20%" class="table_header">Print Form</td>
        </tr>
        <?php
            if(!empty($this->request->data)) {
                foreach($this->request->data as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . ($key + 1) . "</td>";
                    echo "<td>" . $this->request->data[$key]['Post']['post_name'] . "</td>";
                    echo "<td>" . $this->request->data[$key]['Post']['centre'] . "</td>";
                    $url = $this->webroot . "/form/printform?post=" .  $this->request->data[$key]['Post']['post_name'] 
                                          . "&id=" . $this->request->data[$key]['Post']['applicant_id'];
                    echo "<td><a href=\"" . $url .
                        "\" id=\"print_" . $key . "\" style=\"font-size: 20px;\">Click Here</a></td>";
                    echo "</tr>";
                }
            }
        ?>
        <br/>
        <br/>
        <tr>
            <td></td>
            <td>
                <div style="text-align: center; font-size: 30px;">
                    <a href="<?php echo $this->webroot; ?>form/generalinformation" class="button" id="continue_bt">Continue</a>
                </div>
            </td>
            <td></td>
        </tr>
    </table>
</div>
<script>
    $(document).ready(function(){
        var elems = '';
        var no_of_posts = <?php echo !empty($this->request->data) ? count($this->request->data) : "0"; ?>; 
        for(var i=0; i < no_of_posts ; i++) {
            if(i == no_of_posts - 1 ) { 
                elems = elems + '#print_' + i;
            }
            else {
                elems = elems + '#print_' + i + ', ';
            }
        }
        
        $(elems).click(function(){
                window.open(this.href, "PrintForm", "width=800, height=600");
                return false;
        });
    });
</script>