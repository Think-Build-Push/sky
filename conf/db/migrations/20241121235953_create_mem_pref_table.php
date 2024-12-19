<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMemPrefTable extends AbstractMigration
{
	private string $table_name = '_mem_pref';

	public function up(): void
	{
		// Sky requires these minimum columns
		$table = $this->table($this->table_name, ['id' => $this->table_name . '_id']);
		$table->addColumn($this->table_name . '_new', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
				->addColumn($this->table_name . '_edit', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'null' => TRUE])
				->addColumn($this->table_name . '_del', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_arch', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_active', 'boolean', ['default' => TRUE])
				->addColumn('fk__co_id', 'integer', ['null' => TRUE])
				->addColumn('fk__mem_id', 'integer', ['null' => TRUE])
				->addColumn('fk__pref_id', 'integer', ['null' => TRUE])
				->addColumn($this->table_name . '_is_on', 'boolean', ['default' => FALSE])
				->addColumn($this->table_name . '_is_off', 'boolean', ['default' => FALSE])
				->addColumn($this->table_name . '_val', 'string', ['limit' => 10000, 'null' => TRUE])
				->addColumn($this->table_name . '_ulid', 'string', ['limit' => 26, 'null' => TRUE])
				->addIndex([$this->table_name . '_ulid'], ['name' => 'idx_' . $this->table_name . '_ulid'])
				->create();
	}

	public function down(): void
	{
		$this->table($this->table_name)->drop()->save();
	}
}