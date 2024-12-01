<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class LangSeeder extends AbstractSeed
{
	private string $table_name = '_lang';

	public function run(): void
	{
		$rows = [
			[
				"{$this->table_name}_name" => 'English',
				"{$this->table_name}_iso2" => 'en',
				"{$this->table_name}_iso3" => 'eng',
				"{$this->table_name}_ulid" => Ulid::generate(true)
			],
			[
				"{$this->table_name}_name" => 'Spanish',
				"{$this->table_name}_iso2" => 'es',
				"{$this->table_name}_iso3" => 'spa',
				"{$this->table_name}_ulid" => Ulid::generate(true)
			],
			[
				"{$this->table_name}_name" => 'French',
				"{$this->table_name}_iso2" => 'fr',
				"{$this->table_name}_iso3" => 'fre',
				"{$this->table_name}_ulid" => Ulid::generate(true)
			],
			[
				"{$this->table_name}_name" => 'German',
				"{$this->table_name}_iso2" => 'de',
				"{$this->table_name}_iso3" => 'deu',
				"{$this->table_name}_ulid" => Ulid::generate(true)
			],
		];

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}