<?php

/**
 * @package PMS Plugin
 */

 /*
    Plugin Name: PMS Plugin
    Plugin URI: http://.........
    Description: This is a plugin built for the project management system
    Version: 1.0.0
    Author: Joy Mwende, Patrick Mwaniki
    Author URI: http://pms...............
    Licence: GPLv2 or later
    Text Domain: pms-plugin
*/

//security
if(!function_exists('add_action')){
    echo "You are not allowed to access this page directly";
    exit;
}

//checking if composer exists
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once(dirname(__FILE__).'/vendor/autoload.php');
}


if(class_exists('Inc\\Init')){
    Inc\Init::register_services(); //considers all classes as services
}