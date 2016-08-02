<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div class="ccm-block-field-group">
    <h2><?php echo $form->label('UstreamURL', t('Ustream Channel'));?></h2>
    <?php echo t('Please type the URL, channel name or ID of your desired Ustream channel (e.g., http://www.ustream.tv/channel/YokosoNews)');?><br />
    <?php echo $form->text('UstreamURL', $UstreamURL, array('style' => 'width: 320px'));?>
</div>
<h2><?php echo $form->label('ImageType', t('Image Type'));?></h2>
<div class="ccm-block-field-group">
    <div>
        <p><?php echo $form->radio('ImageType', 1, $ImageType);?><?php echo t('Small (88x31 pixels)');?></p>
        <p><img src="<?php echo $bPath . "/images/ust_status_1_on.gif"?>" width="88" height="31" alt="<?php echo t('It\'s live now!');?>" /></p>
        <p><img src="<?php echo $bPath . "/images/ust_status_1_off.gif"?>" width="88" height="31" alt="<?php echo t('Live stream is offline')?>" /></p>
    </div>
    <div>
        <p><?php echo $form->radio('ImageType', 2, $ImageType);?> <?php echo t('Medium (190x80 pixels))');?></p>
        <p><img src="<?php echo $bPath . "/images/ust_status_2_on.gif"?>" width="190" height="80" alt="<?php echo t('It\'s live now!');?>" /></p>
        <p><img src="<?php echo $bPath . "/images/ust_status_2_off.gif"?>" width="190" height="80" alt="<?php echo t('Live stream is offline')?>" /></p>
    </div>
    <div>
        <p><?php echo $form->radio('ImageType', 3, $ImageType);?> <?php echo t('Medium Large (300x120 pixels)');?></p>
        <p><img src="<?php echo $bPath . "/images/ust_status_3_on.gif"?>" width="300" height="120" alt="<?php echo t('It\'s live now!');?>" /></p>
        <p><img src="<?php echo $bPath . "/images/ust_status_3_off.gif"?>" width="300" height="120" alt="<?php echo t('Live stream is offline')?>" /></p>
    </div>
    <div>
        <?php echo $form->radio('ImageType', 4, $ImageType);?> <?php echo t('Your own image');?>
    </div>
</div>
<div class="ccm-block-field-group">
    <?php echo $form->label('ImageOffline', t('Custom Offline Image'));?>
	<?php echo $al->image('ImageOffline', 'ImageOffline', t('Select an image'), $ImageOffline); ?>

</div>
<div class="ccm-block-field-group">
    <?php echo $form->label('ImageOnline', t('Custom Online Image'));?>
	<?php echo $al->image('ImageOnline', 'ImageOnline', t('Select an image'), $ImageOnline); ?>
</div>
