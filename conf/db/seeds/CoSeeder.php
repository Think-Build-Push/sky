<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class CoSeeder extends AbstractSeed
{
	public function run(): void
	{
		$rows = [
			[
				'fk__mem_id' => 1,
				'_co_name' => 'Sky API',
				'_co_domain' => 'sky',
				'_co_ulid' => Ulid::generate(true)
			]
		];

		$this->table('_co')->insert($rows)->saveData();
	}
}