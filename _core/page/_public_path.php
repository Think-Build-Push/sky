<?php

/**
 * Add any _public_path page loading code here
 */

$_tpl->assign( 'page_title', '_public_path' );


print $_tpl->parse( $page_tpl );