<?php

/**
 * @package PMS Plugin
 */

 namespace Inc\Base;

 class Activate{
    static function activate(){
        flush_rewrite_rules();
    }
 }