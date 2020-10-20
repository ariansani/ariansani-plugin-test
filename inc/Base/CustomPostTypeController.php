<?php
/**
 * @package ariansaniPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
 * 
 */
class CustomPostTypeController extends BaseController{
    
    public $callbacks;

    public $subpages = array();

    public function register(){

        $option = get_option('ariansani_plugin');

        $activated = isset($option['cpt_manager'])? $option['cpt_manager'] :false;

        if(!$activated){
            return;
        }


        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();
        $this->setSubpages();
        
      $this->settings->addSubPages($this->subpages)
      ->register();
        add_action('init', array($this,'activate'));
    }

    public function setSubpages(){
        $this->subpages =  array(
          array(
              'parent_slug'=> 'ariansani_plugin',
              'page_title'=> 'Custom Post Types',
              'menu_title'=> 'CPT Manager',
              'capability'=> 'manage_options', 
              'menu_slug'=> 'ariansani_cpt',
              'callback'=> array($this->callbacks,'adminCpt')
          )
        //   ,array(
        //     'parent_slug'=> 'ariansani_plugin',
        //     'page_title'=> 'Custom Taxonomies',
        //     'menu_title'=> 'Taxonomies',
        //     'capability'=> 'manage_options', 
        //     'menu_slug'=> 'ariansani_taxonomies',
        //     'callback'=> array($this->callbacks,'adminTaxonomy')
        //   ),array(
        //     'parent_slug'=> 'ariansani_plugin',
        //     'page_title'=> 'Custom Widgets',
        //     'menu_title'=> 'Widgets',
        //     'capability'=> 'manage_options', 
        //     'menu_slug'=> 'ariansani_widgets',
        //     'callback'=> array($this->callbacks,'adminWidget')
        // )
        );
      }

    public function activate(){
        register_post_type('ariansani_products',
        array(
            'labels'=> array(
                'name' => 'Products',
                'singular_name' => 'Product'
            ),
            'public' => true,
            'has_archive' => true,
             ));
    }
}