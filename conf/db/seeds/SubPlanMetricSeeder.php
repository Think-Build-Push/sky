<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class SubPlanMetricSeeder extends AbstractSeed
{
	private string $table_name = '_sub_plan_metric';

	public function run(): void
	{
		$rows = [
			// Seeded free tier
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => FALSE,
				"{$this->table_name}_units_included" => 1,
				"{$this->table_name}_units_increment" => 1,
				"{$this->table_name}_units_price" => 10,
				"{$this->table_name}_unit_name" => 'Users',
				"{$this->table_name}_unit_key" => '_mem',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => FALSE,
				"{$this->table_name}_units_included" => 5,
				"{$this->table_name}_units_increment" => 1,
				"{$this->table_name}_units_price" => 15,
				"{$this->table_name}_unit_name" => 'Roles',
				"{$this->table_name}_unit_key" => '_role',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			// Seeded cheap tier
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => FALSE,
				"{$this->table_name}_units_included" => 5,
				"{$this->table_name}_units_increment" => 1,
				"{$this->table_name}_units_price" => 7,
				"{$this->table_name}_unit_name" => 'Users',
				"{$this->table_name}_unit_key" => '_mem',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => FALSE,
				"{$this->table_name}_units_included" => 10,
				"{$this->table_name}_units_increment" => 1,
				"{$this->table_name}_units_price" => 12,
				"{$this->table_name}_unit_name" => 'Roles',
				"{$this->table_name}_unit_key" => '_role',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			// Seeded Average tier
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => FALSE,
				"{$this->table_name}_units_included" => 10,
				"{$this->table_name}_units_increment" => 2,
				"{$this->table_name}_units_price" => 12,
				"{$this->table_name}_unit_name" => 'Users',
				"{$this->table_name}_unit_key" => '_mem',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => FALSE,
				"{$this->table_name}_units_included" => 15,
				"{$this->table_name}_units_increment" => 1,
				"{$this->table_name}_units_price" => 10,
				"{$this->table_name}_unit_name" => 'Roles',
				"{$this->table_name}_unit_key" => '_role',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			// Seeded outrageous tier
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => TRUE,
				"{$this->table_name}_units_included" => 0,
				"{$this->table_name}_units_increment" => 0,
				"{$this->table_name}_units_price" => 0,
				"{$this->table_name}_unit_name" => 'Users',
				"{$this->table_name}_unit_key" => '_mem',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1,
				"{$this->table_name}_is_addon" => FALSE,
				"{$this->table_name}_is_single_purchase" => FALSE,
				"{$this->table_name}_is_unlimited" => TRUE,
				"{$this->table_name}_units_included" => 0,
				"{$this->table_name}_units_increment" => 0,
				"{$this->table_name}_units_price" => 0,
				"{$this->table_name}_unit_name" => 'Roles',
				"{$this->table_name}_unit_key" => '_role',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}