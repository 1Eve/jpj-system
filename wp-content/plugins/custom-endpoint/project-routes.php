<?php

/**
 * @package Custom_Endpoint
 */

 class ProjectRoute{

    public function register_routes(){
        register_rest_route(
            'projects/v1',
            '/projects/',
            [
                'callback'=>[$this, 'fetch_projects'],
                'method'=>'GET',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            '/projects/',
            [
                'callback'=>[$this, 'create_project'],
                'methods'=>'POST',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            'projects/(?P<id>\d+)',
            [
                'callback'=>[$this, 'single_projects'],
                'methods'=>'GET',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            'projects/(?P<id>\d+)',
            [
                'callback'=>[$this, 'update_project'],
                'methods'=>'PUT',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            'projects/(?P<id>\d+)',
            [
                'callback'=>[$this, 'delete_project'],
                'methods'=>'DELETE',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            'projects/deleted',
            [
                'callback'=>[$this, 'deleted_project'],
                'methods'=>'GET',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            '/projects/unlaunched',
            [
                'callback'=>[$this, 'fetch_unlaunched_projects'],
                'method'=>'GET',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            '/projects/launched',
            [
                'callback'=>[$this, 'fetch_launched_projects'],
                'method'=>'GET',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

        register_rest_route(
            'projects/v1',
            '/projects/completed',
            [
                'callback'=>[$this, 'fetch_completed_projects'],
                'method'=>'GET',
                'permission_callback'=> [$this, 'endpoint_authentication']
            ]
        );

    }

    public function fetch_projects(){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $projects = $wpdb->get_results("SELECT * FROM $table where is_deleted=0");
        return $projects;
    }

    public function create_project($data){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $project = [
            'employee_name' => $data['employee_name'],
            'project_title' => $data['project_title'],
            'project_desc' => $data['project_desc'],
            'due_date' => $data['due_date'],
        ];
        $wpdb->insert($table, $project);
        return $project;
    }

    public function single_projects($data){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $id = $data['id'];
        $project = $wpdb->get_row("SELECT * FROM $table WHERE id = $id");
        return $project;
    }

    public function update_project($data){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $project = [
            'employee_name' => $data['employee_name'],
            'project_title' => $data['project_title'],
            'project_desc' => $data['project_desc'],
            'due_date' => $data['due_date'],
        ];
        $id = $data['id'];
        $condition = ['id' => $id];
        $wpdb->update($table, $project, $condition);
        return $project;
    }

    public function delete_project($data){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $id = $data['id'];
        $wpdb->query("UPDATE $table SET is_deleted=1 WHERE id=$id");
        return 'Project Deleted';
    }

    public function deleted_project(){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $projects = $wpdb->get_results("SELECT * FROM $table WHERE is_deleted=1");
        return $projects;
    }

    public function fetch_unlaunched_projects(){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $projects = $wpdb->get_results("SELECT * FROM $table WHERE status='Unlaunched' AND is_deleted=0");
        return $projects;
    }

    public function fetch_launched_projects(){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $projects = $wpdb->get_results("SELECT * FROM $table WHERE status='Launched' AND is_deleted=0");
        return $projects;
    }

    public function fetch_completed_projects(){
        global $wpdb;
        $table = $wpdb->prefix . 'projects';
        $projects = $wpdb->get_results("SELECT * FROM $table WHERE status='Completed' AND is_deleted=0");
        return $projects;
    }

    function endpoint_authentication(){
        if(is_user_logged_in()){
            return true;
        } else {
            return false;
        }
       
    }
 }