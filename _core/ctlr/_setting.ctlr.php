<?php

/**
 *	_setting_ctlr auto-generated
 */

class _setting_ctlr extends _ctlr
{
	public function __construct()
	{
		parent::__construct( '_setting' );
	}

	public function get_all() : array|bool
	{
		// Rather than a simple list,
		// this will get a fully joined list
		$_settings = $this->obj->get_all();
		if( FALSE === $_settings )
		{
			$this->fail( $this->obj->get_error_msg() );
			return FALSE;
		}

		$this->success( '_settings fetched' );
		return $_settings;
	}

	/**
	 * Gets necessary base settings for each page load for things like product name, copyright, etc.
	 *
	 * @TODO should be moved to obj
	 * @return array|boolean array of base settings or FALSE on error
	 */
	public function get_base_settings() : array|bool
	{
		$this->obj->paginate( FALSE );
		$settings = $this->obj->get_by_col(['_setting_is_sensitive' => 0]);

		if( FALSE === $settings )
		{
			$this->fail( 'base_settings_not_fetched' );
			return FALSE;
		}

		if( $settings )
		{
			$return = [];
			foreach( $settings as $id => $setting )
			{
				$return[$setting['_setting_key']] = $setting['_setting_value'];
			}

			$return = array_column( $settings, '_setting_value', '_setting_key');
			$this->success( 'base_settings_fetched' );
			return $return;
		}

		$this->success( 'no_base_settings_to_fetch' );
		return [];
	}
}
