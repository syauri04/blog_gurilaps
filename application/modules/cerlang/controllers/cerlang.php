<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Cerlang extends DC_Controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'cerlang','controller_name' => 'Home','method'=>ucwords($method));
	}
	
	 function index(){
		$data = $this->controller_attr;
		$data['function']='cerlang';
		 /*Default Meta */
		 $data['meta_title']='Gurialps';
		  $data['meta_description'] = 'Gurialps';
          $data['meta_keywords'] ='Gurialps';
          $data['meta_site_name'] ='blog.gruilaps.com';
          $data['meta_image']='blog.gruilaps.com';
        
        
        $data['category']=select_all($this->tbl_category_cerlang);
        // debugCode($data['category']);
     	$data['page'] = $this->load->view('cerlang/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}



	function detail($id){
		$data = $this->controller_attr;
		$data['function']='home';
 	
		$data['cerlang']=select_where($this->tbl_content,"id", $id)->row();
		$data['pic_head']=get_pic_1($data['cerlang']->id);
		$data['picture']=get_pic_2($data['cerlang']->id);
		// debugCode($data['picture']);
		$data['page'] = $this->load->view('cerlang/detail',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}
	
}