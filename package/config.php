<?php
// Always provide a TRAILING SLASH (/) AFTER A PATH
define('LIBS', 'libs/');
define('TEMPDIR', '/models/');
//$_SERVER['DOCUMENT_ROOT']='/home/borndevelopments.com/web/models';
define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/');

define('ROOT', $_SERVER['DOCUMENT_ROOT'].TEMPDIR.'package/');
define('CACHE', ROOT.'../cache/');
$url=explode("package.",$_SERVER['HTTP_HOST']);
array_shift($url);
define('DOMAIN', $url[0].'/'); 
define('WEB', 'http://models.'.DOMAIN); 
define('PACKAGEURL', 'http://package.'.DOMAIN); 

$url=explode(".",$_SERVER['HTTP_HOST']);
$sumdomain=array_shift($url);
switch($sumdomain){
    case 'models':
        $red=explode("/",$_SERVER['REQUEST_URI']);
        header('location: '.WEB.'gallery/model/'.$red[2]);
}

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'almamodels');
define('DB_USER', 'almabranding');
define('DB_PASS', 'branding');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
define('NUMPP',35);
define('UPLOAD', WEB.'uploads/');
@session_start();

