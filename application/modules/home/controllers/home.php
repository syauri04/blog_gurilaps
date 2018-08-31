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
		$data['banner']=select_all($this->tbl_banner);
		$data['direct_prop']=select_where($this->tbl_provinces,"fprovinceid", "9")->row();
		$data['direct_kota']=direktori_kota($this->tbl_regencies,$data['direct_prop']->fprovinceid,"4");
		$data['article']=select_where_content($this->tbl_content,"type_menu","article","2");
		$data['video']=select_where_limit_order($this->tbl_video,"","","1","id","DESC")->row();
		$data['listvideo']=select_where_limit_order($this->tbl_video,"","","8","id","DESC")->result();
		$data['agenda']=select_where_limit_order($this->tbl_content,"type_menu","agenda","1","id","DESC")->row();
		$data['listagenda']=select_where_content($this->tbl_content,"type_menu","agenda","2");
 		
 		// $this->load->library('curl'); 
 		$url = "https://api.gurilaps.id/post/special/?type*=hot-deals";
 		$data['hot_deals'] = get_curl($url);
 		// debugCode($data['hot_deals']['data']);
     	$data['page'] = $this->load->view('home/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}

function map_embed($address){
	    if (!is_string($address))die("All Addresses must be passed as a string");
	    $_url = sprintf('http://maps.google.com/maps?output=js&q=%s',rawurlencode($address));
	    $_result = false;
	    $ch = curl_init();
	    curl_setopt ($ch, CURLOPT_URL, $_url);
	    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	    $contents = curl_exec($ch);
	    curl_close($ch);
	    
	    if($_result = $contents) {
	        if(strpos($_result,'errortips') > 1 || strpos($_result,'Did you mean:') !== false) return false;
	        preg_match('!center:\s*{lat:\s*(-?\d+\.\d+),lng:\s*(-?\d+\.\d+)}!U', $_result, $_match);
	        $_coords['lat'] = $_match[1];
	        $_coords['long'] = $_match[2];
	    }
	    return $_coords;
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