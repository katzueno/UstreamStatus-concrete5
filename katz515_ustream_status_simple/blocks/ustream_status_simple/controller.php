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
		return t("Ustream Status Simple");
	}

	function save($args) {
		$data = array();
		$url = preg_replace("#^.*/([^/]+)/?$#",'${1}',$args['UstreamURL']);
		$data['UstreamURL'] = $url;
		if (empty($args['ImageType'])) $args['ImageType'] = 1;
		$data['ImageType'] = $args['ImageType'];
		$data['ImageOnline'] = $args['ImageOnline'];
		$data['ImageOffline'] = $args['ImageOffline'];
		parent::save($data);
	}

    public function add(){
        $uh = Loader::helper('concrete/urls');
        $this->set('uh', $uh);
        $al = Loader::helper('concrete/asset_library');
        $this->set('al', $al);
        $bt = BlockType::getByHandle('katz515_ustream_status_simple');
        $bPath = $uh->getBlockTypeAssetsURL($bt);
        $this->set('bPath', $bPath);
    }

	public function edit() {
        $uh = Loader::helper('concrete/urls');
        $this->set('uh', $uh);
        $al = Loader::helper('concrete/asset_library');
        $this->set('al', $al);
        $bt = BlockType::getByHandle('katz515_ustream_status_simple');
        $bPath = $uh->getBlockTypeAssetsURL($bt);
        $this->set('bPath', $bPath);

		$this->set('OfflineImage', (empty($this->OfflineImage) ? null : $this->get_image_object($this->OfflineImage, 0, 0, false)));
		$this->set('OnlineImage', (empty($this->OnlineImage) ? null : $this->get_image_object($this->OfflineImage, 0, 0, false)));
	}

	function view() {
		$opt = stream_context_create(array(
			'http' => array( 'timeout' => 3 )
		));
		$fh = Loader::helper('file');
		$js = Loader::helper('json');
		$UstChannelMetaTags = array();
		$UstChannelMetaTags = @get_meta_tags('http://www.ustream.tv/channel/' . $this->UstreamURL);
		$UstChannelID = intval($UstChannelMetaTags['ustream:channel_id']);
		if ($UstChannelID) {
    		$r = $fh->getContents('https://api.ustream.tv/channels/'. $this->UstreamURL .'.json');
    		$channel = $js->decode($r);
    		$this->set('status',$channel->channel->status);
    		$this->set('url',$channel->tinyurl);
    		$this->set('channel',$channel->channel);
            if ($ImageType == 4) {
                if (is_object($OfflineImage) && is_object($OnlineImage)) {
                    $OfflineImage = empty($this->OfflineImage) ? null : $this->get_image_object($this->OfflineImage, 0, 0, false);
                    $OfflineImageURL = $OfflineImage->src;
                    $OnlineImage = empty($this->OnlineImage) ? null : $this->get_image_object($this->OfflineImage, 0, 0, false);
                    $OnlineImageURL = $OnlineImage->src;
                }
            } else {
                $uh = Loader::helper('concrete/urls');
                $btID = $b->getBlockTypeID();
                $bt = BlockType::getByID($btID);
                $OnlineImageURL = $uh->getBlockTypeAssetsURL($bt,"images/ust_status_{$ImageType}_on.gif");
                $OfflineImageURL = $uh->getBlockTypeAssetsURL($bt,"images/ust_status_{$ImageType}_off.gif");
            }
		}
	}

	private function get_image_object($fID, $width = 0, $height = 0, $crop = false) {
		if (empty($fID)) {
			$image = null;
		} else if (empty($width) && empty($height)) {
			//Show image at full size (do not generate a thumbnail)
			$file = File::getByID($fID);
			$image = new stdClass;
			$image->src = $file->getRelativePath();
			$image->width = $file->getAttribute('width');
			$image->height = $file->getAttribute('height');
		} else {
			//Generate a thumbnail
			$width = empty($width) ? 9999 : $width;
			$height = empty($height) ? 9999 : $height;
			$file = File::getByID($fID);
			$ih = Loader::helper('image');
			$image = $ih->getThumbnail($file, $width, $height, $crop);
		}
		return $image;
	}
	
}
