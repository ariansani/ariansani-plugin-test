<?php 
/**
 * @package  ariansaniPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class WidgetController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'chat_manager' ) ) return;

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubpages();

		$this->settings->addSubPages( $this->subpages )->register();
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'ariansani_plugin', 
				'page_title' => 'Chat Manager', 
				'menu_title' => 'Chat Manager', 
				'capability' => 'manage_options', 
				'menu_slug' => 'ariansani_chat', 
				'callback' => array( $this->callbacks, 'adminChat' )
			)
		);
	}
}