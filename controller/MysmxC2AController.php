<?php
require_once plugin_dir_path(__FILE__) . '../mysmx-c2a-functions.php';

class MysmxC2AController {
  public $wpdb,$table;

  function __construct() {
    global $wpdb;
    $this->wpdb = $wpdb;
    $this->table = $this->wpdb->prefix . "mysmx_c2a";
  }

}
?>
