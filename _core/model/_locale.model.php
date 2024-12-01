<?php

class _locale_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct( '_locale' );
		
		$this->log_chan( '_locale_model' );

		$this->cols = [
						"_locale_id" => "intunsigned",
			"_locale_new" => "timestamp",
			"_locale_edit" => "timestamp",
			"_locale_del" => "timestamp",
			"_locale_arch" => "timestamp",
			"_locale_active" => "tinyint",
			"fk__lang_id" => "int",
			"_locale_sort" => "smallint",
			"_locale_name" => "varchar",
			"_locale_code" => "varchar",
			"_locale_ulid" => "varchar"
		];

		$this->select_cols = [
						"_locale_id" => "intunsigned",
			"_locale_new" => "timestamp",
			"_locale_edit" => "timestamp",
			"_locale_active" => "tinyint",
			"_locale.fk__lang_id" => "int",
			"_locale_sort" => "smallint",
			"_locale_name" => "varchar",
			"_locale_code" => "varchar",
			"_locale_ulid" => "varchar"
		];

				require_once( MODEL_CORE . '_lang_data.obj.php' );
		$o__lang_data = new _lang_data();
		if( $o__lang_data->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__lang_data->select_cols( 'array' ) );
		}


		$this->full_join = [
						'fk__lang_id' =>
			[
				'table' => '_lang',
				'join_as' => '_lang'
			]
		];
	}
}
