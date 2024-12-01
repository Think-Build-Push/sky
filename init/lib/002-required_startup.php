<?php

use voku\helper\AntiXSS;

$autopopulate_ulids = 0;
if( $_SERVER['IS_DEV'] )
{
	$autopopulate_ulids = 1;
}

define( 'AUTOPOPULATE_ULIDS', $autopopulate_ulids );

$antiXSS = new AntiXSS();


$new_get = [];
if( $_GET )
{
	foreach( $_GET as $key => $val )
	{
		$new_get[$key] = $antiXSS->xss_clean($val);
	}
}

define( '_GET', $new_get );

$new_post = [];
if( 'application/json' == apache_request_headers()['Content-Type'] )
{
	$_POST = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY | JSON_INVALID_UTF8_SUBSTITUTE);
}

if( $_POST )
{
	foreach( $_POST as $key => $val )
	{
		$new_post[$key] = $antiXSS->xss_clean($val);
	}

}

define( '_POST', $new_post );