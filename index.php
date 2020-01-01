<?php

require __DIR__."./vendor/autoload.php";

use Redis\RedisCache;

$cache  = new  RedisCache();
$url = 'my-url';
$page= $cache->read($url);
if (!isset($page)){
    //$page=file_get_contents('http://google.com/q='.$url);
    $page=random_int(1, 10000);
    $cache->write($url, $page);
    $cache->expire($url, 10);
}

var_dump($cache->read($url));
