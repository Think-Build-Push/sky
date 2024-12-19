<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class CoMemSeeder extends AbstractSeed
{
	private string $table_name = '_co__mem';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => 1,
				"fk__mem_id" => 1,
				"fk__role_id" => 1,
				"{$this->table_name}_ulid" => Ulid::generate(true)
			]
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}