<?php

class _field_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;


	public function __construct()
	{
		parent::__construct();

		$this->cols = [
			"_field_id" => "int",
			"_field_new" => "timestamp",
			"_field_edit" => "timestamp",
			"_field_del" => "timestamp",
			"_field_arch" => "timestamp",
			"_field_active" => "tinyint",
			"_field_is_required" => "tinyint",
			"_field_is_required_if_present" => "tinyint",
			"_field_is_hidden" => "tinyint",
			"_field_min_length" => "tinyint",
			"_field_max_length" => "tinyint",
			"_field_label" => "varchar",
			"_field_id_name" => "varchar",
			"_field_type" => "varchar",
			"_field_src" => "varchar",
			"_field_valid_url" => "varchar",
			"_field_default_value" => "varchar",
			"_field_min_val" => "varchar",
			"_field_max_val" => "varchar",
			"_field_pattern" => "varchar",
			"_field_table" => "varchar",
			"_field_col" => "varchar",
			"_field_fqn" => "varchar",
			"_field_ulid" => "varchar",
		];

		$this->select_cols = [
			"_field_id" => "int",
			"_field_new" => "timestamp",
			"_field_edit" => "timestamp",
			"_field_active" => "tinyint",
			"_field_is_required" => "tinyint",
			"_field_is_required_if_present" => "tinyint",
			"_field_is_hidden" => "tinyint",
			"_field_min_length" => "tinyint",
			"_field_max_length" => "tinyint",
			"_field_label" => "varchar",
			"_field_id_name" => "varchar",
			"_field_type" => "varchar",
			"_field_src" => "varchar",
			"_field_valid_url" => "varchar",
			"_field_default_value" => "varchar",
			"_field_min_val" => "varchar",
			"_field_max_val" => "varchar",
			"_field_pattern" => "varchar",
			"_field_table" => "varchar",
			"_field_col" => "varchar",
			"_field_fqn" => "varchar",
			"_field_ulid" => "varchar",
		];

		$this->full_join = [

		];
	}
}
