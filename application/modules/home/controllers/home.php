<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Home extends DC_Controller {

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
        
        
        

      

      //   $data['galeryImager']=$galeryImage;
      //   $data['newsslide']=$newsslide;
            $data['banner']=select_all($this->tbl_banner);
            $data['news']=select_all($this->tbl_news);

      //   $data['pagetabJual'] = $this->load->view('home/unitjual',$data,true);
      //   $data['pagetabsewa'] = $this->load->view('home/unitsewa',$data,true);
      //   $data['pagetabpopuler'] = $this->load->view('home/unitpopuler',$data,true);
      //   $data['pagenews'] = $this->load->view('home/newsslide',$data,true);
     	// $data['pagegaleryImage'] = $this->load->view('home/galeryImage',$data,true);
     	$data['page'] = $this->load->view('home/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}



	function unitjual(){
		$data = $this->controller_attr;
		$data['function']='home';
 		$unit_jual=select_where_limit_order($this->tbl_unit,'id_transaction','2','9','id','DESC')->result();
        foreach ($unit_jual as $key) {
        	$album=select_where($this->tbl_album_unit,'id_unit',$key->id)->row();
        	$key->id_image=$album->id;
        	$key->image=$album->images;
        }
            $data['banner']=select_all($this->tbl_banner);
        $data['unit_jual']=$unit_jual;
			$data['pagetabJual'] = $this->load->view('home/unitjual',$data,true);
		$data['page'] = $this->load->view('home/index',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}
	
}