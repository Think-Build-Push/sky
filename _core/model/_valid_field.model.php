<?php

/**
 *	_valid_field_data auto-generated
 */

class _valid_field_model extends _model
{
public array $cols;
	public array $select_cols;
	public array $full_join;


	public function __construct()
	{
		parent::__construct();

		$this->cols = [
			"_valid_field_id" => "int",
			"_valid_field_new" => "timestamp",
			"_valid_field_edit" => "timestamp",
			"_valid_field_del" => "timestamp",
			"_valid_field_arch" => "timestamp",
			"_valid_field_active" => "tinyint",
			"fk__valid_form_id" => "int",
			"fk__field_id" => "int",
			"_valid_field_ulid" => "char",
		];

		$this->select_cols = [
			"_valid_field_id" => "int",
			"_valid_field_new" => "timestamp",
			"_valid_field_edit" => "timestamp",
			"_valid_field_active" => "tinyint",
			"fk__valid_form_id" => "int",
			"fk__field_id" => "int",
			"_valid_field_ulid" => "char",
		];

		$this->full_join = [
			'fk__valid_form_id' =>
			[
				'table' => '_valid_form',
				'join_as' => '_valid_form'
			],
			'fk__field_id' =>
			[
				'table' => '_field',
				'join_as' => '_field'
			]
		];
	}
}
