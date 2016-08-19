<?php defined('SYSPATH') or die('No direct script access.');

class Model_Mdjsons extends Kohana_Model
{
	private $table_name = 'mdjsons';
	
	public function __construct()
	{
		//model
	}

	public function get_list(){
		$results = DB::select()->from($this->table_name)->order_by('id', 'asc');
		return $results;
	}

}
