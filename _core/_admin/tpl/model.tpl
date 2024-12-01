<?php

class ~~obj~~_model extends _model
{
	public array $cols;
	public array $select_cols;
	public array $full_join;

	public function __construct()
	{
		parent::__construct( '~~obj~~' );
		
		$this->log_chan( '~~obj~~_model' );

		$this->cols = [
			~~cols~~
		];

		$this->select_cols = [
			~~select_cols~~
		];

		~~join_select_cols~~

		$this->full_join = [
			~~full_join~~
		];
	}
}
