<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Jsontest extends Controller {
	
	private $model_name;
	private $model_menu;
	
	public function __construct(Request $request, Response $response)
	{
		parent::__construct($request, $response);

		//model object
		$this->model_name = Model::factory('Mdjsons');
		$this->model_menu = Model::factory('Menus');
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
			//array for json
			//$temp = array();

			//get db
			$results = $this->model_name->get_list()->execute()->as_array();

			//$output = json_encode(array('items' => $results));
			echo json_encode($results);
			
			//no need of this, already completed at action_getjsonmenu
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


	//example using json and response with array / json
	public function action_getjsonmenu(){
		if($this->request->is_ajax()){
			$results = $this->model_menu->get_list()->execute()->as_array();//DB

			//if want rename the json try :
			//$json_yolo = json_encode(array('menus' => $results));

			//json unnamed
			$json_yolo = json_encode($results);

			//array type from json
		    $arrays = json_decode($json_yolo,true);

		    //get the array
		    $data = array(
		    	0 => $arrays,
		    	1 => $results
		    );

		    //force type TRUE >>> JSON_FORCE_OBJECT
		    //wikia : //http://www.dyn-web.com/tutorials/php-js/json/array.php
		    echo json_encode($data,TRUE);

		}
		exit;
	}

//checkpoints
	//example get list start - experimental v1
	public function action_getjsonlist(){
		if($this->request->is_ajax()){
			$results = $this->model_menu->get_list()->execute()->as_array();//DB

			//to array - named menus
			//$data = array('menus' => $results); 

		    //force type TRUE >>> JSON_FORCE_OBJECT
		    //wikia : //http://www.dyn-web.com/tutorials/php-js/json/array.php
		    echo json_encode($data,TRUE);

//save points
	        // $level = 0; //root
	        // //$zen = $this->recList($array,$level);
	        // //var_dump($zen);exit;
	        // print $this->recList( $arrays, $level );
		}
		exit;
	}
	// public function recList( $arrays, $level) {
	//    $r = '' ;
	//    foreach ( $arrays as $i ) {
	//        if ($i['parents'] == $level ) {
	//           $r = $r . "<li>" . $i['menu'] . recList( $arrays, $i['id'] ) . "</li>";
	//        }
	//    }
	//    return ($r==''?'':"<ol>". $r ."</ol>");
	// }

} // End