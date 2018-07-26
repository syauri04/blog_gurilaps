<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class news extends DC_controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'news','controller_name' => 'News','method'=>ucwords($method));
	}
	
	 function index(){
		$data = $this->controller_attr;
		$data['function']='news';
		$data['breadcumb']='News';
		  $data['title'] = '';
		//custom
         		 $data['meta_title']='rumah rumah sentul';
		     $data['meta_description'] = 'Cari beli dan jual properti secara online mudah aman sekaligus cepat, hanya di RumahSentul.com';
          $data['meta_keywords'] ='rumah di jual,beli rumah,bogor,asri bogor, rumah indah di bogor, view mountain, sentul city, apartment,pemandangan indah,harga murah,harga terjangkau, invesstasi';
          $data['meta_site_name'] ='RumahSentul.com';
          $data['meta_image']='RumahSentul.com';
        
        $data['data']=select_all($this->tbl_news);
		$data['page'] = $this->load->view('news/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}
	
	function detail($id){
		$data = $this->controller_attr;
		$data['function']='detail';
		$data['breadcumb']='News';
		
		$data['data'] = select_where($this->tbl_news,'id',$id)->row();
        $data['title'] = $data['data']->title;
    
		$data['page'] = $this->load->view('news/detail',$data,true);
		$this->load->view('layout_frontend',$data);
	}
}

