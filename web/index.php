<?php

require_once __DIR__.'/../vendor/autoload.php';

use Project\Classes\DependencyInjection\Container;

$container = new Container(array(
	'reader.url' => 'http://api.indeed.com/ads/apisearch?publisher=3880066252893078&q=graduate&l=&sort=1',
	'reader.max' => 10,
));

$rm = $container->getReaderManager();

print '<pre>';
print_r($rm);