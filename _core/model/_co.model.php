<?php

class _co_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;


	public function __construct()
	{
		parent::__construct();

		$this->cols = [
			"_co_id" => "int",
			"_co_new" => "timestamp",
			"_co_edit" => "timestamp",
			"_co_del" => "timestamp",
			"_co_arch" => "timestamp",
			"_co_active" => "tinyint",
			"fk__mem_id" => "int",
			"fk__sub_plan_id" => "int",
			"_co_name" => "varchar",
			"_co_domain" => "varchar",
			"_co_ulid" => "varchar",
			"_co_setup" => "tinyint",
			"_co_configured" => "tinyint",

		];

		$this->select_cols = [
			"_co_id" => "int",
			"_co_new" => "timestamp",
			"_co_edit" => "timestamp",
			"_co_active" => "tinyint",
			"fk__mem_id" => "int",
			"fk__sub_plan_id" => "int",
			"_co_name" => "varchar",
			"_co_domain" => "varchar",
			"_co_ulid" => "varchar",
			"_co_setup" => "tinyint",
			"_co_configured" => "tinyint",

		];

		$this->full_join = [
			'fk__mem_id' =>
			[
				'table' => '_mem',
				'join_as' => '_mem'
			],
			'fk__sub_plan_id' =>
			[
				'table' => '_sub_plan',
				'join_as' => '_sub_plan'
			],

		];
	}
}
