<?php

/**
 * @package ariansaniPlugin
 * 
 */
/*
Plugin Name: Ariansani Plugin Test
Plugin URI: http://anything.com/plugin
Description: This is my first attempt on writing a custom plugin for this amazing tutorial series.
Version: 1.0.0
Author: Arian Sani
Author URI: http://ariansani.com
License: GPLv2 or later
Text Domain: ariansani-plugin-test
 */

/*This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

//If this filed is called directly, abort!!!
 if(! defined('ABSPATH')){
     die;
 }

 //Require once the composer autoload
 if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
     require_once dirname(__FILE__).'/vendor/autoload.php';
 }


/**
 * The code that runs during plugin activation
 */
function activate_ariansani_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__,'activate_ariansani_plugin');


/**
 * The code that runs during plugin deactivation
 */
function deactivate_ariansani_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__,'deactivate_ariansani_plugin');

/**
 * Initialize all the core classes of the plugin
 */
 if (class_exists('Inc\\Init')){
     Inc\Init::register_services();
 }