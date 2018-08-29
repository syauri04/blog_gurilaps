<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Agenda extends DC_Controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'agenda','controller_name' => 'Home','method'=>ucwords($method));
	}
	
	 function index(){
		$data = $this->controller_attr;
		$data['function']='agenda';
		 /*Default Meta */
		 $data['meta_title']='Gurialps';
		  $data['meta_description'] = 'Gurialps';
          $data['meta_keywords'] ='Gurialps';
          $data['meta_site_name'] ='blog.gruilaps.com';
          $data['meta_image']='blog.gruilaps.com';
        
        
        

      	$data['agenda']=select_where_content($this->tbl_content,"type_menu","agenda","10");
      	// debugCode($data['agenda']);
     	$data['page'] = $this->load->view('agenda/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}



	function detail($id){
		$data = $this->controller_attr;
		$data['function']='home';
 		$data['agenda']=select_where($this->tbl_content,"id", $id)->row();
 		$data['picture']=get_pic_1($data['agenda']->id);
		$data['page'] = $this->load->view('agenda/detail',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}
	
}