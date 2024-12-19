<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class RoleSeeder extends AbstractSeed
{
	private string $table_name = '_role';

	public function run(): void
	{
		$rows = [
			[
				"fk__co_id" => 1,
				"{$this->table_name}_is_default" => FALSE,
				"{$this->table_name}_type" => 'sysadmin',
				"{$this->table_name}_name" => 'Sky Admin',
				"{$this->table_name}_desc" => 'The account type that can make changes to everything related to either the app or its users/customers',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"fk__co_id" => 1,
				"{$this->table_name}_is_default" => FALSE,
				"{$this->table_name}_type" => 'admin',
				"{$this->table_name}_name" => '_co Admin',
				"{$this->table_name}_desc" => 'The admin account can only manage the data for a specific customer',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}