<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CoVendorTable extends AbstractMigration
{
	private string $table_name = '_co_vendor';

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
				->addColumn('fk__vendor_id', 'integer', ['null' => TRUE])
				->addColumn($this->table_name . '_api_url', 'string', ['limit' => 255, 'null' => TRUE, 'comment' => 'For vendors that have customer specific details'])
				->addColumn($this->table_name . '_api_key', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_api_secret', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_webhook_src', 'string', ['limit' => 255, 'null' => TRUE, 'comment' => 'For vendors that have customer specific details'])
				->addColumn($this->table_name . '_webhook_secret', 'string', ['limit' => 255, 'null' => TRUE, 'comment' => 'For vendors that have customer specific details'])
				->addColumn($this->table_name . '_config', 'json', ['null' => TRUE])
				->addColumn($this->table_name . '_vendor_transaction_id', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_ulid', 'string', ['limit' => 26, 'null' => TRUE])
				->addIndex([$this->table_name . '_ulid'], ['name' => 'idx_' . $this->table_name . '_ulid'])
				->create();
	}

	public function down(): void
	{
		$this->table($this->table_name)->drop()->save();
	}
}