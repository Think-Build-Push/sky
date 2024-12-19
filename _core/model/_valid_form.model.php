<?php

class _valid_form_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;


	public function __construct()
	{
		parent::__construct();

		$this->cols = [
			"_valid_form_id" => "int",
			"_valid_form_new" => "timestamp",
			"_valid_form_edit" => "timestamp",
			"_valid_form_del" => "timestamp",
			"_valid_form_arch" => "timestamp",
			"_valid_form_active" => "tinyint",
			"_valid_form_name" => "varchar",
			"_valid_form_form_id" => "varchar",
			"_valid_form_method" => "varchar",
			"_valid_form_action" => "varchar",

		];

		$this->select_cols = [
			"_valid_form_id" => "int",
			"_valid_form_new" => "timestamp",
			"_valid_form_edit" => "timestamp",
			"_valid_form_active" => "tinyint",
			"_valid_form_name" => "varchar",
			"_valid_form_form_id" => "varchar",
			"_valid_form_method" => "varchar",
			"_valid_form_action" => "varchar",

		];

		$this->full_join = [

		];
	}
}
