<?php

class _co_vendor_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct();
		
		$this->log_chan( '_co_vendor_model' );

		$this->cols = [
						"_co_vendor_id" => "int",
			"_co_vendor_new" => "timestamp",
			"_co_vendor_edit" => "timestamp",
			"_co_vendor_del" => "timestamp",
			"_co_vendor_arch" => "timestamp",
			"_co_vendor_active" => "tinyint",
			"fk__co_id" => "int",
			"fk__vendor_id" => "int",
			"_co_vendor_api_url" => "varchar",
			"_co_vendor_api_key" => "varchar",
			"_co_vendor_api_secret" => "varchar",
			"_co_vendor_webhook_src" => "varchar",
			"_co_vendor_webhook_secret" => "varchar",
			"_co_vendor_config" => "longtext",
			"_co_vendor_vendor_transaction_id" => "varchar",
			"_co_vendor_ulid" => "varchar"
		];

		$this->select_cols = [
						"_co_vendor_id" => "int",
			"_co_vendor_new" => "timestamp",
			"_co_vendor_edit" => "timestamp",
			"_co_vendor_active" => "tinyint",
			"_co_vendor.fk__vendor_id" => "int",
			"_co_vendor_api_url" => "varchar",
			"_co_vendor_api_key" => "varchar",
			"_co_vendor_api_secret" => "varchar",
			"_co_vendor_webhook_src" => "varchar",
			"_co_vendor_webhook_secret" => "varchar",
			"_co_vendor_config" => "longtext",
			"_co_vendor_vendor_transaction_id" => "varchar",
			"_co_vendor_ulid" => "varchar"
		];

				require_once( MODEL_CORE . '_vendor_model.obj.php' );
		$o__vendor_model = new _vendor_model();
		if( $o__vendor_model->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__vendor_model->select_cols( 'array' ) );
		}


		$this->full_join = [
						'fk__vendor_id' =>
			[
				'table' => '_vendor',
				'join_as' => '_vendor'
			]
		];
	}
}
