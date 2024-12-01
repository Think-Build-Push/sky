<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class MemAuthSeeder extends AbstractSeed
{
	private string $table_name = '_mem_auth';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => 1,
				"fk__mem_id" => 1,
				"{$this->table_name}_login" => 'default@admin',
				"{$this->table_name}_password" => password_hash( 'sky_admin', PASSWORD_BCRYPT, [ 'cost' => 12 ]),
				"{$this->table_name}_ulid" => Ulid::generate(true)
			]
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}