<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Jsontest extends Controller {
	
	private $model_name;
	
	public function __construct(Request $request, Response $response)
	{
		parent::__construct($request, $response);

		//model object
		$this->model_menu = Model::factory('Mdjsons');
	}
	
	public function action_index()
	{

		$view = View::factory('zone/testjson');
		$this->response->body($view);
	} // End action_index

	//update menu when button is clicked
	public function action_updatemenuorder()
	{

		if($this->request->is_ajax())
		{
			$posted = $this->request->post();

			$jsonparent = json_decode($posted['jsonparent']);

			foreach ($jsonparent as $key =>$val) {
				$data = array(
					'menuname' => $posted['menuname'][$key],
					'orderlist' => $key,
					'levels' => $posted['levels'][$key],
					'parents' => $val->parent_id
				);
				$this->model_menu->update_order($data);
			}

			echo 'Saved in DB';	
		}
		exit;
	}//End of updatemenuorder

} // End Menu Controller
