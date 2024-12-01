<?php

/**
 *	_valid_field manages the validation rules for form fields
 */

class _valid_field extends _obj
{
	public function __construct()
	{
		parent::__construct( '_valid_field' );
	}

	public function delete_by_form_id( int $id ) : bool
	{
		$q = "DELETE FROM _valid_field WHERE fk__valid_form_id = ?";
		$sth = $this->query( $q, [ $id ] );
		$sth->execute();

		return '00000' != $sth->errorCode() ? FALSE : TRUE;
	}

	public function form_fields( string $form_input_id ) : bool|array
	{
		$q = "SELECT * FROM _valid_field JOIN _field ON fk__field_id = _field_id JOIN _valid_form ON _valid_form._valid_form_id = _valid_field.fk__valid_form_id WHERE _valid_form_form_id = ?";
		$sth = $this->query( $q, [ $form_input_id ] );
		$sth->execute();

		if( '00000' != $sth->errorCode() )
		{
			return FALSE;
		}
		
		$fields = array();
		while( $row = $sth->fetch() )
		{
			$fields[$row['_valid_field_id']] = $row;
		}

		$this->success( 'fields_fetched' );
		return $fields;
	}

	public function is_field( string $field_fqn ) : bool|array
	{
		$field = $this->get_by_col([ '_field_fqn' => $field_fqn ], FALSE, TRUE, NULL, "_field_id");
		if( FALSE === $field )
		{
			// To avoid duplicates we return true here as though the field exists
			$this->fail( 'Field existence could not be tested' );
			return TRUE;
		}

		return $field;
	}
}
