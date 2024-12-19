<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class SubPlanSeeder extends AbstractSeed
{
	private string $table_name = '_sub_plan';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => 1,
				"{$this->table_name}_has_trial" => 0,
				"{$this->table_name}_trial_duration" => 0,
				"{$this->table_name}_mth_price" => 0.00,
				"{$this->table_name}_yr_price" => 0.00,
				"{$this->table_name}_name" => 'Free Tier',
				"{$this->table_name}_text" => 'The free tier with generous metrics',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"{$this->table_name}_has_trial" => 1,
				"{$this->table_name}_trial_duration" => 30,
				"{$this->table_name}_mth_price" => 9,
				"{$this->table_name}_yr_price" => 89,
				"{$this->table_name}_name" => 'Cheap Tier',
				"{$this->table_name}_text" => 'The cheap tier with more generous metrics and a 30 day free trial',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"{$this->table_name}_has_trial" => 1,
				"{$this->table_name}_trial_duration" => 30,
				"{$this->table_name}_mth_price" => 29,
				"{$this->table_name}_yr_price" => 299,
				"{$this->table_name}_name" => 'Average Tier',
				"{$this->table_name}_text" => 'The average tier with even more generous metrics and a 30 day free trial',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"{$this->table_name}_has_trial" => 1,
				"{$this->table_name}_trial_duration" => 60,
				"{$this->table_name}_mth_price" => 99,
				"{$this->table_name}_yr_price" => 999,
				"{$this->table_name}_name" => 'Outrageous Tier',
				"{$this->table_name}_text" => 'The outrageous tier with unlimited metrics and a 60 day free trial',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}