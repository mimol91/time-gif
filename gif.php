<?php
date_default_timezone_set('UTC');

include('vendor/autoload.php');

$gifCreator = new GifCreator();
$timeGif = new TimeGif($gifCreator);

$timeGif->run();
