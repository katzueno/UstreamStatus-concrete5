<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<br />
<?php $uh = Loader::helper('concrete/urls');?>
<?php echo $form->label('UstreamURL', t('Ustream Channel'));?>
<?php echo t('Please type the URL, channel name or ID of your desired Ustream channel (e.g., http://www.ustream.tv/channel/YokosoNews)');?><br />
<?php echo $form->text('UstreamURL', array('style' => 'width: 320px'));?>
<?php echo $form->label('ImageType', t('Image Type'));?>
<?php echo $form->hidden('ImageType', 0);?>
<?php echo $form->radio('ImageType', 1, 1);?> <?php echo t('Small (88x31 pixels)');?><br />
<img src="<?php echo $uh->getBlockTypeAssetsURL($bt,"images/ust_status_1_on.gif")?>" width="88" height="31" alt="<?php echo t('It\'s live now!');?>" />
<img src="<?php echo $uh->getBlockTypeAssetsURL($bt,"images/ust_status_1_off.gif")?>" width="88" height="31" alt="<?php echo t('Live stream is offline')?>" /><br /><br />
<?php echo $form->radio('ImageType', 2, 1);?> <?php echo t('Medium (190x80 pixels))');?><br />
<img src="<?php echo $uh->getBlockTypeAssetsURL($bt,"images/ust_status_2_on.gif")?>" width="190" height="80" alt="<?php echo t('It\'s live now!');?>" />
<img src="<?php echo $uh->getBlockTypeAssetsURL($bt,"images/ust_status_2_off.gif")?>" width="190" height="80" alt="<?php echo t('Live stream is offline')?>" /><br /><br />
<?php echo $form->radio('ImageType', 3, 1);?> <?php echo t('Medium Large (300x120 pixels)');?><br />
<img src="<?php echo $uh->getBlockTypeAssetsURL($bt,"images/ust_status_3_on.gif")?>" width="300" height="120" alt="<?php echo t('It\'s live now!');?>" /><br />
<img src="<?php echo $uh->getBlockTypeAssetsURL($bt,"images/ust_status_3_off.gif")?>" width="300" height="120" alt="<?php echo t('Live stream is offline')?>" />
