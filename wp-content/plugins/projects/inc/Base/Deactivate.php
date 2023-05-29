<?php

/**
 * @package PMS Plugin
 */

 namespace Inc\Base;

 class Deactivate{
    static function deactivate(){
        flush_rewrite_rules();
    }
 }