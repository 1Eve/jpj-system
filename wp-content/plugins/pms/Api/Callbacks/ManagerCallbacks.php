<?php

/**
 * @package PMS Plugin
 */

 namespace Inc\Api\Callbacks;

 use Inc\Base\BaseController;

 class ManagerCallbacks extends BaseController{
    public function Addemployees(){
        return require_once $this->pluginpath. 'templates/AddEmployees.php';
    }
 }