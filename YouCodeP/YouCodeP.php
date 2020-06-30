<?php
/*
Plugin Name: YoucodeP
Description: Juste une preiere extension de wordpress Simple.
Version: 1.0
Author: Mohamed OUBOUHIA
Author URI: https://mednoor.blogspot.com
License: GPLv2 or later
Text Domain: YoucodePlugin
*/
?>
<?php
add_action('admin_menu', 'my_admin_menu');

function my_admin_menu () {
    
	 //parameters details
	 //add_management_page($page_title, $menu_title, $capability,$menu_slug, $function);
    
	 //add a new setting page under setting menu
    //  add_management_page('Description', 'Description', 'manage_options',__FILE__,'Description_admin_page');
     //add new menu and its sub menu 
    add_menu_page('Description title', 'YouCodeP', 'manage_options','Description_page', 'Description_admin_page');
    add_submenu_page( 'Description_page', 'Page title', 'Settings','manage_options', 'Settings', 'mt_settings_page');
   
    
}


function Description_admin_page () {
  global $wpdb;
  $table_name = $wpdb->prefix . "plugin_table";
  $result = $wpdb->get_results( "SELECT * FROM $table_name"); 
  echo '<div class="wrap">
  <h1>Hello!</h1>
  <p>it is a plugin with two submenus. A page for the general description of my plugin.Configuration page an input text field, textarea for the description,
     an option list and a save button
  </p>
  <h1 style="margin-left:10px; margin-bottom:20px; color:blue;">List of information</h1>
  <table style="width:80%;"align="center" border="1">
  <tr>
  <td style="height:50px;">Username</td>
  <td style="height:50px;">Description</td>
  <td style="height:50px;">Option</td>';
  foreach($result as $row){   
        
    ?>
    <tr>

        <td><?php echo $row->username ;?></td>
        <td><?php echo $row->descriptions ;?></td>
        <td><?php echo $row->Options ;?></td>
    </tr>
 
    <?php
}
echo"
  </table>
</div>";
}

// mt_settings_page() displays the page content for the Test Settings submenu
function mt_settings_page() {
    echo "<h2>" . __( 'Settings Configurations', 'menu-test' ) . "</h2>";
	include_once('setting.php');
}
register_activation_hook( __FILE__, 'create_table' );

function create_table(){
    global $wpdb;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = $wpdb->prefix . "plugin_table";  

    $sql = "CREATE TABLE $table_name (
      id int(10) unsigned NOT NULL AUTO_INCREMENT,
      username varchar(255) NOT NULL,
      descriptions varchar(255) NOT NULL,
      Options varchar(255) NOT NULL,
      PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    dbDelta( $sql );
}

// Runs when plugin is desactivated
register_deactivation_hook( __FILE__, 'remove_table' );

function remove_table() {
    global $wpdb;
     $table_name = $wpdb->prefix . 'plugin_table';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
} 
?>
