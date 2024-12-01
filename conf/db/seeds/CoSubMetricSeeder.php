<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class CoSubMetricSeeder extends AbstractSeed
{
	private string $table_name = '_co_sub_metric';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => 1,
				"fk__vendor_id" => 1,
				"fk__sub_plan_id" => 1,
				"fk__sub_plan_metric_id" => 1,
				"fk__co_vendor_id" => 1,
				"fk__co_sub_plan_id" => 1,
				"{$this->table_name}_count" => 2,
				"{$this->table_name}_count_over" => 1,
				"{$this->table_name}_total_price" => 10,
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"fk__vendor_id" => 1,
				"fk__sub_plan_id" => 1,
				"fk__sub_plan_metric_id" => 2,
				"fk__co_vendor_id" => 1,
				"fk__co_sub_plan_id" => 1,
				"{$this->table_name}_count" => 3,
				"{$this->table_name}_count_over" => 0,
				"{$this->table_name}_total_price" => 0,
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}