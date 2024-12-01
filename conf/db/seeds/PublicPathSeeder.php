<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class PublicPathSeeder extends AbstractSeed
{
	private string $table_name = '_public_path';

	public function run(): void
	{
		$rows = [
			[
				"{$this->table_name}" => '/_auth/logout',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_auth/password',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_mem_reset/reset',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_setting/get_base_settings',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_page/show/_verify',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_page/show/index',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_page/show/_password_reset',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_register/register_co',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_register/register_mem',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_setting/get_base_settings',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_tpl',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_valid_form/get_form',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_verify/email',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_page/show/index',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_admin/auto_create',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}" => '/_page/show/_admin',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}