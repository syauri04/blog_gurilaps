<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class contact extends DC_controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'contact','controller_name' => 'Contact','method'=>ucwords($method));
	}
	
	 function index(){
		$data = $this->controller_attr;
		$data['function']='contact';
        //custom

        $data['page'] = $this->load->view('contact/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}


	function contact_send()
	{
		$this->load->library('email');
		$email = $this->input->post("email");
		$subject = $this->input->post("subject");
		$message = $this->input->post("message");
		$name = $this->input->post("name");

		$data = $this->controller_attr;
		$data['function'] = 'contact';
		if ($email) {
			$this->email->to('rumahsentul@yopmail.com');
			$this->email->from($email, 'rumahsentull');
			$this->email->subject($subject . $name);
			$this->email->message($message);
			$this->email->send();
		}
		$data['page'] = $this->load->view('contact/index',$data,true);
		$this->load->view('layout_frontend',$data);

	}



}

