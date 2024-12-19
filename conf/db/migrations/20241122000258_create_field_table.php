<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateFieldTable extends AbstractMigration
{
	private string $table_name = '_field';

	public function up(): void
	{
		// Sky requires these minimum columns
		$table = $this->table($this->table_name, ['id' => $this->table_name . '_id']);
		$table->addColumn($this->table_name . '_new', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
				->addColumn($this->table_name . '_edit', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'null' => TRUE])
				->addColumn($this->table_name . '_del', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_arch', 'timestamp', ['null' => TRUE])
				->addColumn($this->table_name . '_active', 'boolean', ['default' => TRUE])
				->addColumn($this->table_name . '_is_required', 'boolean', ['default' => FALSE])
				->addColumn($this->table_name . '_is_required_if_present', 'boolean', ['default' => FALSE])
				->addColumn($this->table_name . '_is_hidden', 'boolean', ['default' => FALSE])
				->addColumn($this->table_name . '_min_length', 'integer', ['null' => TRUE])
				->addColumn($this->table_name . '_max_length', 'integer', ['null' => TRUE])
				->addColumn($this->table_name . '_label', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_id_name', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_type', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_src', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_valid_url', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_default_value', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_min_val', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_max_val', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_pattern', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_table', 'string', ['limit' => 64, 'null' => TRUE])
				->addColumn($this->table_name . '_col', 'string', ['limit' => 64, 'null' => TRUE])
				->addColumn($this->table_name . '_fqn', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_ulid', 'string', ['limit' => 26, 'null' => TRUE])
				->addIndex([$this->table_name . '_ulid'], ['name' => 'idx_' . $this->table_name . '_ulid'])
				->create();
	}

	public function down(): void
	{
		$this->table($this->table_name)->drop()->save();
	}
}