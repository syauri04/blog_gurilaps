<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Article extends DC_Controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'home','controller_name' => 'Home','method'=>ucwords($method));
	}
	
	 function index(){
		$data = $this->controller_attr;
		$data['function']='home';
		 /*Default Meta */
		 $data['meta_title']='Gurialps';
		  $data['meta_description'] = 'Gurialps';
          $data['meta_keywords'] ='Gurialps';
          $data['meta_site_name'] ='blog.gruilaps.com';
          $data['meta_image']='blog.gruilaps.com';

       	$data['article']=select_where_content($this->tbl_content,"type_menu","article","");
       	 // debugCode($data['article']);
     	$data['page'] = $this->load->view('article/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}



	function detail($id){
		$data = $this->controller_attr;
		$data['function']='home';
		$data['article']=select_where($this->tbl_content,"id", $id)->row();
		$data['pic_header']=select_multiwhere($this->tbl_picture, 'id_content', $data['article']->id,'posisi_gambar', '1')->row();
		$data['listpicture'] = select_multiwhere_limit($this->tbl_picture, 'id_content', $data['article']->id,'posisi_gambar', '2','4')->result();
		$data['category']=select_all($this->tbl_category);
		// debugCode($data['category']);
		$data['page'] = $this->load->view('article/detail',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}
	
}