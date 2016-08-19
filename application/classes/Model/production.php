<?php defined('SYSPATH') or die('No direct script access.');

class Model_Production extends Kohana_Model
{
	private $table_name = 'productions';
	
	public function __construct()
	{
		//model
	}

	//get all data
	public function get_list()
	{
		$results = DB::select()->from($this->table_name)->execute();

		return $results;
	}

	//Sort list A-Z or Z-A
	public function sort_by($sort=null,$asc=TRUE){
		if($asc==TRUE){
			$results = DB::select()->from($this->table_name)->order_by($sort, 'asc')->execute();
		}else{
			$results = DB::select()->from($this->table_name)->order_by($sort, 'desc')->execute();
		}
		return $results;
	}
	
	//Delete data
	public function delete($id)
	{
		$query = DB::delete($this->table_name)->where('id','=',$id);
		$results = $query->execute();

		return $results;
	}
	
	//Update data
	public function update($data)
	{
		$results = DB::update($this->table_name)
		->set(array(
			'username' => $data['username'],
			'product' => $data['product'],
			'quantity' => $data['quantity'],
			'updated_at' => $data['time']
		))
		->where('id', '=', $data['id'])
		->execute();
		
		return $results;
	}
	
	//Insert data
	public function insert_data($data)
	{
		$results = DB::insert($this->table_name, array('username','product','quantity','created_at','updated_at'))
		->values($data)
		->execute();

		return $results;
	}
	
	//Search user by username
	public function search_user($username)
	{
		$results = DB::select()->from($this->table_name)
		->where('username','=', $username)
		->as_object()
		->execute();
		
		return $results;
	}
	
	//Search user by id
	public function search_id($id)
	{
		$results = DB::select()->from($this->table_name)
		->where('id','=',$id)
		->as_object()
		->execute();
		
		return $results;
	}
}
