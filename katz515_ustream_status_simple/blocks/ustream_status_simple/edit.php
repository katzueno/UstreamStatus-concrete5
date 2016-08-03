<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('/form.php', array(
    'uh'        => $uh,
    'al'        => $al,
    'bPath'     => $bPath,
    'ImageType' => $ImageType,
    'ImageOffline' => $ImageOffline,
    'ImageOnline' => $ImageOnline
    )
);

