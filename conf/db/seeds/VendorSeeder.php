<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class VendorSeeder extends AbstractSeed
{
	private string $table_name = '_vendor';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => 1,
				"{$this->table_name}_name" => 'Global Payments',
				"{$this->table_name}_type" => 'payment',
				"{$this->table_name}_api_url" => '/mock/payment/api/',
				"{$this->table_name}_api_url" => '/mock/payment/webhook-src/',
				"{$this->table_name}_config" => '{}',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}