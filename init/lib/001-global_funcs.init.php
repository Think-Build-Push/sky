<?php

function p( mixed $print, bool $force_print = FALSE ) : bool
{
	if( !$_SERVER['IS_DEV'] )
	{
		return FALSE;
	}

	if( _cli() )
	{
		print_r( $print );
		print "\n";
	}
	else
	{
		print "<pre>";
		print_r( $print );
		print "</pre>\n";
	}

	return TRUE;
}

function _cli() : bool
{
	if( !$_SERVER['REMOTE_ADDR'] && !$_SERVER['HTTP_USER_AGENT'] && count( $_SERVER['argv'] ) )
	{
		return TRUE;
	}

	return FALSE;
}
