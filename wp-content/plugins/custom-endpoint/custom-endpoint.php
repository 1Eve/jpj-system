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

  class PMS_projects_controller{
    public $namespace;
    public $route;

    public function __construct(){
        $this->namespace = 'projects/v1';
        $this->route = 'projects';
    }

    //register the routes
    public function register_routes(){
        register_rest_route(
            $this->namespace,
            $this->route,
            [
                'callback'=>[$this, 'fetch_projects'],
                'method'=>'GET',
                'permission_callback'=> [$this, 'endpoint_authentication'],
                'args'=>[
                    'id'=>[
                        'required'=>true,
                        'validate_callback'=>function($param, $request, $key){
                            return is_numeric($param);
                        }
                    ],
                    'employee_name'=>[
                        'required'=>true,
                        'default'=>1,
                        'validate_callback'=>function($param, $request, $key){
                            return !is_numeric($param);
                        }
                    ]
                    ],
                    'schema'=>[$this, 'projects_schema']
            ]
        );
    }

    public function fetch_projects(WP_REST_Request $request){
        $id = $request->get_param('id');
        $employee_name = $request->get_param('employee_name');

        $args = [
            'post_type'=>'portfolio',
            'status'=>'publish',
            'posts_per_page'=>-10,
            'meta_query'=>[[
                'key'=>$id,
                'value'=>$employee_name
            ]]
            ];

            $the_query = new WP_Query($args);

            $projects = $the_query->posts;
            
            if(empty($projects)){
                return new WP_Error(
                    'no_data_found',
                    'No Data Found',
                    [
                        'status'=>404
                    ]
                    );
            }
            foreach($projects as $project){
                $res = $this->custom_prepare_post($project, $request);
                $info[] = $this->prepare_for_collection($res);
            }

            return $info;
    }



    function endpoint_authentication(){
        if(is_user_logged_in()){
            return true;
        } else {
            return false;
        }
       
    }

    function projects_schema(){
        $schema = [
            'type'=>'object',
            'properties'=>[
                'id'=> [
                    'description' => esc_html__('This is the id of the task', 'my-textdomain'),
                    'type' => 'integer'
                ],
                'employee_name' => [
                    'description'=> esc_html__('This is the person being assigned the task', 'my-textdomain'),
                    'type'=>'string'
                ],
                'project_title' => [
                    'description'=> esc_html__('This is the title of the task', 'my-textdomain'),
                    'type'=>'string'
                ],
                'project_desc' => [
                    'description'=> esc_html__('This is the description of the task', 'my-textdomain'),
                    'type'=>'string'
                ],
                'due_date' => [
                    'description'=> esc_html__('This is the deadline of the task', 'my-textdomain'),
                    'type'=>'date'
                ]
            ]
        ];

        return $schema;
    }

    function custom_prepare_post($post, $request){
        $project_info = [];
        $schema = $this->projects_schema();

        if(isset($schema['properties']['id'])){
            $project_info['id'] = (int) $post->id;
        }
        if(isset($schema['properties']['empolyee_name'])){
            $project_info['empolyee_name'] = (int) $post->empolyee_name;
        }
        if(isset($schema['properties']['project_title'])){
            $project_info['project_title'] = apply_filters('the_title', $post->project_title, $post);
        }
        if(isset($schema['properties']['project_desc'])){
            $project_info['project_desc'] = apply_filters('the_content', $post->project_desc, $post);
        }
        if(isset($schema['properties']['due_date'])){
            $project_info['due_date'] = apply_filters('the_content', $post->due_date, $post);
        }

        return rest_ensure_response($project_info);
    }

    function prepare_for_collection($response){
        if(!($response instanceof WP_REST_Response)){
            return $response;
        }

        $info = (array) $response->get_data();
        $links = rest_get_server()::get_compact_response_links($response);

        if(!(empty($links))){
            $info['_links'] = $links;
        }

        return $info;
    }
  }

  function initialise_controller_class(){
    $controller = new PMS_projects_controller();
    $controller->register_routes();
  }

  add_action('rest_api_init', 'initialise_controller_class');