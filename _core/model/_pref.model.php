<?php

class _pref_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct( '_pref' );
		
		$this->log_chan( '_pref_model' );

		$this->cols = [
						"_pref_id" => "intunsigned",
			"_pref_new" => "timestamp",
			"_pref_edit" => "timestamp",
			"_pref_del" => "timestamp",
			"_pref_arch" => "timestamp",
			"_pref_active" => "tinyint",
			"_pref_for__mem" => "tinyint",
			"_pref_for__co" => "tinyint",
			"_pref_allow_custom_val_on" => "tinyint",
			"_pref_allow_custom_val_of" => "tinyint",
			"_pref_name" => "varchar",
			"_pref_on_val" => "varchar",
			"_pref_off_val" => "varchar",
			"_pref_group_name" => "varchar",
			"_pref_group_key" => "varchar",
			"_pref_ulid" => "varchar"
		];

		$this->select_cols = [
						"_pref_id" => "intunsigned",
			"_pref_new" => "timestamp",
			"_pref_edit" => "timestamp",
			"_pref_active" => "tinyint",
			"_pref_for__mem" => "tinyint",
			"_pref_for__co" => "tinyint",
			"_pref_allow_custom_val_on" => "tinyint",
			"_pref_allow_custom_val_of" => "tinyint",
			"_pref_name" => "varchar",
			"_pref_on_val" => "varchar",
			"_pref_off_val" => "varchar",
			"_pref_group_name" => "varchar",
			"_pref_group_key" => "varchar",
			"_pref_ulid" => "varchar"
		];

		

		$this->full_join = [
			
		];
	}
}
