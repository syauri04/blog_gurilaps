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

	function province(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='province';
		$data['list']=select_all($this->tbl_provinces);
		$data['page'] = $this->load->view('admin_content/list_province',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function province_form($country=null, $id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='province';
		if ($id) {
            $data['data'] = select_multiwhere($this->tbl_provinces, 'fprovinceid', $id, 'fcountrycode', $country)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('admin_content/province_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function province_update(){
		$data = $this->controller_attr;
		$data['function']='province';
		$id=$this->input->post('fprovinceid');
		$country=$this->input->post('fcountrycode');	
		$table_field = $this->db->list_fields($this->tbl_provinces);
		$static=select_multiwhere($this->tbl_provinces,'fprovinceid',$id, 'fcountrycode', $country)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_provinces,$update,'fprovinceid',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');} 
		else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');}
		redirect($data['controller']."/".$data['function']);
	}

	function province_add(){
		$data = $this->controller_attr;
		$data['function']='province';
		$table_field = $this->db->list_fields($this->tbl_provinces);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_provinces,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');}
		else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');}
		redirect($data['controller']."/".$data['function']);
	}

	function province_delete($id){
		$data = $this->controller_attr;
		$function='province';
		$query=delete($this->tbl_provinces,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

	function kabupaten($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='kabupaten';
		$data['propinsi']= select_where($this->tbl_provinces, 'fprovinceid',$id)->row();
		$data['list']=select_where($this->tbl_regencies, 'fprovinceid',$id)->result();
		$data['page'] = $this->load->view('admin_content/list_kabupaten',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function kabupaten_form($country=null, $province=null, $id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='kabupaten';
		if ($id) {
            $data['data'] = select_threewhere($this->tbl_regencies,'fcountrycode', $country,'fprovinceid', $province,'fcityid', $id)->row();
        }
        else{
            $data['data'] = null;
        } 
		$data['page'] = $this->load->view('admin_content/kabupaten_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function kabupaten_update(){
		$data = $this->controller_attr;
		$data['function']='kabupaten';
		$id=$this->input->post('fcityid');
		$countrycode=$this->input->post('fcountrycode');
		$citystatus=$this->input->post('fcitystatus');
		$provinceid=$this->input->post('fprovinceid');
		$table_field=$this->db->list_fields($this->tbl_regencies);
		$kabupaten=select_threewhere($this->tbl_regencies,'fcityid', $id, 'fprovinceid', $provinceid, 'fcountrycode', $countrycode)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['image']['name'])){
        	$update['image']=$kabupaten->image;
        }else{
        	 $update['image']=$_FILES['image']['name'];
        }
        if(empty($_FILES['image_detail']['name'])){
        	$update['image_detail']=$kabupaten->image_detail;
        }else{
        	 $update['image_detail']=$_FILES['image_detail']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_regencies,$update,'fcityid',$id);
		if($query)
		{
			if(!empty($_FILES['image']['name']) && !empty($_FILES['image_detail']['name']))
				{	unlink('assets/uploads/kabupaten/'.$id.'/'.$kabupaten->image);
					unlink('assets/uploads/kabupaten/'.$id.'/'.$kabupaten->image_detail);
					if (!file_exists('assets/uploads/kabupaten/'.$id)) 
						{	mkdir('assets/uploads/kabupaten/'.$id, 0777, true);}
        	 		$config['upload_path'] = 'assets/uploads/kabupaten/'.$id;
             		$config['allowed_types'] = 'jpg|jpeg|png|gif';
             		$config['file_name'] = $_FILES['image']['name'];
		            $this->upload->initialize($config);
        		    if($this->upload->do_upload('image'))
             			{	$config['upload_path'] = 'assets/uploads/kabupaten/'.$id;
             				$config['allowed_types'] = 'jpg|jpeg|png|gif';
             				$config['file_name'] = $_FILES['image_detail']['name'];
		            		$this->upload->initialize($config);
		        		    if($this->upload->do_upload('image_detail'))
		        		    	{	$uploadData = $this->upload->data();}
		                	else
        		        		{	echo"error upload";
                	    			die(); }
		        		 }
                	else
                		{	echo"error upload";
                    			die(); }
          		}
				$this->session->set_flashdata('notif','success');
				$this->session->set_flashdata('msg','Your data have been updated');
		}
		else
		{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']."/".$provinceid);
	}

	function kabupaten_add(){
		$data = $this->controller_attr;
		$data['function']='kabupaten';
		$table_field = $this->db->list_fields($this->tbl_regencies);
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
        $query=insert_all($this->tbl_regencies,$insert);
		if($query){
			if(!empty($_FILES['images']['name'])){
			if (!file_exists('assets/uploads/kabupaten/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/kabupaten/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/kabupaten/'.$this->db->insert_id();
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

	function kabupaten_delete($id){
		$data = $this->controller_attr;
		$function='kabupaten';
		$query=delete($this->tbl_regencies,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}


}

