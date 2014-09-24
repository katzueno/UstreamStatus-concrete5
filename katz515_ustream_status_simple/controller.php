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

class Katz515UstreamStatusSimplePackage extends Package {

	protected $pkgHandle = 'katz515_ustream_status_simple';
	protected $appVersionRequired = '5.3.3';
	protected $pkgVersion = '1.0.1';
	
	public function getPackageDescription() { 
		return t("Display the live or offline status of a desired Ustream channel");
	}
	
	public function getPackageName() {
		return t("Ustream Status Simple");
	}
	
	public function install() {
		$pkg = parent::install();	
		BlockType::installBlockTypeFromPackage('ustream_status_simple', $pkg); 
	}

}