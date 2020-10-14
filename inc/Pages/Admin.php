<?php
/**
 * @package ariansaniPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

  class Admin extends BaseController{

    public $settings;
    

    public function __construct(){
      $this->settings = new SettingsApi();
    }

    public function register(){
      //add_action('admin_menu', array($this,'add_admin_pages'));
      $pages = [
        [
        'page_title'=> 'Arian Sani Plugin',
        'menu_title'=> 'ArianSani',
        'capability'=> 'manage_options', 
        'menu_slug'=> 'ariansani_plugin',
        'callback'=> function(){echo '<h1>Arian Sani Plugin</h1>';},
        'icon_url'=> 'dashicons-store', 
        'position'=> 110 
        ],
        [
          'page_title'=> 'Test Plugin',
          'menu_title'=> 'Test',
          'capability'=> 'manage_options', 
          'menu_slug'=> 'test_plugin',
          'callback'=> function(){echo '<h1>External Plugin</h1>';},
          'icon_url'=> 'dashicons-external', 
          'position'=> 9 
        ]
      ];

      $this->settings->addPages($pages)->register();
    }

  //      public function add_admin_pages(){
  //      add_menu_page( 'Arian Sani Plugin', 'ArianSani', 'manage_options', 'ariansani_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );

  //     }

  //  public function admin_index(){
  //      require_once $this->plugin_path.'templates/admin.php';
  //      //require template
  //  }

  }
  