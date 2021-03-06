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

       	  $data['head_article']=select_where_limit_order($this->tbl_content,"type_menu","article","1","id","DESC")->row();
       	  $data['head_pic']=get_pic_1($data['head_article']->id);
       	  $data['article']=select_where_content($this->tbl_content,"type_menu","article","3");
       	  $data['row']=select_where_content($this->tbl_content,"type_menu","article","");
       	  // $row_total = select_where_array_order($this->tbl_content,"",'date_created','DESC')->num_rows();
       	 
       	  $data['paging']=$this->pagination_param(base_url()."article/page/",3,count($data['row']));
       	  // debugCode( count($data['paging']));
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
		$url = "https://api.gurilaps.id/post/special/?type*=hot-deals";
 		$data['hot_deals'] = get_curl($url);
		$data['page'] = $this->load->view('article/detail',$data,true);
	
		$this->load->view('layout_frontend',$data);
	}
	
}