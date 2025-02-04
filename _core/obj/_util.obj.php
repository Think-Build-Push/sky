<?php

class _util extends _obj
{
	public function __construct()
	{
		parent::__construct( '_util' );
	}

	public function populate_ulids() : bool|null
	{
		if( defined( 'AUTOPOPULATE_ULIDS' ) && !AUTOPOPULATE_ULIDS )
		{
			print( 'AUTOPOPULATE_ULIDS is off' );
			return FALSE;
		}

		print ('popping ulids' );

		$table_query = "SELECT TABLE_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = ? AND COLUMN_NAME LIKE '%_ulid'";
		$table_sth = $this->query( $table_query, [ $this->dbname ]);

		while( $row = $table_sth->fetch() )
		{
			$table = $row['TABLE_NAME'];
			$ulid_query = "SELECT {$table}_id AS table_id FROM {$table} WHERE {$table}_ulid IS NULL OR {$table}_ulid = ''";
			$ulid_sth = $this->query( $ulid_query );

			while( $ulid_row = $ulid_sth->fetch() )
			{
				$ulid = $this->generate_ulid();
				$q = "UPDATE {$table} SET {$table}_ulid = ? WHERE {$table}_id = ?";
				$this->query( $q, [ $ulid, $ulid_row['table_id'] ]);
			}
		}

		return NULL;
	}

	/**
	 * PHPStan in general will complain about *_sth being an object|bool
	 * and that you can't call a method on that. Pffft
	 *
	 * @return boolean
	 */
	public function check_for_ulids() : bool
	{
		if( defined( 'AUTOPOPULATE_ULIDS' ) && !AUTOPOPULATE_ULIDS )
		{
			print( 'AUTOPOPULATE_ULIDS is off' );
			return FALSE;
		}

		print ('popping ulids' );
		$table_query = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = ?";
		$table_sth = $this->query( $table_query, [ $_SERVER['DB_NAME'] ] );

		$ulid_query = "SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND COLUMN_NAME = ?";
		$ulid_sth = $this->prep( $ulid_query );

		$last_col_query = 
		"SELECT COLUMN_NAME FROM information_schema.COLUMNS
		WHERE TABLE_SCHEMA = ?
		AND TABLE_NAME = ?
		AND ORDINAL_POSITION = (
			SELECT MAX( ORDINAL_POSITION ) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?
			)";
		$last_col_sth = $this->prep( $last_col_query );

		while( $table = $table_sth->fetch() )
		{
			$ulid_sth->execute([ $_SERVER['DB_NAME'], $table['TABLE_NAME'], $table['TABLE_NAME'] . '_ulid' ]);
			$has_ulid = $ulid_sth->fetch();

			if( !$has_ulid )
			{
				p( $table['TABLE_NAME'] . ' missing ulid' );
				$last_col_sth->execute([ $_SERVER['DB_NAME'], $table['TABLE_NAME'], $_SERVER['DB_NAME'], $table['TABLE_NAME'] ]);
				$last_col = $last_col_sth->fetch();

				$add_col_q = "ALTER TABLE `{$table['TABLE_NAME']}` ADD COLUMN `{$table['TABLE_NAME']}_ulid` CHAR(32) AFTER `{$last_col['COLUMN_NAME']}`";
				$this->query( $add_col_q );
			}
		}

		return TRUE;
	}
}
