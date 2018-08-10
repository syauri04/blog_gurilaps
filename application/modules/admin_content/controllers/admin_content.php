<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class admin_content extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'admin_content','controller_name' => 'Admin Content','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	 function index(){
		redirect('admin_content/article_page');
	}
		
	function article_page(){
		$this->check_access();
		$data = $this->controller_attr; 
		$data['function']='article_page';
		$data['list']=select_all($this->tbl_article_content);
		$data['page'] = $this->load->view('admin_content/list_article_page',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function article_page_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='article_page';
		if ($id) {
			$prov = select_where($this->tbl_article_content, 'id_provinces', $id)->row();
			$kab = select_where($this->tbl_article_content, 'id_regencies', $id)->row();
			$kec = select_where($this->tbl_article_content, 'id_districts', $id)->row();
			$kel = select_where($this->tbl_article_content, 'id_villages', $id)->row();

            $data['data'] = select_where($this->tbl_article_content, 'id', $id)->row();
			$data['kategori']=select_where($this->tbl_category,'id',$id)->result();
			$data['provinsi']=select_where($this->tbl_provinces,'id',$id)->result();
			$data['kabupaten']=select_where($this->tbl_regencies,'id',$id)->result();
			$data['kecamatan']=select_where($this->tbl_district,'id',$id)->result();
			$data['kelurahan']=select_where($this->tbl_villages,'id',$id)->result();
        }
        else{
            $data['data'] = null;	
			$data['kategori']=select_all($this->tbl_category);
			$data['provinsi']=select_all($this->tbl_provinces);
        	}
		$data['page'] = $this->load->view('admin_content/article_page_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function article_page_update(){
		$data = $this->controller_attr;
		$data['function']='article_page';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_article_content);
		$static=select_where($this->tbl_article_content,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$static->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_article_content,$update,'id',$id);
		if($query){
			if(!empty($_FILES['images']['name'])){
			unlink('assets/uploads/directory-page/'.$id.'/'.$static->images);
			if (!file_exists('assets/uploads/directory-page/'.$id)) {
    				mkdir('assets/uploads/directory-page/'.$id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/directory-page/'.$id;
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

	function article_page_add(){
		$data = $this->controller_attr;
		$data['function']='diretory_page';
		$table_field = $this->db->list_fields($this->tbl_article_content);
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
        $query=insert_all($this->tbl_article_content,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/article-page/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/article-page/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/article-page/'.$this->db->insert_id();
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

	function article_page_delete($id){
		$data = $this->controller_attr;
		$function='article_page';
		$query=delete($this->tbl_article_content,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	function event(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='event';
		$data['list']=select_all($this->tbl_event);
		$data['page'] = $this->load->view('admin_content/list_event',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function event_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='event';
		if ($id) {
            $data['data'] = select_where($this->tbl_event, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('admin_content/event_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function event_update(){
		$data = $this->controller_attr;
		$data['function']='news';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_event);
		$static=select_where($this->tbl_event,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$event->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_event,$update,'id',$id);
		if($query){
			if(!empty($_FILES['images']['name'])){
			unlink('assets/uploads/event/'.$id.'/'.$event->images);
			if (!file_exists('assets/uploads/event/'.$id)) {
    				mkdir('assets/uploads/event/'.$id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/event/'.$id;
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

	function event_add(){
		$data = $this->controller_attr;
		$data['function']='event';
		$table_field = $this->db->list_fields($this->tbl_event);
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
        $query=insert_all($this->tbl_event,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/event/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/event/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/event/'.$this->db->insert_id();
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

	function event_delete($id){
		$data = $this->controller_attr;
		$function='event';
		$query=delete($this->tbl_event,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	function news(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='news';
		$data['list']=select_all($this->tbl_news);
		$data['page'] = $this->load->view('admin_content/list_news',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function news_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='news';
		if ($id) {
            $data['data'] = select_where($this->tbl_news, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('admin_content/news_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function news_update(){
		$data = $this->controller_attr;
		$data['function']='news';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_news);
		$static=select_where($this->tbl_news,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$news->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_news,$update,'id',$id);
		if($query){
			if(!empty($_FILES['images']['name'])){
			unlink('assets/uploads/news/'.$id.'/'.$news->images);
			if (!file_exists('assets/uploads/news/'.$id)) {
    				mkdir('assets/uploads/news/'.$id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/news/'.$id;
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

	function news_add(){
		$data = $this->controller_attr;
		$data['function']='news';
		$table_field = $this->db->list_fields($this->tbl_news);
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
        $query=insert_all($this->tbl_news,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/news/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/news/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/news/'.$this->db->insert_id();
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

	function news_delete($id){
		$data = $this->controller_attr;
		$function='news';
		$query=delete($this->tbl_news,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	//===== PELANGGAN

	function pelanggan(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='pelanggan';
		$data['list']=select_all($this->tbl_pelanggan);
		$data['page'] = $this->load->view('admin_content/list_pelanggan',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function pelanggan_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='pelanggan';
		if ($id) {
            $data['data'] = select_where($this->tbl_pelanggan, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('admin_content/pelanggan_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function pelanggan_update(){
		$data = $this->controller_attr;
		$data['function']='pelanggan';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_pelanggan);
		$static=select_where($this->tbl_pelanggan,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$news->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_pelanggan,$update,'id',$id);
		if($query){
			if(!empty($_FILES['images']['name'])){
			unlink('assets/uploads/pelanggan/'.$id.'/'.$news->images);
			if (!file_exists('assets/uploads/pelanggan/'.$id)) {
    				mkdir('assets/uploads/pelanggan/'.$id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/pelanggan/'.$id;
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

	function pelanggan_add(){
		$data = $this->controller_attr;
		$data['function']='pelanggan';
		$table_field = $this->db->list_fields($this->tbl_pelanggan);
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
        $query=insert_all($this->tbl_pelanggan,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/pelanggan/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/pelanggan/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/pelanggan/'.$this->db->insert_id();
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

	function pelanggan_delete($id){
		$data = $this->controller_attr;
		$function='pelanggan';
		$query=delete($this->tbl_pelanggan,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	//=====

	function banner(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='banner';
		$data['list']=select_all($this->tbl_banner);
		$data['page'] = $this->load->view('admin_content/list_banner',$data,true);
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
		$data['page'] = $this->load->view('admin_content/banner_form',$data,true);
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
	function gallery(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='gallery';
		$data['list']=select_all($this->tbl_gallery);
		$data['page'] = $this->load->view('admin_content/list_gallery',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function gallery_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='gallery';
		if ($id) {
            $data['data'] = select_where($this->tbl_gallery, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('admin_content/gallery_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function gallery_update(){
		$data = $this->controller_attr;
		$data['function']='gallery';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_gallery);
		$gallery=select_where($this->tbl_gallery,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$gallery->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_gallery,$update,'id',$id);
		if($query){
			if(!empty($_FILES['images']['name'])){
			unlink('assets/uploads/gallery/'.$id.'/'.$gallery->images);
			if (!file_exists('assets/uploads/gallery/'.$id)) {
    				mkdir('assets/uploads/gallery/'.$id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/gallery/'.$id;
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

	function gallery_add(){
		$data = $this->controller_attr;
		$data['function']='gallery';
		$table_field = $this->db->list_fields($this->tbl_gallery);
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
        $query=insert_all($this->tbl_gallery,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/gallery/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/gallery/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/gallery/'.$this->db->insert_id();
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

	function gallery_delete($id){
		$data = $this->controller_attr;
		$function='gallery';
		$query=delete($this->tbl_gallery,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	function video($id=1){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='video';
        $data['data'] = select_where($this->tbl_video, 'id', $id)->row();
		$data['page'] = $this->load->view('admin_content/video_form',$data,true);
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

	function agenda(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='agenda';
		$data['list']=select_all($this->tbl_agenda);
		$data['page'] = $this->load->view('admin_content/list_agenda',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function agenda_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='agenda';
		if ($id) {
            $data['data'] = select_where($this->tbl_agenda, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('admin_content/agenda_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function agenda_update(){
		$data = $this->controller_attr;
		$data['function']='agenda';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_agenda);
		$static=select_where($this->tbl_agenda,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$agenda->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_agenda,$update,'id',$id);
		if($query){
			if(!empty($_FILES['images']['name'])){
			unlink('assets/uploads/agenda/'.$id.'/'.$agenda->images);
			if (!file_exists('assets/uploads/agenda/'.$id)) {
    				mkdir('assets/uploads/agenda/'.$id, 0777, true);
			}
        	$config['upload_path'] = 'assets/uploads/agenda/'.$id;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library(upload,$config);
            for ($i=1; $i <=5 ; $i++) { 
            if(!empty($_FILES['filefoto'.$i]['name'])){
                if(!$this->upload->do_upload('filefoto'.$i))
                {	echo "error Upload";
                	die();}
                    // $this->upload->display_errors(); 
                else {
                    echo "Foto berhasil di upload";
                	}
            	}
        	}
             // $config['file_name'] = $_FILES['images']['name'];
             // $this->upload->initialize($config);
             // if($this->upload->do_upload('images')){
             //        $uploadData = $this->upload->data();
             //    }else{
             //        echo"error upload";
             //        die();
             //  }
          }
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function agenda_add(){
		$data = $this->controller_attr;
		$data['function']='agenda';
		$table_field = $this->db->list_fields($this->tbl_agenda);
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
        $query=insert_all($this->tbl_agenda,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/agenda/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/agenda/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/agenda/'.$this->db->insert_id();
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library(upload,$config);
            for ($i=1; $i <=5 ; $i++) { 
            if(!empty($_FILES['filefoto'.$i]['name'])){
                if(!$this->upload->do_upload('filefoto'.$i))
                {	echo "error Upload";
                	die();
                    // $this->upload->display_errors(); 
                }
                else {
                    echo "Foto berhasil di upload";
                	}
            	}
        	}




             // $config['file_name'] = $_FILES['images']['name'];
             // $this->upload->initialize($config);
             // if($this->upload->do_upload('images')){
             //        $uploadData = $this->upload->data();
             //    }else{
             //        echo"error upload";
             //        die();
             //  }
          }
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function agenda_delete($id){
		$data = $this->controller_attr;
		$function='event';
		$query=delete($this->tbl_agenda,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}


}

