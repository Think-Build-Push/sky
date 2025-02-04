<?php

class _model extends _fail
{
	public function __construct()
	{
		parent::__construct();
		$class_name = str_replace( '_model', '', get_class( $this ) );
		$this->log_chan( $class_name );
	}

	/**
	 * Returns cols defined in child data object
	 *
	 * @return array
	 */
	public function cols() : array|string
	{
		return $this->cols;
	}

	/**
	 * Returns array keys of $cols array
	 *
	 * @return array
	 */
	public function col_names() : array
	{
		return array_keys( $this->cols );
	}

	/**
	 * Returns array of col data by col name
	 *
	 * @param string $col
	 * @return string|array|bool col array
	 */
	public function col( string $col ) : string|array|bool
	{
		return $this->cols[$col] ?? FALSE;
	}

	/**
	 * Returns select_cols in requested format
	 *
	 * @param string $format
	 * @return array|string
	 */
	public function select_cols( string $format = 'string' ) : array|string
	{
		switch( $format )
		{
			case 'array':
				return array_keys( $this->select_cols );
			case 'string':
				return implode( ", ", array_keys( $this->select_cols ) );
		}

		return '';
	}

	/**
	 * Excludes passed column names from select_cols and returns the remaining cols in requested format
	 *
	 * @param array $exceptions
	 * @param string $format 'string' only
	 * @return string|array comma-separated string of col names or an array of col names
	 */
	public function filter_select_cols( array $exceptions = [], string $format = 'string' ) :string|array
	{
		$return = $this->select_cols;
		if( $exceptions )
		{
			foreach( $exceptions as $col_name )
			{
				unset( $return[$col_name] );
			}
		}

		return 'string' == $format ? implode( ", ", array_keys( $return ) ) : array_keys( $return );
	}

	/**
	 * Returns full_join array
	 *
	 * @return array
	 */
	public function full_join() : array
	{
		return $this->full_join;
	}
}
