<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class CoSubPlanSeeder extends AbstractSeed
{
	private string $table_name = '_co_sub_plan';

	public function run(): void
	{
		$now = new DateTime();
		$trial_end = clone $now;
		$prev_bill = clone $now;
		$next_bill = clone $now;

		$rows = [
			[
				"fk__co_id" => 1,
				"fk__sub_plan_id" => 1, // Seeded _sub_plan
				"{$this->table_name}_bill_mth" => TRUE,
				"{$this->table_name}_bill_yr" => FALSE,
				"{$this->table_name}_trial_end" => $trial_end->modify('+30 days')->format('Y-m-d'),
				"{$this->table_name}_total_price" => 10, // Normally this is a free tier but the seeder should have good examples of functionality
				"{$this->table_name}_prev_bill" => $prev_bill->modify('-30 days')->format('Y-m-d'),
				"{$this->table_name}_next_bill" => $next_bill->modify('+60 days')->format('Y-m-d'),
				"{$this->table_name}_ulid" => Ulid::generate(true),
			]
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}