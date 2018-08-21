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

	function SetPictures() {  
    	$images = array();
        if(isset($_POST['img_name']) && count($_POST['img_name']) > 0 ){
        	foreach($_POST['img_name'] as $key=>$val){ 
        	    $val2 = $_POST['img_title'][$key]; 
        	    $val3 = $_POST['posisi_gambar'][$key]; 
        	    $images[$key]['name'] = $val; 
        	    // $images[$key]['title'] = $val2; 
        	    $images[$key]['posisi_gambar'] = $val3; 
        	}
        }   
    	 return $images;
    }

    function SetPictures2() {  
    	$images = array();
        if(isset($_POST['img_name2']) && count($_POST['img_name2']) > 0 ){
        	foreach($_POST['img_name2'] as $key=>$val){ 
        	    $val2 = $_POST['img_title2'][$key]; 
        	    $val3 = $_POST['posisi_gambar2'][$key]; 
        	    $images[$key]['name'] = $val; 
        	    // $images[$key]['title'] = $val2; 
        	    $images[$key]['posisi_gambar'] = $val3; 
        	}
        }   
    	 return $images;
    }

		
	function article_page(){
		$this->check_access();
		$data = $this->controller_attr; 
		$data['function']='article_page';
		$data['list']=select_where_trash($this->tbl_content, 'type_menu', "article")->result();
		$data['page'] = $this->load->view('admin_content/list_article_page',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function article_page_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='article_page';
		if ($id) {
            $data['data'] = select_where($this->tbl_content, 'id', $id)->row();
			$data['kategori']=select_where($this->tbl_category,'id',$data['data']->category)->result();
			$data['province']=select_all($this->tbl_provinces);
			$data['regencies']=select_where($this->tbl_regencies,'fprovinceid',$data['data']->id_provinces)->result();
			$data['listpicture'] = select_multiwhere($this->tbl_picture, 'id_content', $id,'posisi_gambar', '2')->result();
			$data['listpicture2'] = select_multiwhere($this->tbl_picture, 'id_content', $id,'posisi_gambar', '3')->result();
			$data['picture'] = select_multiwhere($this->tbl_picture, 'id_content', $id,'posisi_gambar', '1')->row();
			// debugCode($data['regencies']);
        }
        else{
            $data['data'] = null;	
            $data['picture'] = null;
			$data['kategori']=select_all($this->tbl_category);
			$data['province']=select_all($this->tbl_provinces);
			$data['regencies']=select_all($this->tbl_regencies);
        }

        // debugCode($data['provinsi']);
		$data['page'] = $this->load->view('admin_content/article_page_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function article_page_update(){
		$data = $this->controller_attr;
		$data['function']='article_page';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_content);
		$static=select_where($this->tbl_content,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }

        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_content,$update,'id',$id);
        // debugCode($id);
        $get_pic = select_multiwhere($this->tbl_picture,'id_content',$id, 'posisi_gambar', '1')->row();
        if(empty($_FILES['images']['name'])){
        	$img['images']=$get_pic->name;
        }else{
        	 $img['images']=$_FILES['images']['name'];
        }

      
        $save_img=update($this->tbl_content,$update,'id',$get_pic->id);
        if($save_img){
        	if(!empty($_FILES['images']['name'])){
				unlink('assets/uploads/article/'.$id.'/'.$get_pic->name);
				if (!file_exists('assets/uploads/article/'.$id)) {
	    				mkdir('assets/uploads/article/'.$id, 0777, true);
				}
	        	 $config['upload_path'] = 'assets/uploads/article/'.$id;
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

			$images = $this->SetPictures();
			$images2 = $this->SetPictures2();
			//INSERT IMAGE
			if(count($images) >0 ){
				$p = 1;
	            foreach ($images as $key => $value) {
	            	$this->data1 = array(
	            		'id_content' => $id,
	            		'name' => $value['name'],
	            		'posisi_gambar' => $value['posisi_gambar'],
	            		'counter' => $p,
	            	);
	            	$this->db->insert($this->tbl_picture,$this->data1);
	            	$p++;
	            }
	        } 

	        if(count($images2) >0 ){
				$p2 = 1;
	            foreach ($images2 as $key2 => $value2) {
	            	$this->data2 = array(
	            		'id_content' => $id,
	            		'name' => $value2['name'],
	            		'posisi_gambar' => $value2['posisi_gambar'],
	            		'counter' => $p2,
	            	);
	            	$this->db->insert($this->tbl_picture,$this->data2);
	            	$p2++;
	            }
	        } 


        }

		if($query){
			
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
		$data['function']='article_page';
		$table_field = $this->db->list_fields($this->tbl_content);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
       

        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_content,$insert);

        if(empty($_FILES['images']['name'])){
        	$img['name']=='';
        }else{
        	$img['name']=$_FILES['images']['name'];
        }
        $img['id_content'] = $query->id;
        $img['posisi_gambar'] = 1;

        $save_img=insert_all($this->tbl_picture,$img);

        if($save_img){
			if(!empty($_FILES['images']['name'])){
				if (!file_exists('assets/uploads/article/'.$query->id)) {
						mkdir('assets/uploads/article/'.$query->id, 0777, true);
				}
				 $config['upload_path'] = 'assets/uploads/article/'.$query->id;
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

			$images = $this->SetPictures();

			$images2 = $this->SetPictures2();
			// debugCode($images2);
			//INSERT IMAGE
			if(count($images) >0 ){
				$p = 1;
	            foreach ($images as $key => $value) {
	            	$this->data1 = array(
	            		'id_content' => $query->id,
	            		'name' => $value['name'],
	            		'posisi_gambar' => $value['posisi_gambar'],
	            		'counter' => $p,
	            	);
	            	$this->db->insert($this->tbl_picture,$this->data1);
	            	$p++;
	            }
	        } 

	        if(count($images2) >0 ){
				$p2 = 1;
	            foreach ($images2 as $key2 => $value2) {
	            	$this->data2 = array(
	            		'id_content' => $query->id,
	            		'name' => $value2['name'],
	            		'posisi_gambar' => $value2['posisi_gambar'],
	            		'counter' => $p2,
	            	);
	            	$this->db->insert($this->tbl_picture,$this->data2);
	            	$p2++;
	            }
	        } 
        }
       
		if($query){

			
			
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function article_page_delete($id){
		// debugCode($id);
		$data = $this->controller_attr;
		$function='article_page';
		$update['is_trash']= 1;
		$query=update($this->tbl_content,$update,'id',$id);
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
		$data['list']=select_where($this->tbl_content, 'type_menu', "agenda")->result();
		$data['page'] = $this->load->view('admin_content/list_agenda',$data,true);
		$this->load->view('layout_backend',$data);
	}


	function agenda_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='agenda';
		if ($id) {
            $data['data'] = select_where($this->tbl_content, 'id', $id)->row();
            $data['listpicture'] = select_where($this->tbl_picture, 'id_content', $id)->result();
        }
        else{
            $data['data'] = null;
        }

        // debugCode($data['listpicture']);
		$data['page'] = $this->load->view('admin_content/agenda_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	
    function agenda_add(){
		// echo "string";die();
		$data = $this->controller_attr;
		$data['function']='agenda';
		$table_field = $this->db->list_fields($this->tbl_content);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
     	


        $insert['is_trash']= 0;
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_content,$insert);
        // debugCode($query->id);
        $images = $this->SetPictures();
		if($query){

			//INSERT IMAGE
			if(count($images) >0 ){
				$p = 1;
	            foreach ($images as $key => $value) {
	            	$this->data1 = array(
	            		'id_content' => $query->id,
	            		'name' => $value['name'],
	            		'posisi_gambar' => $value['posisi_gambar'],
	            		'counter' => $p,
	            	);
	            	$this->db->insert($this->tbl_picture,$this->data1);
	            	$p++;
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

	function agenda_update(){
		$data = $this->controller_attr;
		$data['function']='agenda';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_content);
		$static=select_where($this->tbl_content,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }

        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_content,$update,'id',$id);
		if($query){

			//INSERT IMAGE
			if(count($images) >0 ){
				$p = 1;
	            foreach ($images as $key => $value) {
	            	$this->data1 = array(
	            		'id_content' => $id,
	            		'name' => $value['name'],
	            		'posisi_gambar' => $value['posisi_gambar'],
	            		'counter' => $p,
	            	);
	            	$this->db->insert($this->tbl_picture,$this->data1);
	            	$p++;
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

	

	function agenda_delete($id){
		$data = $this->controller_attr;
		$function='event';
		$query=delete($this->tbl_content,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	function do_upload($folder){
		// debugCode($folder);
		$this->load->library('UploadHandler');
		// $upload_path_url = base_url() . 'assets/uploads/agenda/';
		$upload_path_url = base_url() . 'assets/uploads/'.$folder.'/';

        $config['upload_path'] = FCPATH.'assets/uploads/'.$folder;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '30000';

        $this->upload->initialize($config);
      	//debugCode($config);
        if (!$this->upload->do_upload()) {
        	
            //$error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload', $error);

            //Load the list of existing files in the upload directory
            // $existingFiles = get_dir_file_info($config['upload_path']);
		
            // $foundFiles = array();
            // $f=0;

           
            // foreach ($existingFiles as $fileName => $info) {
            	
            //   if($fileName!='thumbs'){//Skip over thumbs directory
            //     //set the data for the json array   
            //     $foundFiles[$f]['name'] = $fileName;
            //     $foundFiles[$f]['size'] = $info['size'];
            //     $foundFiles[$f]['url'] = $upload_path_url . $fileName;
            //     $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
            //     $foundFiles[$f]['deleteUrl'] = base_url() . 'admin_content/deleteImage/' . $fileName;
            //     $foundFiles[$f]['deleteType'] = 'DELETE';
            //     $foundFiles[$f]['error'] = null;
                 
            //     $f++;
            //   }
              
            
            // }


            // $this->output
            // ->set_content_type('application/json')
            // ->set_output(json_encode(array('files' => $foundFiles)));
        } else {
        	
            $data = $this->upload->data();
            // debugCode($data);
            /*
             * Array
              (
              [file_name] => png1.jpg
              [file_type] => image/jpeg
              [file_path] => /home/ipresupu/public_html/uploads/
              [full_path] => /home/ipresupu/public_html/uploads/png1.jpg
              [raw_name] => png1
              [orig_name] => png.jpg
              [client_name] => png.jpg
              [file_ext] => .jpg
              [file_size] => 456.93
              [is_image] => 1
              [image_width] => 1198
              [image_height] => 1166
              [image_type] => jpeg
              [image_size_str] => width="1198" height="1166"
              )
             */
            // to re-size for thumbnail images un-comment and set path here and in json array
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['new_image'] = $data['file_path'] . 'thumbs/';
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 75;
            $config['height'] = 50;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            
            //set the data for the json array
            $info = new StdClass;
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
            $info->deleteUrl = base_url() . 'admin_content/deleteImage/' . $data['file_name']. '/'. $folder;
            $info->deleteType = 'DELETE';
            $info->error = null;
            // debugCode($data);
            $files[] = $info;
           
            //this is why we put this in the constants to pass only json data
            if ($this->input->is_ajax_request()) {
            	 // debugCode($files);
                echo json_encode(array("files" => $files));
                //this has to be the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
                // so that this will still work if javascript is not enabled
            } else {
            	 debugCode("gagal");
                $file_data['upload_data'] = $this->upload->data();
            }
        }
	}

	function deleteImageP($id){
		$data = select_where($this->tbl_picture, 'id', $id)->row();
		debugCode($data);
	}

	function deleteImage($file, $folder) {//gets the job done but you might want to add error checking and security
        $success = unlink(FCPATH . 'assets/uploads/'.$folder.'/' . $file);
        $success = unlink(FCPATH . 'assets/uploads/'.$folder.'/thumbs/' . $file);
        //info to see if it is doing what it is supposed to
    	$info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'assets/uploads/'.$folder.'/' . $file;
        $info->file = is_file(FCPATH . 'assets/uploads/' . $folder. '/'. $file);

        if ($this->input->is_ajax_request()) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete        
            $file_data['delete_data'] = $file;
        }
    }


}

