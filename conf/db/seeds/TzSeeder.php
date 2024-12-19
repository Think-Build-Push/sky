<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class TzSeeder extends AbstractSeed
{
	private string $table_name = '_tz';

	public function run(): void
	{
		$rows = [];

		/**
		 * This ensures that only timezones
		 * available in this system are seeds.
		 */
		$tzs = timezone_identifiers_list();
		foreach($tzs as $iana)
		{
			$rows[] = [
				"{$this->table_name}_name" => $iana,
				"{$this->table_name}_iana" => $iana,
				"{$this->table_name}_ulid" => Ulid::generate(true)
			];
		}

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}