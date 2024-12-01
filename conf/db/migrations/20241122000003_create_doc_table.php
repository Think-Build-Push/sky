<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateDocTable extends AbstractMigration
{
	private string $table_name = '_doc';

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
				->addColumn('fk__mem_id', 'integer', ['null' => TRUE, 'comment' => 'only if it is related to a single member'])
				->addColumn('fk_uploader__mem_id', 'integer', ['null' => TRUE, 'comment' => 'may not be populated if the app wants anonymous uploads'])
				->addColumn($this->table_name . '_size', 'decimal', ['precision' => 6, 'scale' => 2, 'null' => TRUE])
				->addColumn($this->table_name . '_name', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_orig_name', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_type', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_loc', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_hash', 'string', ['limit' => 255, 'null' => TRUE])
				->addColumn($this->table_name . '_ulid', 'string', ['limit' => 26, 'null' => TRUE])
				->addIndex([$this->table_name . '_ulid'], ['name' => 'idx_' . $this->table_name . '_ulid'])
				->create();
	}

	public function down(): void
	{
		$this->table($this->table_name)->drop()->save();
	}
}