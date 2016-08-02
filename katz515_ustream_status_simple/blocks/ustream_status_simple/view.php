<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div class='UstreamStatus'>
<?php
switch ($status)
	{
	// ONLINE: Insert the HTML for online status
	case 'live':
		?>
		<a href="<?php echo $url ?>" alt="<?php echo t('It\'s live now!');?>" target="_blank">
		<img src="<?php echo $OnlineImageURL; ?>" alt="<?php echo t('It\'s live now!')?>" /></a>
<?php
	break;
	// OFFLINE: Insert the HTML for offline status
	case 'offair':
?>
		<a href="<?php echo $url ?>" alt="<?php echo t('Visit our Ustream channel');?>" ta
rget="_blank">
		<img src="<?php echo $OfflineImageURL;?>" alt="<?php echo t('Live stream is offline')?>" /></a>
<?php
	break;
	default:
?>
		<?php echo t('ERROR: Unable to retrieve Ustream channel. Please review your channel name.');
	}
?>
</div>
