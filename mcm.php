<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
Module Name: mcm
Description: mcm
Version: 1.0
Author: Brainfoodmedia
*/
define('mcm_MODULE_NAME', 'mcm');
define('mcm_MODULE_PATH', 'modules/mcm/');
mcm_module_activation_hook();
function mcm_module_activation_hook() {
    $CI = &get_instance();
 require_once(__DIR__ . '/install.php');
}  
hooks()->add_action('admin_init', 'mcm_module_init_menu_items'); 
function mcm_module_init_menu_items() {
    $CI = &get_instance();

    if (is_admin()) {
        $CI->app_menu->add_sidebar_menu_item('mcm', [
            'slug' => 'mcm',
            'name' => _l('mcm'),
            'icon' => 'fa fa-area-chart',   
            'href' => admin_url('mcm/mcm_vendor'),
            'position' => 1,
        ]);
    }
}
?>
