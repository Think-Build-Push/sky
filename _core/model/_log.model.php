<?php

class _log_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct();

		$this->cols = [
						"_log_id" => "int",
			"_log_new" => "timestamp",
			"_log_edit" => "timestamp",
			"_log_del" => "timestamp",
			"_log_arch" => "timestamp",
			"_log_active" => "tinyint",
			"fk__co_id" => "int",
			"fk__mem_id" => "int",
			"_log_type" => "varchar",
			"_log_obj" => "varchar",
			"_log_obj_id" => "int",
			"_log_note" => "varchar",
			"_log_ulid" => "char"
		];

		$this->select_cols = [
						"_log_id" => "int",
			"_log_new" => "timestamp",
			"_log_edit" => "timestamp",
			"_log_active" => "tinyint",
			"_log.fk__mem_id" => "int",
			"_log_type" => "varchar",
			"_log_obj" => "varchar",
			"_log_obj_id" => "int",
			"_log_note" => "varchar",
			"_log_ulid" => "char"
		];

		require_once( MODEL_CORE . '_mem.model.php' );
		$o__mem_model = new _mem_model();
		if( $o__mem_model->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__mem_model->select_cols( 'array' ) );
		}

		$this->full_join = [
			'fk__mem_id' =>
			[
				'table' => '_mem',
				'join_as' => '_mem'
			],
		];
	}
}
