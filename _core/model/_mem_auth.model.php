<?php

class _mem_auth_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct();

		$this->cols = [
						"_mem_auth_id" => "int",
			"_mem_auth_new" => "timestamp",
			"_mem_auth_edit" => "timestamp",
			"_mem_auth_del" => "timestamp",
			"_mem_auth_arch" => "timestamp",
			"_mem_auth_active" => "tinyint",
			"fk__mem_id" => "int",
			"fk__co_id" => "int",
			"_mem_login" => "varchar",
			"_mem_password" => "varchar",
			"_mem_auth_ulid" => "char"
		];

		$this->select_cols = [
						"_mem_auth_id" => "int",
			"_mem_auth_new" => "timestamp",
			"_mem_auth_edit" => "timestamp",
			"_mem_auth_active" => "tinyint",
			"_mem_auth.fk__mem_id" => "int",
			"_mem_login" => "varchar",
			"_mem_password" => "varchar",
			"_mem_auth_ulid" => "char"
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
			]
		];
	}
}
