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
        
        
        

      

      //   $data['galeryImager']=$galeryImage;
      //   $data['newsslide']=$newsslide;
            $data['banner']=select_all($this->tbl_banner);
            $data['news']=select_all($this->tbl_news);

      //   $data['pagetabJual'] = $this->load->view('home/unitjual',$data,true);
      //   $data['pagetabsewa'] = $this->load->view('home/unitsewa',$data,true);
      //   $data['pagetabpopuler'] = $this->load->view('home/unitpopuler',$data,true);
      //   $data['pagenews'] = $this->load->view('home/newsslide',$data,true);
     	// $data['pagegaleryImage'] = $this->load->view('home/galeryImage',$data,true);
     	$data['page'] = $this->load->view('direct/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}



	function regencies($id){
		$data = $this->controller_attr;
		$data['function']='regencies';
 		
		$data['page'] = $this->load->view('direct/regencies',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}

	function detail($id){
		$data = $this->controller_attr;
		$data['function']='detail';
 		
		$data['page'] = $this->load->view('direct/detail',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}
	
}