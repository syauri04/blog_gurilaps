<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DC_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // DEFAULT TIME ZONE
        date_default_timezone_set('Asia/Jakarta');
        
        // TABLE 
        $this->tbl_prefix = 'dc_';
        $this->tbl_static_content= $this->tbl_prefix . 'static_content';
        $this->tbl_user= $this->tbl_prefix . 'user';
        $this->tbl_menu= $this->tbl_prefix . 'menu';
        $this->tbl_icons= $this->tbl_prefix . 'icons';
        $this->tbl_user_groups= $this->tbl_prefix . 'user_groups';
        $this->tbl_groups= $this->tbl_prefix . 'groups';
        $this->tbl_user_accsess= $this->tbl_prefix . 'menu_accsess';
        $this->tbl_appearance= $this->tbl_prefix . 'appearance';
        $this->tbl_news= $this->tbl_prefix . 'news';
        $this->tbl_pelanggan= $this->tbl_prefix . 'pelanggan';
        $this->tbl_contact= $this->tbl_prefix . 'contact';
        $this->tbl_banner= $this->tbl_prefix .'banner';
        $this->tbl_directory_content= $this->tbl_prefix .'directory_content';
        $this->tbl_article_content= $this->tbl_prefix .'article_content';


        $this->tbl_brand= $this->tbl_prefix .'brand';
       
        $this->tbl_event= $this->tbl_prefix .'event';
        $this->tbl_agenda= $this->tbl_prefix .'agenda';

        $this->tbl_video= $this->tbl_prefix .'video';
        $this->tbl_gallery= $this->tbl_prefix .'gallery';

        $this->tbl_provinces= $this->tbl_prefix .'provinces';
        $this->tbl_regencies= $this->tbl_prefix .'regencies';
        $this->tbl_districts= $this->tbl_prefix .'districts';
        $this->tbl_villages= $this->tbl_prefix .'villages';

        $this->tbl_content= $this->tbl_prefix .'content';
        $this->tbl_picture= $this->tbl_prefix .'picture';

        $this->tbl_category= $this->tbl_prefix .'category';
        $this->tbl_category_cerlang= $this->tbl_prefix .'category_cerlang';

        //load model fo all page
        $this->load->model('model_basic');

        //apperance function for all
        $this->appearance=select_where($this->tbl_appearance,'id',1)->row();
         $this->news_side_bar =select_all_limit_random($this->tbl_news,3);
    }

     function _save_master($data=array(),$par=array(),$vid=0){
        $id     = 0;
        $act    = FALSE;
        //debugCode($this->DATA);
        $o = $this->DATA->_cek($par);
        //debugCode($o);
        if( $o == 0 ){
            $act = $this->DATA->_add($data);
            $id = $this->db->insert_id();
        }else{
            $act = $this->DATA->_update($par,$data);
            $id = $vid;
        }
        return array(
            'id'    => $id,
            'msg'   => ($act)?'Success...':'Fail...'
        );
    }

    function _uploaded($par=array()){ 
        //debugCode($par);
        $user=select_where($this->tbl_user,'id',$par['id'])->row();
        //debugCode(count($user));
        if (!file_exists('assets/uploads/user-admin/'.$par['id'])) {
            mkdir('assets/uploads/user-admin/'.$par['id'], 0777, true);
        }

        $config['upload_path'] = 'assets/uploads/user-admin/'.$par['id'];
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES[$par['input']]['name'];
        $this->upload->initialize($config);
        if($this->upload->do_upload($par['input'])){
            $uploadData = $this->upload->data();
            $fileName=$uploadData['file_name'];
            if(count($user) == 1){
                $file = "assets/uploads/user-admin/".$par['id']."/".$user->photo;
                unlink($file);
            }
            $this->DATA->_update($par['param']['par'],array($par['param']['field']=>$fileName));
           
        }else{
            echo"error upload";
            die();
        }
        
    }

    function name_method($method){
        if($method!='index'){
            echo str_replace('_', ' ', $method);
        }
    }

    function check_login(){
        if($this->session->userdata('admin') == FALSE){
            redirect('admin/login');
        }
        else{
            return true;
        }
    }

    function get_menu(){
        if($this->session->userdata('admin')){
            $user_groups=$this->session->userdata['admin']['user_group'];
        }else{
            $user_groups=0;
        }
       $data=$this->model_basic->get_menu($user_groups);
       return $data;
    }


    function check_access(){
        if($this->session->userdata('admin')){
            $user_groups=$this->session->userdata['admin']['user_group'];
        }else{
            $user_groups=0;
        }
        $data=$this->model_basic->get_menu_access($user_groups);
        foreach ($data as $key) {
            $form=$key->target.'_form';
            if($key->target==$this->uri->segment(2) or $key->target==$this->uri->segment(1) or $form==$this->uri->segment(2)){
                redirect('admin/404');
            }
        }
    }

    function pagination($base_url,$total_row,$total_item){
        $config = array();
        $config["base_url"] = $base_url;
        $config["total_rows"] = $total_row;
        $config["per_page"] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['first_url'] = '1';
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data=$this->pagination->create_links();
        return $data;
    }

    function pagination_param($base_url,$total_row,$total_item){
        $config = array();
        $config["base_url"] = $base_url;
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['first_url'] = '1';
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data=$this->pagination->create_links();
        return $data;
    }

}
