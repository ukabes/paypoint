<?php
require_once __DIR__.'/vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/paypoint');
$router->map('GET|POST','/', 'PayPoint\Logic\Test::doAction', 'home');
$router->map('GET','/users/[a:s]', array('c' => 'PayPoint\Logic\Test::doAction', 'a' => 'PayPoint\Logic\Test::doAction'));
$router->map('GET','/users/[i:id]', 'PayPoint\Logic\Test::doActionId', 'users_show');
$router->map('GET','/users/[i:id]/[delete|update:action]', 'PayPoint\Logic\Test::doAction', 'users_do');

// match current request
$match = $router->match();

print_r($match);

if( $match ) {
	call_user_func_array( $match['target'], $match['params'] ); 
}else{
	header("HTTP/1.1 200 Found");
}

// print_r($match);
