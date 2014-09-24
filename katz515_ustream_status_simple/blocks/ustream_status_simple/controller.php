<?php 
/**
 * @package Blocks
 * @subpackage BlockTypes
 * @category Concrete
 * @author Katz Ueno <katz515@deerstudio.com> & Kazuo Yamanoi <kyamanoi@gmail.com>
 * @copyright  Copyright (c) 2011 deerstudio, inc. & deerstudio, LLC. (http://www.deerstudio.com)
 * @license    MIT License
 *
 */

/**
 * Displays the live/offline status of a desired Ustream channel
 *
 * @package Blocks
 * @subpackage BlockTypes
 * @author Katz Ueno <katz515@deerstudio.com> & Kazuo Yamanoi <kyamanoi@gmail.com>
 * @category Concrete
 * @copyright  Copyright (c) 2011 deerstudio, inc. & deerstudio, LLC. (http://www.deerstudio.com)
 * @license    MIT License
 *
 */
defined('C5_EXECUTE') or die(_("Access Denied."));
class UstreamStatusSimpleBlockController extends BlockController {
	var $pobj;
	protected $btTable = 'btUstreamStatusSimple';
	protected $btInterfaceWidth = "400";
	protected $btInterfaceHeight = "300";	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = true;
	protected $btCacheBlockOutputLifetime = 300;

	public function getBlockTypeDescription() {
		return t("Display the live or offline status of a desired Ustream channel");
	}
	
	public function getBlockTypeName() {
		return t("Livecasting Status Pro");
	}

	function save($args) {
		$data = array();
		$url = preg_replace("#^.*/([^/]+)/?$#",'${1}',$args['UstreamURL']);
		$data['UstreamURL'] = $url;
		$data['ImageType'] = $args['ImageType'];
		parent::save($data);
	}

	function view() {
		$opt = stream_context_create(array(
			'http' => array( 'timeout' => 3 )
		));
		$r = @file_get_contents('http://api.ustream.tv/php/channel/'. $this->UstreamURL .'/getValueOf/status',0,$opt);
		$ust = unserialize($r);
		$this->set('results',$ust['results']);
	}
}