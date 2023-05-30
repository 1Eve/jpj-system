<?php

/**
 * @package PMS Plugin
 */

 namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueuestyles extends BaseController{
    public function register(){
        add_action('admin_enqueue_scripts', [$this, 'pmsScripts']);
    }

    function pmsScripts(){
        // var_dump($this->plugin_url.'assets/mystyle.css');
        wp_enqueue_style('pmspluginstyles', $this->pluginurl.'assets/mystyle.css');
        wp_enqueue_script('pms13pluginscript', $this->pluginurl.'assets/myscript.js');
    }
}