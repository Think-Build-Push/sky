<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CoSubMetricUsage extends AbstractMigration
{
	private string $table_name = '_co_sub_metric_usage';

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
				->addColumn('fk__co_vendor_id', 'integer', ['null' => TRUE])
				->addColumn('fk__sub_plan_id', 'integer', ['null' => TRUE])
				->addColumn('fk__sub_plan_metric_id', 'integer', ['null' => TRUE])
				->addColumn($this->table_name . '_increment', 'boolean', ['default' => FALSE])
				->addColumn($this->table_name . '_decrement', 'boolean', ['default' => FALSE])
				->addColumn($this->table_name . '_entity_ulid', 'string', ['limit' => 26, 'null' => TRUE, 'comment' => 'This is the ulid of the resource that was saved with this usage row'])
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