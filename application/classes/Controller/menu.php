<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Menu extends Controller {
	
	private $model_name;
	
	public function __construct(Request $request, Response $response)
	{
		parent::__construct($request, $response);

		//model object
		$this->model_menu = Model::factory('Menus');
	}
	
	public function action_index()
	{
		//set input to null
		$data = array(
			'menuadd' => ''
			);

		//insert <start>
		if($posted = $this->request->post())
		{
			//insert validation
			$validation = Validation::factory($this->request->post())
			->rule('menuadd', 'not_empty')
            ->rule('menuadd', 'min_length', array(':value', 1));

            if($validation->check())
            {
            	//check maximum orderlist
            	$maxi = $this->model_menu->max_orderlist();

            	$data = array(
            		'menu' => $posted['menuadd'],
            		'orderlist' => $maxi+1,
            		'levels' => 0,
            		'parents' => $posted['menuadd']
            		);

            	//check maximum orderlist
            	$results = $this->model_menu->insert_menu($data);
            	HTTP::redirect('menu');
            }
		} //end of insert

		//get all menu - order by orderlist
		$res = $this->model_menu->get_list();
		$menuall = $res->execute();
		
		//for information page - order by id
		$menuid = $this->model_menu->get_list_id();

 		$row = $res->as_object()->execute();

		//view
		$view = View::factory('zone/testing')
		->set('menuorder',$menuall)
		->set('menuorderObject', $row)
		->set('menuid',$menuid)
		->bind('posted', $data);

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
