<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Form extends Controller {
	
	private $model_name;
	
	public function __construct(Request $request, Response $response)
	{
		parent::__construct($request, $response);

		//model object
		$this->model_name = Model::factory('Production');
	}

	
	public function action_index()
	{
		//sort by A-Z or Z-A
		if($posted = $this->request->post()){
			$validation = Validation::factory($this->request->post())
            ->rule('sort', 'not_empty');

            if($validation->check())
            {
				if($posted['sort'] == '1')
				{
					if ($posted['asc']==TRUE)
					{
						$userall = $this->model_name->sort_by('id');
					}
					else
					{
						$userall = $this->model_name->sort_by('id',$posted['asc']);
					}
					$sortindex = 1;
				}
				else if($posted['sort']  == '2')
				{
					if ($posted['asc']==TRUE)
					{
						$userall = $this->model_name->sort_by('username');
					}
					else
					{
						$userall = $this->model_name->sort_by('username',$posted['asc']);
					}
					$sortindex = 2;
				}
				else if ($posted['sort'] == '3')
				{
					if ($posted['asc']==TRUE)
					{
						$userall = $this->model_name->sort_by('product');
					}
					else
					{
						$userall = $this->model_name->sort_by('product',$posted['asc']);
					}
					$sortindex = 3;
				}
				else if ($posted['sort'] == '4')
				{
					if ($posted['asc']==TRUE)
					{
						$userall = $this->model_name->sort_by('quantity');
					}
					else
					{
						$userall = $this->model_name->sort_by('quantity',$posted['asc']);
					}
					$sortindex = 4;
				}
				else if ($posted['sort'] == '5')
				{
					if ($posted['asc']==TRUE)
					{
						$userall = $this->model_name->sort_by('created_at');
					}
					else
					{
						$userall = $this->model_name->sort_by('created_at',$posted['asc']);
					}
					$sortindex = 5;
				}
				else if ($posted['sort'] == '6')
				{
					if ($posted['asc']==TRUE)
					{
						$userall = $this->model_name->sort_by('updated_at');
					}
					else
					{
						$userall = $this->model_name->sort_by('updated_at',$posted['asc']);
					}
					$sortindex = 6;
				}
			}
			else
			{
				$userall = $this->model_name->get_list();
				$sortindex = 0;
			}
			$order = $posted['asc'];
		}
		else
		{
			$userall = $this->model_name->get_list();
			$sortindex = 0;
			$order = TRUE;
		}

		//order by  A-Z , Z-A
		if($order == TRUE){
			$order2 = FALSE;
			$order = TRUE;
		}
		else
		{
			$order2 = TRUE;
		}

		$view = View::factory('zone/view')
		->set('users', $userall)
		->set('sortindex',$sortindex)
		->set('order',$order)
		->set('order2',$order2);
		
		$this->response->body($view);
	} // End action_index
	
	public function action_delete()
	{
		$id = $this->request->param('id');
		$this->model_name->delete($id);
		
		HTTP::redirect('form');
	} // End action_delete
	
	//call by parameter (direct)
	public function action_call()
	{
		$username = $this->request->param('username');
		$results = $this->model_name->search_user($username);
		if($results){
			foreach($results as $user):
				echo $user->username." | ".$user->product."<br/>";
			endforeach;
		}else if ($results=='' || $results == ' ' || $results== null){
			echo "data not found";
		}
	} // End action_call
	
	//update 
	public function action_update()
	{
		if($posted = $this->request->post())
		{
			$updtime = Date::formatted_time('now',"Y-m-d H:i:s",'GMT+7');
			
			$data = array(
				'username' => $posted['username'],
				'product' => $posted['product'],
				'quantity' => $posted['quantity'],
				'id' => $posted['id'],
				'time' => $updtime
			);

			$this->model_name->update($data);
			
			HTTP::redirect('form');
		}

		$id = $this->request->param('id');
		$useredit = $this->model_name->search_id($id);
		
		$view = View::factory('zone/update')->set('users',$useredit);
		$this->response->body($view);
	} // End action_update

	//insert
	public function action_insert(){

		$data = array(
					'username' => '',
					'product' => '',
					'quantity' => ''
				);

		if($posted = $this->request->post()){

			$validation = Validation::factory($this->request->post())
            ->rule('username', 'not_empty')
            ->rule('username', 'min_length', array(':value', 6))
            ->rule('product', 'not_empty')
            ->rule('product', 'min_length', array(':value', 6))
            ->rule('quantity', 'not_empty')
            ->rule('quantity', 'numeric');

            if( $validation->check() ){
	            $time = Date::formatted_time('now',"Y-m-d H:i:s",'GMT+7');

				$data = array(
					'username' => $posted['username'],
					'product' => $posted['product'],
					'quantity' => $posted['quantity'],
					'created_at' => $time,
					'updated_at' => $time
				);

				$results = $this->model_name->insert_data($data);

				HTTP::redirect('form');
			}else{
				$data = array(
					'username' => $posted['username'],
					'product' => $posted['product'],
					'quantity' => $posted['quantity']
				);
			}

	        $view = View::factory('zone/insert')
			->bind('posted', $data);

			$this->response->body($view);
		}

		$view = View::factory('zone/insert')
		->bind('posted', $data);

		$this->response->body($view);
	} // End action_insert

} // End Form
