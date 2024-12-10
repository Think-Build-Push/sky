<?php

class _util_ctlr extends _ctlr
{
	public function __construct()
	{
		parent::__construct( '_util' );
	}

	/**
	 * Calls _util_obj->check_for_ulids()
	 * DO NOT USE WITHOUT KNOWING WHAT WILL HAPPEN
	 *
	 * @return void
	 */
	public function check_ulids() : void
	{
		// Get all table names
		// Select all ulid columns for all tables
		print( $this->obj->check_for_ulids() );
		exit;
	}

	public function populate_ulids() : void
	{
		$this->obj->populate_ulids();
		exit;
	}

	/**
	 * Returns the minimum table schema for a passed entity name
	 *
	 * @param string $table table name
	 * @return void
	 */
	public function table_def( string $table ) : void
	{
		$tpl = file_get_contents( ADMIN . '/tpl/create_table.tpl' );
		print str_replace( '~~table~~', $table, $tpl );
		exit;
	}
}
