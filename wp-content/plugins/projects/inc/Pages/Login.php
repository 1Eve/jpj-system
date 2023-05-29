<?php

/**
 * @package PMS Plugin
 */

 namespace Inc\Pages;

 class Login{
    public function register(){
        add_shortcode('login', [$this, 'LoginForm']);
    }

    public function LoginForm($attrs){
        $details = [
            'title'=> "Enter  your form title here",
        ];

        $attrs = shortcode_atts(
            $details, $attrs, 'login'
        );

        $login = '';
        $login = '<div>';
        $login = '</div>';


        return $login;
    }
 }