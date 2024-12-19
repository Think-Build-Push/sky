<?php

class _page_ctlr extends _ctlr
{
	public function __construct()
	{
		parent::__construct( '_page' );
	}

	public function show( string $page ) : void
	{
		$this->obj->show( $page );
	}
}
