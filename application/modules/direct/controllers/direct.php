<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Direct extends DC_Controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'direct','controller_name' => 'Home','method'=>ucwords($method));
	}
	
	 function index(){
		$data = $this->controller_attr;
		$data['function']='direct';
		 /*Default Meta */
		 $data['meta_title']='Gurialps';
		  $data['meta_description'] = 'Gurialps';
          $data['meta_keywords'] ='Gurialps';
          $data['meta_site_name'] ='blog.gruilaps.com';
          $data['meta_image']='blog.gruilaps.com';
        
    	$data['direct_prop']=select_where($this->tbl_provinces,"fprovinceid", "9")->row();
		$data['direct_kota']=direktori_kota($this->tbl_regencies,$data['direct_prop']->fprovinceid, "");
		// debugCode($data['direct_kota']);
     	$data['page'] = $this->load->view('direct/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}



	function regencies($id){
		$data = $this->controller_attr;
		$data['function']='regencies';
 		$data['regencies']=select_where($this->tbl_regencies,"fcityid", $id)->row();
 		$data['category']=select_all($this->tbl_category);
 		// debugCode($data['category']);
		$data['page'] = $this->load->view('direct/regencies',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}

	function detail($id){
		$data = $this->controller_attr;
		$data['function']='detail';
		$data['article']=select_where($this->tbl_content,"id", $id)->row();
		$data['regencies']=select_where($this->tbl_regencies,"fcityid", $data['article']->id_regencies)->row();
		$data['pic_header']=select_multiwhere($this->tbl_picture, 'id_content', $data['article']->id,'posisi_gambar', '1')->row();
		$data['listpicture'] = select_multiwhere_limit($this->tbl_picture, 'id_content', $data['article']->id,'posisi_gambar', '2','3')->result();
		$data['listpicture2'] = select_multiwhere_limit($this->tbl_picture, 'id_content', $data['article']->id,'posisi_gambar', '3','2')->result();
		// debugCode($data['listpicture2']);
		$data['page'] = $this->load->view('direct/detail',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}
	
}