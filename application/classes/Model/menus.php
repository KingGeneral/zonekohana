<?php defined('SYSPATH') or die('No direct script access.');

class Model_Menus extends Kohana_Model
{
	private $table_name = 'menus';
	
	public function __construct()
	{
		//model
	}

	//order_by id
	public function get_list_id()
	{
		$results = DB::select()->from($this->table_name)->order_by('id', 'asc')->execute();
		return $results;
	}

	//order_by orderlist
	public function get_list()
	{
		$results = DB::select()->from($this->table_name)->order_by('orderlist', 'asc');
		return $results;
	}

	public function max_orderlist(){
		$maxi = DB::select(array(DB::expr('MAX(orderlist)'), 'maxnum'))->from($this->table_name)->execute()->get('maxnum');
		return $maxi;
	}

	public function insert_menu($data){
		$results = DB::insert($this->table_name, array('menu','orderlist','levels'))
		->values($data)
		->execute();

		return $results;
	}

	public function update_order($data)
	{
		$results = DB::update($this->table_name)
		->set(array(
			'orderlist' => $data['orderlist'],
			'levels' => $data['levels'],
			'parents' => $data['parents']
		))
		->where('menu', '=', $data['menuname'])
		->execute();
		
		return $results;
	}

	//jsontest controller - testjson view
	public function get_json(){

	}
}
