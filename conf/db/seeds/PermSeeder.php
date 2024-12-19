<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class PermSeeder extends AbstractSeed
{
	private string $table_name = '_perm';

	public function run(): void
	{
		$rows = [];
		$ctlr_path = dirname( __FILE__, 4 );

		$ctlrs = scandir( $ctlr_path . '/_core/ctlr' );
		foreach( $ctlrs as $file )
		{
			if( str_starts_with($file, '.') || '_ctlr.ctlr.php' == $file )
			{
				continue;
			}

			$ctlr = str_replace('.ctlr.php', '', $file);
			$rows[] = [
				"{$this->table_name}_selectable" => FALSE,
				"{$this->table_name}_path" => '/' . $ctlr,
				"{$this->table_name}_name" => "All {$ctlr} Endpoints",
				"{$this->table_name}_role_type" => 'sysadmin',
				"{$this->table_name}_desc" => 'Only allowed for sysadmins of this install',
				"{$this->table_name}_ulid" => Ulid::generate(true),
			];
		}
		
		$this->table($this->table_name)->insert($rows)->saveData();
	}
}