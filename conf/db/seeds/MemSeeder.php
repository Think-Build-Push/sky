<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class MemSeeder extends AbstractSeed
{
	public function run(): void
	{
		$rows = [
			[
				'fk__tz_id' => 88,
				'fk__lang_id' => 1,
				'fk__locale_id' => 945,
				'_mem_code' => 'default_admin',
				'_mem_fname' => 'Default',
				'_mem_lname' => 'Admin',
				'_mem_name' => 'Default Admin',
				'_mem_email' => 'default@admin',
				'_mem_ulid' => Ulid::generate(true)
			]
		];

		$this->table('_mem')->insert($rows)->saveData();
	}
}