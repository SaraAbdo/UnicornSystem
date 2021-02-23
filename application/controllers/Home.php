<?php

class Home extends CI_Controller {

	public function index()
	{
        $data['info'] = $this->home_model->get_unicorn_info();
        $data['owners']=$this->home_model->get_owners();
		$this->load->view('home',$data);

	}

	public function insert_info()
	{
	    $name = $this->input->post('name');
		$color=$this->input->post('color');
		$owner=$this->input->post('owner');

		// var_dump(name);

		 $this->home_model->add_unicorn($name,$color,$owner);
		 echo json_encode(array('flag' => 1 ));
	}

	// public function insert_info()
	// {


	// 	var_dump("test");

	// }
	

   
}
?>