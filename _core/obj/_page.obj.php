<?php

class _page extends _fail
{
	private object $_tpl;
	
	/**
	 * _page doesn't use the database at all
	 * so it is the only object that inherits from _fail
	 */
	public function __construct()
	{
		// the obj name name is used to set
		// the log channel and the table for
		// the obj to work with. Change this
		// if the obj works with another table
		parent::__construct();

		global $_tpl;
		$this->_tpl = $_tpl;
	}

	public function show( string $page ) : void
	{
		$page_script = '';
		$page_tpl = '';
		if( str_starts_with( $page, '_' ) )
		{
			$page_script = PAGE_CORE . $page . '.php';
			$page_tpl = TPL_CORE . '/page/' . $page . '.html';
		}
		else
		{
			$page_script = PAGE_APP . $page . '.php';
			$page_tpl = TPL_APP . '/page/' . $page . '.html';
		}
	
		try
		{
			if( !file_exists( $page_script ) )
			{
				throw new Exception( 'page_does_not_exist: ' . $page_script );
			}
			else
			{
				$this->_tpl->assign( '_co', (new _co())->_co() );
				$this->_tpl->assign( 'me', (new _mem())->me() );

				// So the page_script can use the same _tpl object for all assignments
				$_tpl = $this->_tpl;
				require_once( $page_script );
			}
		}
		catch( Exception $e )
		{
			$this->_tpl->assign( 'message', $e->getMessage() );
			print $this->_tpl->parse( TPL_CORE . 'error/_404.html' );
		}
	
		exit;
	}
}
