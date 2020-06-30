<div class="wrap">
  <div id="icon-options-general" class="icon32"> <br>
  </div>
  <h2>Plugin Settings</h2>
  <?php if(isset($_POST['wphw_submit'])){
     require_once(dirname(dirname( dirname( dirname( __FILE__ )))) . '/wp-load.php' );
     global $wpdb;
     if(isset($_POST['wphw_submit'])){
       $username= $_POST['username'];  
       $descriptions = $_POST['descriptions'];
       $Options= $_POST['Options'];
       $table_name = $wpdb->prefix . "plugin_table";
   
       $wpdb->insert( $table_name, array(
                         'username' => $username,
                         'descriptions' => $descriptions,
                         'Options'=>$Options
                         )); 
                        echo'<div id="message" class="updated below-h2">
                        <p>Content added successfully</p>
                      </div>';
                        }}
                        ?>
  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Enter all the informations and click on save button.</strong></h3>
      <form method="post" action="">
      <table class="form-table">
          <tr>
            <th scope="row"></th>
            <td><label> Username : </label><input type="text" name="username" value="" style="width:350px; margin-left:22px;" placeholder="Username" /></td>
          </tr>

          <tr>
            <th scope="row"></th>
            <td><label> Description : </label><textarea name="descriptions" value="" style="width:350px;margin-left:16px;" placeholder="Description"></textarea></td>
          </tr>

          <tr>
            <th scope="row"></th>
            <td><label>Option : </label><select name="Options" style="width:350px;margin-left:45px;">
                <option value="">--Select--</option>
                <option name="OptionA" value="OptionA">Option A</option>
                <option name="OptionB" value="OptionB">Option B</option>
           </td>
          </tr>
          
          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;padding-bottom:10px;">
<input type="submit" name="wphw_submit" value="Save" class="button-primary" style="width:10%;" />
</td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>