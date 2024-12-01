<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class $className extends AbstractSeed
{
	private string $table_name = '';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => ,
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}