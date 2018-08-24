<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Feature extends DC_Controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'feature','controller_name' => 'Admin Content','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	 function index(){
		redirect('feature/banner');
	}
	
	//=====

	function banner(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='banner';
		$data['list']=select_all($this->tbl_banner);
		$data['page'] = $this->load->view('feature/list_banner',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function banner_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='banner';
		if ($id) {
            $data['data'] = select_where($this->tbl_banner, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('feature/banner_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function banner_update(){
		$data = $this->controller_attr;
		$data['function']='banner';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_banner);
		$banner=select_where($this->tbl_banner,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$banner->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_banner,$update,'id',$id);
		if($query){
			if(!empty($_FILES['images']['name'])){
			unlink('assets/uploads/banner/'.$id.'/'.$banner->images);
			if (!file_exists('assets/uploads/banner/'.$id)) {
    				mkdir('assets/uploads/banner/'.$id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/banner/'.$id;
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['file_name'] = $_FILES['images']['name'];
             $this->upload->initialize($config);
             if($this->upload->do_upload('images')){
                    $uploadData = $this->upload->data();
                }else{
                    echo"error upload";
                    die();
              }
          }
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function banner_add(){
		$data = $this->controller_attr;
		$data['function']='banner';
		$table_field = $this->db->list_fields($this->tbl_banner);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$insert['images']=='';
        }else{
        	 $insert['images']=$_FILES['images']['name'];
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_banner,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/banner/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/banner/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/banner/'.$this->db->insert_id();
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['file_name'] = $_FILES['images']['name'];
             $this->upload->initialize($config);
             if($this->upload->do_upload('images')){
                    $uploadData = $this->upload->data();
                }else{
                    echo"error upload";
                    die();
              }
          }
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function banner_delete($id){
		$data = $this->controller_attr;
		$function='banner';
		$query=delete($this->tbl_banner,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}


	function video(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='video';
		$data['list']=select_all($this->tbl_video);
		$data['page'] = $this->load->view('feature/list_video',$data,true);
		$this->load->view('layout_backend',$data);
	}


	function video_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='video';
		if ($id) {
            $data['data'] = select_where($this->tbl_video, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('feature/video_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function video_update(){
		$data = $this->controller_attr;
		$data['function']='video';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_video);
		$video=select_where($this->tbl_video,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_video,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function video_add(){
		$data = $this->controller_attr;
		$data['function']='video';
		$table_field = $this->db->list_fields($this->tbl_video);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_video,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function video_delete($id){
		$data = $this->controller_attr;
		$function='video';
		$query=delete($this->tbl_video,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}



	function kategori(){ 
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='kategori';
		$data['list']=select_all($this->tbl_category);
		$data['page'] = $this->load->view('feature/list_kategori',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function kategori_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='kategori';
		if ($id) {
            $data['data'] = select_where($this->tbl_category, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('feature/kategori_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function kategori_update(){
		$data = $this->controller_attr;
		$data['function']='kategori';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_category);
		$static=select_where($this->tbl_category,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_category,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function kategori_add(){
		$data = $this->controller_attr;
		$data['function']='kategori';
		$table_field = $this->db->list_fields($this->tbl_category);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_category,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function kategori_delete($id){
		$data = $this->controller_attr;
		$function='kategori';
		$query=delete($this->tbl_category,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	function cerlang_kategori(){ 
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='cerlang_kategori';
		$data['list']=select_all($this->tbl_category_cerlang); 
		$data['page'] = $this->load->view('feature/list_cerlang_kategori',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function cerlang_kategori_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='cerlang_kategori';
		if ($id) {
            $data['data'] = select_where($this->tbl_category_cerlang, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('feature/cerlang_kategori_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function cerlang_kategori_update(){
		$data = $this->controller_attr;
		$data['function']='cerlang_kategori';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_category_cerlang);
		$static=select_where($this->tbl_category_cerlang,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_category_cerlang,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function cerlang_kategori_add(){
		$data = $this->controller_attr;
		$data['function']='cerlang_kategori';
		$table_field = $this->db->list_fields($this->tbl_category_cerlang);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_category_cerlang,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function cerlang_kategori_delete($id){
		$data = $this->controller_attr;
		$function='cerlang_kategori';
		$query=delete($this->tbl_category_cerlang,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}


}

