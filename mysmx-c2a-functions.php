<?php
add_action( 'admin_menu', 'mysmx_c2a_Admin_Link' );

function mysmx_c2a_Admin_Link()
{
 add_menu_page(
 'Call to action',
 'C2A',
 'manage_options',
 'call2action-mysmx/view/admin.php'
 );
}

function mysmx_c2a_install () {
   global $wpdb;
   $table_name = $wpdb->prefix . "mysmx_c2a";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {

      $sql = "CREATE TABLE " . $table_name . " (
    	  id mediumint(9) NOT NULL AUTO_INCREMENT,
    	  name tinytext NOT NULL,
        img VARCHAR(255) NOT NULL,
    	  url VARCHAR(255) NOT NULL,
    	  UNIQUE KEY id (id)
    	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
      $rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'name' => $welcome_name, 'text' => $welcome_text ) );


   }
}

function mysmx_c2a_shortcode($atts) {
  $mysmxc2aBanner = new Mysmxc2aBanner();
  return $mysmxc2aBanner->getBanner($atts['id']);
}

add_shortcode('mysmx_c2a', 'mysmx_c2a_shortcode');
