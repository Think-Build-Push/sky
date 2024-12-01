<?php

/**
 *	_co__mem_data auto-generated
 */

class _co__mem_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;


	public function __construct()
	{
		parent::__construct();

		$this->cols = [
			"_co__mem_id" => "int",
			"_co__mem_new" => "timestamp",
			"_co__mem_edit" => "timestamp",
			"_co__mem_del" => "timestamp",
			"_co__mem_arch" => "timestamp",
			"_co__mem_active" => "tinyint",
			"fk__co_id" => "int",
			"fk__mem_id" => "int",
			"fk__role_id" => "int",
		];

		$this->select_cols = [
			"_co__mem_id" => "int",
			"_co__mem_new" => "timestamp",
			"_co__mem_edit" => "timestamp",
			"_co__mem_active" => "tinyint",
			"fk__mem_id" => "int",
			"fk__role_id" => "int",
		];

		$this->full_join = [
			'fk__mem_id' =>
			[
				'table' => '_mem',
				'join_as' => '_mem'
			],
			'fk__role_id' =>
			[
				'table' => '_role',
				'join_as' => '_role'
			],
		];
	}
}
