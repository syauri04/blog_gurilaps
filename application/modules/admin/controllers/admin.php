<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class admin extends DC_controller {

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
		$data = $this->controller_attr;
		if($this->session->userdata('admin') != FALSE){
			redirect('admin/dashboard');
		}
		else{
			redirect('admin/login');
		}
	}
	


	 	function login(){
		$data = $this->controller_attr;
		$data['function']='login';
		$this->load->view('admin/index',$data);
	}

		function do_login()
	{
		$data = $this->controller_attr;
		$data['function']='do_login';
		if($this->session->userdata('admin') == FALSE){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$admin_user =select_where($this->tbl_user,'username',$username)->row();
			if($admin_user){
				if($admin_user->password == md5($password)){
					$data_user = array(
						'id' => $admin_user->id,
						'username' => $admin_user->username,
						'email' => $admin_user->email,
						'password' => $admin_user->password,
						'first_name' => $admin_user->first_name,
						'last_name' => $admin_user->last_name,
						'photo' => $admin_user->photo,
						'user_group' => $admin_user->user_group,
						);
					$this->session->set_userdata('admin',$data_user);
					redirect('admin/dashboard');
				}
				else{
					$this->session->set_flashdata('notif','error');
					$this->session->set_flashdata('msg','Your password is wrong');
					redirect('admin/login');
				}
			}
			else{
					$this->session->set_flashdata('notif','info');
					$this->session->set_flashdata('msg','Username not registered');
					redirect('admin/login');
			}
		}else{
			redirect('admin/dashboard');
		}
	}
	function logout(){
		$data = $this->controller_attr;
		$data += array('function' => 'logout','function_name' => 'Logout');
		if($this->session->userdata('admin') != FALSE){
			$this->session->unset_userdata('admin');
			redirect('admin/login');
		}
		else
			redirect('admin');
	}

	 function dashboard(){
	 	if($this->session->userdata('admin') == FALSE){
			redirect('admin/login');
		}
		$data = $this->controller_attr;
		$data['page'] = $this->load->view('admin/dashboard',$data,true);
		$this->load->view('layout_backend',$data);
	}

	 function profile(){
	 	if($this->session->userdata('admin') == FALSE){
			redirect('admin/login');
		}
		$data = $this->controller_attr;
		$data['function']='profile';
        $data['data'] = select_where($this->tbl_user,'id',$this->session->userdata['admin']['id'])->row();
		$data['page'] = $this->load->view('admin/profile',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function profile_update(){
		$data = $this->controller_attr;
		$data['function']='profile';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_user);
		$update = array();
		$user=select_where($this->tbl_user,'id',$this->session->userdata['admin']['id'])->row();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $email=select_where($this->tbl_user,'email',$update['email'])->num_rows();
        if($email>0 and $update['email']!=$user->email){
        	$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Sorry, email is already registered');
			redirect($data['controller']."/".$data['function']);
        }
        $username=select_where($this->tbl_user,'email',$update['username'])->num_rows();
        if($username>0 and $update['username']!=$user->username){
        	$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Sorry, username is already registered');
			redirect($data['controller']."/".$data['function']);
        }
        if($update['password']==''){
           $update['password']=$user->password;
        }else{
        	if(md5($this->input->post('old_password'))!=$user->password){
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Sorry, your old password is not match');
			redirect($data['controller']."/".$data['function']);
        	}elseif($this->input->post('password')!=$this->input->post('password')){
        	$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Sorry, your password and confirm password is not match');
			redirect($data['controller']."/".$data['function']);
        	}else{
        		$update['password']=md5($this->input->post('password'));
        	}
        }
        if($update['user_group']==''){
           $update['user_group']=$user->user_group;
        }
        if(empty($_FILES['photo']['name'])){
        	$update['photo']=$user->photo;
        }else{
        	 if (!file_exists('assets/uploads/user-admin/'.$user->id)) {
    				mkdir('assets/uploads/user-admin/'.$user->id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/user-admin/'.$user->id;
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['file_name'] = $_FILES['photo']['name'];
             $this->upload->initialize($config);
             if($this->upload->do_upload('photo')){
                    $uploadData = $this->upload->data();
                   	$update['photo']=$uploadData['file_name'];;
                   	$file = "assets/uploads/user-admin/".$user->id."/".$user->photo;
					unlink($file);
                }else{
                    echo"error upload";
                    die();
                }
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_user,$update,'id',$id);
		if($query){
			$admin_user=select_where($this->tbl_user,'id',$this->session->userdata['admin']['id'])->row();
			$data_user = array(
						'id' => $admin_user->id,
						'username' => $admin_user->username,
						'email' => $admin_user->email,
						'password' => $admin_user->password,
						'first_name' => $admin_user->first_name,
						'last_name' => $admin_user->last_name,
						'photo' => $admin_user->photo,
						'user_group' => $admin_user->user_group,
			);

			$this->session->set_userdata('admin',$data_user);
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

}

