<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class BaseSettingsSeeder extends AbstractSeed
{
	private string $table_name = '_setting';

	public function run(): void
	{
		$rows = [
			[
				"{$this->table_name}_is_sensitive" => FALSE,
				"{$this->table_name}_key" => 'product_name',
				"{$this->table_name}_value" => 'Sky Install',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => FALSE,
				"{$this->table_name}_key" => 'app_domain',
				"{$this->table_name}_value" => 'sky.localhost',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => FALSE,
				"{$this->table_name}_key" => 'system_from_email',
				"{$this->table_name}_value" => 'system@skyapi.com',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => FALSE,
				"{$this->table_name}_key" => 'meta_desc',
				"{$this->table_name}_value" => '',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => FALSE,
				"{$this->table_name}_key" => 'meta_author',
				"{$this->table_name}_value" => '',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => FALSE,
				"{$this->table_name}_key" => 'copyright_banner',
				"{$this->table_name}_value" => '',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => TRUE,
				"{$this->table_name}_key" => 'storage_access_key',
				"{$this->table_name}_value" => '',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => TRUE,
				"{$this->table_name}_key" => 'storage_private_key',
				"{$this->table_name}_value" => '',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
			[
				"{$this->table_name}_is_sensitive" => TRUE,
				"{$this->table_name}_key" => 'storage_bucket',
				"{$this->table_name}_value" => '',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}