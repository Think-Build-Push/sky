<?php

class _vendor_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct( '_vendor' );
		
		$this->log_chan( '_vendor_model' );

		$this->cols = [
			"_vendor_id" => "intunsigned",
			"_vendor_new" => "timestamp",
			"_vendor_edit" => "timestamp",
			"_vendor_del" => "timestamp",
			"_vendor_arch" => "timestamp",
			"_vendor_active" => "tinyint",
			"fk__co_id" => "int",
			"_vendor_name" => "varchar",
			"_vendor_type" => "varchar",
			"_vendor_api_url" => "varchar",
			"_vendor_webhook_src" => "varchar",
			"_vendor_config" => "longtext",
			"_vendor_ulid" => "varchar"
		];

		$this->select_cols = [
			"_vendor_id" => "intunsigned",
			"_vendor_new" => "timestamp",
			"_vendor_edit" => "timestamp",
			"_vendor_active" => "tinyint",
			"_vendor_name" => "varchar",
			"_vendor_type" => "varchar",
			"_vendor_api_url" => "varchar",
			"_vendor_webhook_src" => "varchar",
			"_vendor_config" => "longtext",
			"_vendor_ulid" => "varchar"
		];

		$this->full_join = [
			
		];
	}
}
