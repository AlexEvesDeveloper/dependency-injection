<?php

require_once __DIR__.'/../vendor/autoload.php';

use Project\Classes\DependencyInjection\Container;

$container = new Container(array(
	'reader.class' => 'Project\Classes\Readers\JsonReader',
	'reader.url' => 'http://api.indeed.com/ads/apisearch?publisher=3880066252893078&q=graduate&l=&sort=1',
	'reader.max' => 10,
));

// get a ReaderManager, with it's dependencies all handled by the Container
$rm1 = $container->getReaderManager();

// get the VERY SAME instance, doesn;t create more than one instance
$rm2 = $container->getReaderManager();

// prove they are the same
print $rm1 === $rm2; // true, same instance
