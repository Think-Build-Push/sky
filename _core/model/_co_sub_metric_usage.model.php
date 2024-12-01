<?php

class _co_sub_metric_usage_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct( '_co_sub_metric_usage' );
		
		$this->log_chan( '_co_sub_metric_usage_model' );

		$this->cols = [
						"_co_sub_metric_usage_id" => "intunsigned",
			"_co_sub_metric_usage_new" => "timestamp",
			"_co_sub_metric_usage_edit" => "timestamp",
			"_co_sub_metric_usage_del" => "timestamp",
			"_co_sub_metric_usage_arch" => "timestamp",
			"_co_sub_metric_usage_active" => "tinyint",
			"fk__co_id" => "int",
			"fk__vendor_id" => "int",
			"fk__co_vendor_id" => "int",
			"fk__sub_plan_id" => "int",
			"fk__sub_plan_metric_id" => "int",
			"_co_sub_metric_usage_increment" => "tinyint",
			"_co_sub_metric_usage_decrement" => "tinyint",
			"_co_sub_metric_usage_entity_ulid" => "varchar",
			"_co_sub_metric_usage_vendor_transaction_id" => "varchar",
			"_co_sub_metric_usage_ulid" => "varchar"
		];

		$this->select_cols = [
						"_co_sub_metric_usage_id" => "intunsigned",
			"_co_sub_metric_usage_new" => "timestamp",
			"_co_sub_metric_usage_edit" => "timestamp",
			"_co_sub_metric_usage_active" => "tinyint",
			"_co_sub_metric_usage.fk__vendor_id" => "int",
			"_co_sub_metric_usage.fk__co_vendor_id" => "int",
			"_co_sub_metric_usage.fk__sub_plan_id" => "int",
			"_co_sub_metric_usage.fk__sub_plan_metric_id" => "int",
			"_co_sub_metric_usage_increment" => "tinyint",
			"_co_sub_metric_usage_decrement" => "tinyint",
			"_co_sub_metric_usage_entity_ulid" => "varchar",
			"_co_sub_metric_usage_vendor_transaction_id" => "varchar",
			"_co_sub_metric_usage_ulid" => "varchar"
		];

				require_once( MODEL_CORE . '_vendor_data.obj.php' );
		$o__vendor_data = new _vendor_data();
		if( $o__vendor_data->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__vendor_data->select_cols( 'array' ) );
		}

		require_once( MODEL_CORE . '_co_vendor_data.obj.php' );
		$o__co_vendor_data = new _co_vendor_data();
		if( $o__co_vendor_data->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__co_vendor_data->select_cols( 'array' ) );
		}

		require_once( MODEL_CORE . '_sub_plan_data.obj.php' );
		$o__sub_plan_data = new _sub_plan_data();
		if( $o__sub_plan_data->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__sub_plan_data->select_cols( 'array' ) );
		}

		require_once( MODEL_CORE . '_sub_plan_metric_data.obj.php' );
		$o__sub_plan_metric_data = new _sub_plan_metric_data();
		if( $o__sub_plan_metric_data->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__sub_plan_metric_data->select_cols( 'array' ) );
		}


		$this->full_join = [
						'fk__vendor_id' =>
			[
				'table' => '_vendor',
				'join_as' => '_vendor'
			],
			'fk__co_vendor_id' =>
			[
				'table' => '_co_vendor',
				'join_as' => '_co_vendor'
			],
			'fk__sub_plan_id' =>
			[
				'table' => '_sub_plan',
				'join_as' => '_sub_plan'
			],
			'fk__sub_plan_metric_id' =>
			[
				'table' => '_sub_plan_metric',
				'join_as' => '_sub_plan_metric'
			]
		];
	}
}