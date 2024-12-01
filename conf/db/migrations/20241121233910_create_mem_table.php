<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMemTable extends AbstractMigration
{
	private string $table_name = '_mem';

	public function up(): void
	{
		$table = $this->table($this->table_name, ['id' => $this->table_name . '_id']);
		$table->addColumn($this->table_name . '_new', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
				->addColumn($this->table_name . '_edit', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'null' => TRUE])
				->addColumn($this->table_name . '_del', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_arch', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_active', 'boolean', ['default' => TRUE])
				->addColumn('fk__tz_id', 'integer', ['null' => TRUE])
				->addColumn('fk__lang_id', 'integer', ['null' => TRUE])
				->addColumn('fk__locale_id', 'integer', ['null' => TRUE])
				->addColumn('fk__doc_id', 'integer', ['null' => TRUE])
				->addColumn($this->table_name . '_configured', 'boolean', ['default' => FALSE, 'null' => TRUE])
				->addColumn($this->table_name . '_email_verified', 'boolean', ['default' => FALSE, 'null' => TRUE])
				->addColumn($this->table_name . '_code', 'string', ['limit' => 50, 'null' => TRUE])
				->addColumn($this->table_name . '_fname', 'string', ['limit' => 25, 'null' => TRUE])
				->addColumn($this->table_name . '_mname', 'string', ['limit' => 25, 'null' => TRUE])
				->addColumn($this->table_name . '_lname', 'string', ['limit' => 25, 'null' => TRUE])
				->addColumn($this->table_name . '_name', 'string', ['limit' => 80, 'null' => TRUE])
				->addColumn($this->table_name . '_dob', 'date', ['null' => TRUE])
				->addColumn($this->table_name . '_email', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_ulid', 'string', ['limit' => 26, 'null' => TRUE])
				->addIndex([$this->table_name . '_ulid'], ['name' => 'idx_' . $this->table_name . '_ulid'])
				->create();
	}

	public function down(): void
	{
		$this->table($this->table_name)->drop()->save();
	}
}