<?php

class _lang_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct( '_lang' );
		
		$this->log_chan( '_lang_model' );

		$this->cols = [
						"_lang_id" => "intunsigned",
			"_lang_new" => "timestamp",
			"_lang_edit" => "timestamp",
			"_lang_del" => "timestamp",
			"_lang_arch" => "timestamp",
			"_lang_active" => "tinyint",
			"_lang_name" => "varchar",
			"_lang_iso2" => "char",
			"_lang_iso3" => "char",
			"_lang_ulid" => "varchar"
		];

		$this->select_cols = [
						"_lang_id" => "intunsigned",
			"_lang_new" => "timestamp",
			"_lang_edit" => "timestamp",
			"_lang_active" => "tinyint",
			"_lang_name" => "varchar",
			"_lang_iso2" => "char",
			"_lang_iso3" => "char",
			"_lang_ulid" => "varchar"
		];

		

		$this->full_join = [
			
		];
	}
}
