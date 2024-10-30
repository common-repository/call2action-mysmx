<?php
/*
Plugin Name: Call2Action (mysmx)
Description: Call to action. Adding a banner and link anywhere on the site.
Author: Maxim Shevtsov
Version: 1.0.1
*/

require_once plugin_dir_path(__FILE__) . 'controller/MysmxC2ABanner.php';
register_activation_hook(__FILE__,'mysmx_C2A_install');
