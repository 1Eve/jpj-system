<?php

/**
 * @package Custom_Endpoint
 */

 /**
    * Plugin Name: Custom Endpoint for Fetching Projects
    * Description: Plugin for fetching projects
    * Author: Joy Mwende, Patrick Mwaniki
    * Author URI: http://github.com/.......
    * Plugin URI: http://github.com/.......
    * Version: 1.0.0
    * License: GPLv2 or later
  */

  if(!defined('ABSPATH')){
      die;
  }
  require_once(plugin_dir_path(__FILE__) . 'project-routes.php');


  global $namespace;
$namespace = 'projects/v1';

  class PMS_projects_controller{

    public function activate(){
        $this->create_project();
    }

    public function create_project(){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $project_info = "CREATE TABLE IF NOT EXISTS " . $table . "(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            employee_name text NOT NULL,
            project_title text NOT NULL,
            project_desc text NOT NULL,
            due_date text NOT NULL,
            user_description text NOT NULL,
            status text DEFAULT 'Unlaunched',
            is_deleted int DEFAULT 0
        );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($project_info);
    }
    
      function endpoint_authentication(){
        if(is_user_logged_in()){
            return true;
        } else {
            return false;
        }
       
    }

  }
  
  $controller = new PMS_projects_controller();
  register_activation_hook(__FILE__, array($controller, 'activate'));

  add_action('rest_api_init', 'pms_routes');
  function pms_routes(){
    

    $project_routes = new ProjectRoute();
    $project_routes->register_routes();
  }
