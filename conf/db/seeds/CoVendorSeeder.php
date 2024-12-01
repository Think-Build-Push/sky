<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class CoVendorSeeder extends AbstractSeed
{
	private string $table_name = '_co_vendor';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => 1,
				"fk__vendor_id" => 1, // Seeded payment vendor
				"{$this->table_name}_api_url" => '/mock/payment/api/' . Ulid::generate(true), // For mimicking a custom url
				"{$this->table_name}_api_key" => Ulid::generate(true),
				"{$this->table_name}_api_secret" => Ulid::generate(true),
				"{$this->table_name}_webhook_src" => '/mock/payment/webhook/' . Ulid::generate(true), // For mimicking a custom url
				"{$this->table_name}_webhook_secret" => Ulid::generate(true),
				"{$this->table_name}_config" => '{}',
				"{$this->table_name}_vendor_transaction_id" => Ulid::generate(true),
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}