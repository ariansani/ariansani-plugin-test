<?php
/**
 * @package ariansaniPlugin
 */
namespace Inc\Base;

 class Activate{
     public static function activate(){
         flush_rewrite_rules();

         if(get_option('ariansani_plugin')){
             return;
         } //if it is set, return and stop running the script. 

         $default = array();
         update_option('ariansani_plugin',$default);


     }
 }