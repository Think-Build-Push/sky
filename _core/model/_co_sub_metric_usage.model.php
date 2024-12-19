<?php

class _co_sub_metric_usage_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct();
		
		$this->log_chan( '_co_sub_metric_usage_model' );

		$this->cols = [
						"_co_sub_metric_usage_id" => "int",
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
			"_co_sub_metric_usage_id" => "int",
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

		require_once( MODEL_CORE . '_vendor_model.obj.php' );
		$o__vendor_model = new _vendor_model();
		if( $o__vendor_model->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__vendor_model->select_cols( 'array' ) );
		}

		require_once( MODEL_CORE . '_co_vendor_model.obj.php' );
		$o__co_vendor_model = new _co_vendor_model();
		if( $o__co_vendor_model->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__co_vendor_model->select_cols( 'array' ) );
		}

		require_once( MODEL_CORE . '_sub_plan_model.obj.php' );
		$o__sub_plan_model = new _sub_plan_model();
		if( $o__sub_plan_model->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__sub_plan_model->select_cols( 'array' ) );
		}

		require_once( MODEL_CORE . '_sub_plan_metric_model.obj.php' );
		$o__sub_plan_metric_model = new _sub_plan_metric_model();
		if( $o__sub_plan_metric_model->select_cols() )
		{
			$this->select_cols = array_merge( $this->select_cols, $o__sub_plan_metric_model->select_cols( 'array' ) );
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
