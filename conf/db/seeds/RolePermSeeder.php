<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class RolePermSeeder extends AbstractSeed
{
	private string $table_name = '_role_perm';

	public function run(): void
	{
		$rows = [];
		$ctlr_path = dirname( __FILE__, 4 );

		$ctlrs = scandir( $ctlr_path . '/_core/ctlr' );
		$index = 1;
		foreach( $ctlrs as $file )
		{
			if( str_starts_with($file, '.') || '_ctlr.ctlr.php' == $file )
			{
				continue;
			}

			$ctlr = str_replace('.ctlr.php', '', $file);
			$rows[] = [
				"fk__co_id" => 1,
				"fk__role_id" => 1,
				"fk__perm_id" => $index,
				"{$this->table_name}_ulid" => Ulid::generate(true),
			];

			$index++;
		}
		
		$this->table($this->table_name)->insert($rows)->saveData();
	}
}