<?php

class _auth_token_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct();

		$this->cols = [
			"_auth_token_id" => "int",
			"_auth_token_new" => "timestamp",
			"_auth_token_edit" => "timestamp",
			"_auth_token_del" => "timestamp",
			"_auth_token_arch" => "timestamp",
			"_auth_token_active" => "tinyint",
			"fk__mem_id" => "int",
			"fk__co_id" => "int",
			"_auth_token" => "varchar",
			"_auth_token_type" => "varchar",
			"_auth_token_expires" => "datetime",
			"_auth_token_expired" => "tinyint",
			"_auth_token_entity_uuid" => "varchar",
			"_auth_token_ulid" => "char"
		];

		$this->select_cols = [
			"_auth_token_id" => "int",
			"_auth_token_new" => "timestamp",
			"_auth_token_edit" => "timestamp",
			"_auth_token_active" => "tinyint",
			"_auth_token.fk__mem_id" => "int",
			"_auth_token" => "varchar",
			"_auth_token_type" => "varchar",
			"_auth_token_expires" => "datetime",
			"_auth_token_expired" => "tinyint",
			"_auth_token_entity_uuid" => "varchar",
			"_auth_token_ulid" => "char"
		];

		require_once( MODEL_CORE . '_mem.model.php' );
		$o__mem_data = new _mem_model();
		if( $o__mem_data->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__mem_data->select_cols( 'array' ) );
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
