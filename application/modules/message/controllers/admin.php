<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class message extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'message','controller_name' => 'Message','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	 function index(){
		redirect('message/inbox');
	}
	
	function inbox(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='inbox';
		$data['list']=select_all($this->tbl_contact);
		$data['page'] = $this->load->view('admin_content/list_inbox',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function compose($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='inbox';
		if ($id) {
            $data['data'] = select_where($this->tbl_contact, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('admin_content/inbox_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function inbox_add(){
		$data = $this->controller_attr;
		$data['function']='inbox';
		$table_field = $this->db->list_fields($this->tbl_contact);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_contact,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

}

