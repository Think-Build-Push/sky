<?php

/**
 *	_setting handles meta settings for teh application such as product name,
 *	default language, etc.
 */

class _setting extends _obj
{
	public function __construct()
	{
		parent::__construct( '_setting' );
	}

	public function get_all() : array|bool
	{
		$sth = $this->query("SELECT * FROM _setting");

		/* PHPStan says this will always be false. This is fully incorrect */
		if( FALSE === $sth )
		{
			$this->fail( $this->get_error_msg() );
			return FALSE;
		}

		$_settings = [];
		while( $_setting = $sth->fetch() )
		{
			$_settings[$_setting['_setting_id']] = $_setting;
		}

		$this->success( '_settings fetched' );
		return $_settings;
	}

	/**
	 * Returns either the setting value or the setting row depending on val_only
	 *
	 * @param string $key _setting_key
	 * @param boolean $val_only
	 * @return mixed
	 */
	public function by_key( string $key, bool $val_only = TRUE ) : mixed
	{
		$setting = $this->get_by_col([ '_setting_key' => $key ]);
		if( FALSE === $setting )
		{
			$this->fail( '_setting->by_key failed' );
			return FALSE;
		}

		$this->success( '_setting->by_key_success' );

		return $val_only ? $setting['_setting_value'] : $setting;
	}
}
