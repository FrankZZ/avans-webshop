<?php

// Absolute paden (bestandssysteem)
define ('BASE_DIR',         dirname( $_SERVER['SCRIPT_FILENAME'] ));
define ('CONFIG_DIR',       BASE_DIR . '/config');
define ('IMG_DIR',          BASE_DIR . '/images');
define ('CSS_DIR',          BASE_DIR . '/css');
define ('VIEW_DIR',         BASE_DIR . '/view');
define ('INCLUDE_DIR',      BASE_DIR . '/includes');
define ('MODEL_DIR',        BASE_DIR . '/model');
define ('CONTROLLER_DIR',   BASE_DIR . '/controller');

// Absolute paden (URL)
define ('BASE_URL',     'http://avans.frankwammes.nl');
define ('IMG_URL',      BASE_URL . '/images');
define ('SCRIPT_URL',   BASE_URL . '/js');
define ('CSS_URL',      BASE_URL . '/css');
define ('URI', 			str_replace( 'ict/fmwammes/php/webwinkel/', '', $_SERVER['REQUEST_URI'] ));

define ('DEFAULT_CONTROLLER', 'IndexController');
define ('DEFAULT_CATEGORY', 21);

$config['dbHost']           = 'fwdev.nl';
$config['dbPort']           = 3306;
$config['dbUser']           = 'avanswebshop';
$config['dbPassword']       = 'sPKSRtmAypwVtb2E';
$config['dbDatabase']       = 'avanswebshop';

$links = array
(
	array('name' => 'Home',         'url' => BASE_URL),
	array('name' => 'Catalogus',    'url' => BASE_URL . '/Catalog'),
	array('name' => 'Winkelwagen',  'url' => BASE_URL . '/Cart'),
	array('name' => 'Afrekenen',    'url' => BASE_URL . '/Checkout')
);