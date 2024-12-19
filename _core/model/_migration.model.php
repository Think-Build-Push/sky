<?php

class _migration_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct();
		
		$this->log_chan( '_migration_model' );

		$this->cols = [
						"version" => "bigint",
			"migration_name" => "varchar",
			"start_time" => "timestamp",
			"end_time" => "timestamp",
			"breakpoint" => "tinyint"
		];

		$this->select_cols = [
						"version" => "bigint",
			"migration_name" => "varchar",
			"start_time" => "timestamp",
			"end_time" => "timestamp",
			"breakpoint" => "tinyint"
		];

		

		$this->full_join = [
			
		];
	}
}
