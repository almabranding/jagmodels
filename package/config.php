<?php
// Always provide a TRAILING SLASH (/) AFTER A PATH
define('LIBS', 'libs/');
define('TEMPDIR', '/');
//$_SERVER['DOCUMENT_ROOT']='/home/borndevelopments.com/web/models';
define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/');

define('ROOT', $_SERVER['DOCUMENT_ROOT'].TEMPDIR.'package/');
define('CACHE', ROOT.'../cache/');
$url=explode("package.",$_SERVER['HTTP_HOST']);
array_shift($url);
define('DOMAIN', $url[0].'/'); 
define('WEB', 'http://siteground.'.DOMAIN); 
define('PACKAGEURL', 'http://package.'.DOMAIN); 

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'jagmodel_site');
define('DB_USER', 'jagmodel_user');
define('DB_PASS', '&xvZaToZc2Lz');
define('DB_PREFIX', 'alma_'); 

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
define('NUMPP',35);
define('UPLOAD', WEB.'uploads/');
@session_start();

