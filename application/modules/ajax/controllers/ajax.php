<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Ajax extends DC_Controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'admin','controller_name' => 'Admin','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	public function index(){
		redirect(site_url());
	}
	
	function getProvince($id){
		
		$hsl = array();
		$a = $this->db->get_where("cp_app_province",array('province_country' => $id))->result();
		//debugCode($a);
		echo json_encode(array('rows'=>$a));
	}
	function getCity($id){
		
		$hsl = array();
		$a = $this->db->get_where($this->tbl_regencies,array('fprovinceid' => $id))->result();
		//debugCode($a);
		echo json_encode(array('rows'=>$a));
	}


}

