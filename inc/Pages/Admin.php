<?php
/**
 * @package ariansaniPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

  class Admin extends BaseController{

    public $settings;
    
    public $pages = array();

    public $subpages = array();

    public function __construct(){
      $this->settings = new SettingsApi();

      $this->pages = array(
        array(
        'page_title'=> 'Arian Sani Plugin',
        'menu_title'=> 'ArianSani',
        'capability'=> 'manage_options', 
        'menu_slug'=> 'ariansani_plugin',
        'callback'=> function(){echo '<h1>Arian Sani Plugin</h1>';},
        'icon_url'=> 'dashicons-store', 
        'position'=> 110 
        )
      );

      $this->subpages =  array(
        array(
            'parent_slug'=> 'ariansani_plugin',
            'page_title'=> 'Custom Post Types',
            'menu_title'=> 'CPT',
            'capability'=> 'manage_options', 
            'menu_slug'=> 'ariansani_cpt',
            'callback'=> function(){echo '<h1>CPT Manager</h1>';}
        ),
        array(
          'parent_slug'=> 'ariansani_plugin',
          'page_title'=> 'Custom Taxonomies',
          'menu_title'=> 'Taxonomies',
          'capability'=> 'manage_options', 
          'menu_slug'=> 'ariansani_taxonomies',
          'callback'=> function(){echo '<h1>Taxonomies Manager</h1>';}
        ),array(
          'parent_slug'=> 'ariansani_plugin',
          'page_title'=> 'Custom Widgets',
          'menu_title'=> 'Widgets',
          'capability'=> 'manage_options', 
          'menu_slug'=> 'ariansani_widgets',
          'callback'=> function(){echo '<h1>Widgets Manager</h1>';}
      )
      );


    }

    public function register(){
      //add_action('admin_menu', array($this,'add_admin_pages'));
     
      $this->settings->addPages($this->pages)->withSubPage( 'Dashboard' )->addSubPages($this->subpages)->register();
    }

  }
  