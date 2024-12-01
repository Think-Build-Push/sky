<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateLocaleTable extends AbstractMigration
{
	private string $table_name = '_locale';

	public function up(): void
	{
		// Sky requires these minimum columns
		$table = $this->table($this->table_name, ['id' => $this->table_name . '_id']);
		$table->addColumn($this->table_name . '_new', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
				->addColumn($this->table_name . '_edit', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'null' => TRUE])
				->addColumn($this->table_name . '_del', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_arch', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_active', 'boolean', ['default' => TRUE])
				->addColumn('fk__lang_id', 'integer', ['null' => TRUE])
				->addColumn($this->table_name . '_sort', 'smallinteger', ['null' => TRUE])
				->addColumn($this->table_name . '_name', 'string', ['limit' => 100, 'null' => TRUE])
				->addColumn($this->table_name . '_code', 'string', ['limit' => 20, 'null' => TRUE])
				->addColumn($this->table_name . '_ulid', 'string', ['limit' => 26, 'null' => TRUE])
				->addIndex([$this->table_name . '_ulid'], ['name' => 'idx_' . $this->table_name . '_ulid'])
				->create();
	}

	public function down(): void
	{
		$this->table($this->table_name)->drop()->save();
	}
}