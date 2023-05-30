<?php

/**
 * @package PMS Plugin
 */

namespace Inc\Base;

class BaseController
{
    public $pluginpath;
    public $pluginurl;
    public $pluginbasename;

    function __construct()
    {
        $this->pluginpath = plugin_dir_path(dirname(__FILE__, 2));
        $this->pluginurl = plugin_dir_url(dirname(__FILE__, 2));
        $this->pluginbasename = plugin_basename(dirname(__FILE__, 3)) . '/pms.php';
    }
}