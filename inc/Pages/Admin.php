<?php
/**
 * @package ariansaniPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

  class Admin extends BaseController{

    public $settings;

    public $callbacks;
    
    public $pages = array();

    public $subpages = array();


    public function register(){
      //add_action('admin_menu', array($this,'add_admin_pages'));
      $this->settings = new SettingsApi();

      $this->callbacks = new AdminCallbacks();

      $this->setPages();

      $this->setSubPages();

      $this->setSettings();
      $this->setSections();
      $this->setFields();

      $this->settings->addPages($this->pages)->withSubPage( 'Dashboard' )->addSubPages($this->subpages)
      ->register();
    }

    public function setPages(){
      $this->pages = array(
        array(
        'page_title'=> 'Arian Sani Plugin',
        'menu_title'=> 'ArianSani',
        'capability'=> 'manage_options', 
        'menu_slug'=> 'ariansani_plugin',
        'callback'=> array($this->callbacks,'adminDashboard'),
        'icon_url'=> 'dashicons-store', 
        'position'=> 110 
        )
      );
    }

    public function setSubpages(){
      $this->subpages =  array(
        array(
            'parent_slug'=> 'ariansani_plugin',
            'page_title'=> 'Custom Post Types',
            'menu_title'=> 'CPT',
            'capability'=> 'manage_options', 
            'menu_slug'=> 'ariansani_cpt',
            'callback'=> array($this->callbacks,'adminCpt')
        ),
        array(
          'parent_slug'=> 'ariansani_plugin',
          'page_title'=> 'Custom Taxonomies',
          'menu_title'=> 'Taxonomies',
          'capability'=> 'manage_options', 
          'menu_slug'=> 'ariansani_taxonomies',
          'callback'=> array($this->callbacks,'adminTaxonomy')
        ),array(
          'parent_slug'=> 'ariansani_plugin',
          'page_title'=> 'Custom Widgets',
          'menu_title'=> 'Widgets',
          'capability'=> 'manage_options', 
          'menu_slug'=> 'ariansani_widgets',
          'callback'=> array($this->callbacks,'adminWidget')
      )
      );
    }

    public function setSettings(){
      $args = array(
        array(
          'option_group' => 'ariansani_options_group',
          'option_name' => 'text_example',
          'callback' => array($this->callbacks,'ariansaniOptionsGroup')
        )
        
      );
      $this->settings->setSettings($args);
    }

    public function setSections(){
      $args = array(
        array(
          'id' => 'ariansani_admin_index',
          'title' => 'Settings',
          'callback' => array($this->callbacks,'ariansaniAdminSection'),
          'page' => 'ariansani_plugin'

        )
        
      );
      $this->settings->setSections($args);
    }

    public function setFields(){
      $args = array(
        array(
          'id' => 'text_example',
          'title' => 'Text Example',
          'callback' => array($this->callbacks,'ariansaniTextExample'),
          'page' => 'ariansani_plugin',
          'section' => 'ariansani_admin_index',
          'args' => array(
            'label_for' => 'text_example',
            'class' => 'example-class'

          )
        )
        
      );
      $this->settings->setFields($args);
    }

  }
  