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
	public function action_getjsonorder()
	{
		if ($this->request->is_ajax()) {
			# code...
			//array for json
			$temp = array();

			//get db
			$results = $this->model_menu->get_list()->execute()->as_array();

			echo json_encode($results);
			
		//still bug (in development)\\
			//$this->response->headers('Content-Type','application/json');
			//$this->request->headers['Content-Type'] = 'application/json';
			//$this->request->response = json_encode($results);
			//$this->content = json_encode($results);
			//$this->response->body(json_encode($results));
			//$this->response->render();
		//\\still bug (in development)//
		}
		exit;
	}//End getjsonorder

} // End