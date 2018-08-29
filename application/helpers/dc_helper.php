<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function debugCode($r=array(),$f=TRUE){
	echo "<pre>";
	print_r($r);
	echo "</pre>";
	
	if($f==TRUE)
		die;
}

if( ! function_exists('dbClean')){
	
	function dbClean($string,$size=1000000){
		return xss_clean(substr($string,0,$size));
	}
	
}

function ftime($time){
	$ft = explode(":", $time);

	return $ft[0].":".$ft[1];
}
function nmloc($title){
	$ft = explode(",", $title);

	return ucwords($ft[0]);
}

function indonesian_date ($timestamp = '', $date_format = '', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} ";
    return $date;
}

function limite_character($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

function get_pic_1($id){
	$get=select_multiwhere("dc_picture", 'id_content', $id,'posisi_gambar', '1')->row();

	return $get;
}
function get_pic_2($id){
	$get=select_multiwhere("dc_picture", 'id_content', $id,'posisi_gambar', '2')->row();

	return $get;
}

function direktori_kota($table, $idprov, $limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where("fprovinceid",$idprov);
		$ci->db->where("image !=",NULL);
		$ci->db->order_by('fcityid', 'RANDOM');
		if($limit != ""){
			// debugCode($limit);
		$ci->db->limit($limit);
		}
		$data = $ci->db->get()->result();
		return $data;
	}


function get_title($id,$table){
		$CI =& get_instance();
   		$CI->load->database(); 
		$query=$CI->db->query("select * from ".$table." where id='".$id."'")->row();
		$name=$query->title;
		return $name;
	}

function get_client_ip_server() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
	}

	function get_bln($date){
		$bln=substr($date, 5,2);
		$tgl=substr($date, 8,2);
		$thn=substr($date, 0,4);
		$monthNum = $bln;
 		$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
 		$date=$monthName." ".$tgl.", ".$thn;
 		return $date;
	}

	function get_date($date){
		$yrdata= strtotime($date);
    	return date('D, d M Y ', $yrdata);
	}
	function get_name_admin($id){
		$CI =& get_instance();
   		$CI->load->database(); 
		$query=$CI->db->query("select * from ".$this->tbl_user." where id='".$id."'")->row();
		$name=$query->username;
		return $name;
	}
	function idr($angka){
		$angka ="IDR. ".number_format($angka,2,',','.');
		$duitnya=str_replace(",00", "", $angka);
		return $duitnya;
	
	}
	function persen($data1,$data2){
		$data=$data2*100/$data1;
		return $data;
	}

	function get_days_left($day){
		$date1 = new DateTime(substr($day,0,10)); 
  		$date2 = new DateTime(date('Y-m-d')); 
  		$diff = $date2->diff($date1)->format("%a"); 
  		$days = intval($diff);  
  		return $days;
	}

	function url($val){
		$a=str_replace(' ','-', $val);
		$b=str_replace(',','', $a);
		$c=str_replace('.','', $b);
		return $c;

	}
	function get_count($table){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		return $ci->db->get()->num_rows();
	}
	function select_all($table){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$data = $ci->db->get();
		return $data->result();
	}
	function select_all_content($table){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where("status",1);
		$data = $ci->db->get();
		return $data->result();
	}
	function select_where($table,$column,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		// $ci->db->order_by('fcityid', 'RANDOM');
		
		$data = $ci->db->get();
		return $data;
	}

	function select_where_content($table,$column,$where,$limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		// $ci->db->where($column2,$where2);
		$ci->db->where("status",1);
		$ci->db->order_by('id', 'DESC');

		if($limit != ""){
			// debugCode($limit);
		$ci->db->limit($limit);
		}
		


		// $ci->db->order_by('fcityid', 'RANDOM');
		
		$data = $ci->db->get()->result();
		// debugCode($ci->db->last_query());
		return $data;
	}

	function select_where_content_cat($table,$column,$where,$column2,$where2,$column3,$where3,$limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		$ci->db->where($column2,$where2);
		if($column3 != "" AND $where3 != ""){
			$ci->db->where($column3,$where3);
		}
		$ci->db->where("status",1);
		$ci->db->order_by('id', 'DESC');

		if($limit != ""){
			// debugCode($limit);
		$ci->db->limit($limit);
		}
		


		// $ci->db->order_by('fcityid', 'RANDOM');
		
		$data = $ci->db->get()->result();
		// debugCode($ci->db->last_query());
		return $data;
	}

	
	function select_where_trash($table,$column,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		$ci->db->where('is_trash =', NULL);
		// $ci->db->or_where('is_trash =', '0');
		$data = $ci->db->get();
		// debugCode($data);
		return $data;
	}
	function select_threewhere($table,$column,$where,$column2,$where2, $column3, $where3){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		$ci->db->where($column2,$where2);
		$ci->db->where($column3,$where3);
		$data = $ci->db->get();
		return $data;
	}
	function select_multiwhere($table,$column,$where,$column2,$where2){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		$ci->db->where($column2,$where2);
		$data = $ci->db->get();
		return $data;
	}
	function select_multiwhere_limit($table,$column,$where,$column2,$where2,$limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		$ci->db->where($column2,$where2);
		$ci->db->limit($limit);
		$data = $ci->db->get();
		return $data;
	}

	function select_where_order($table,$column,$where,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
                $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get();
		return $data;
	}
    function select_where_limit_order($table,$column,$where,$limit,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		if($column != ""){
			$ci->db->where($column,$where);
		}
		
                $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get($table,$limit);
		return $data;
	}

	function select_where_array_limit_order($table,$array,$limit,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->where($array);
        $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get($table,$limit);
		return $data;
	}

	function select_where_offset_limit_order($table,$column,$where,$offset,$limit,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->where($column,$where);
        $ci->db->order_by($order_by, $order_type);
		$ci->db->limit($offset, $limit);
		$data = $ci->db->get($table);
		return $data;
	}


	function select_where_array($table,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($where);
		$data = $ci->db->get();
		return $data;
	}
	function select_where_array_order($table,$where,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($where);
		$ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get();
		return $data;
	}

	function insert_all($table,$data) {
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		if(!$ci->db->insert($table,$data))
			return FALSE;
		$data["id"] = $ci->db->insert_id();
		return (object)$data;
	}
	function insert_all_batch($table,$data) {
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		if(!$ci->db->insert_batch($table,$data))
			return FALSE;
		$data["id"] = $ci->db->insert_id();
		return (object)$data;
	}
	function update($table,$data,$column,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->where($column,$where);
		return $ci->db->update($table,$data); 
	}
	function update_one($table,$column,$where,$target,$action){
		$ci->db->set($target, $target.$action, FALSE);
		$ci->db->where($column, $where);
		return $ci->db->update($table);
	}
	function delete($table,$column,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->where($column,$where);
		return $ci->db->delete($table);
	}
	function delete_where_array($table,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->where($where);
		return $ci->db->delete($table);
	}
    function select_all_limit($table, $limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$data = $ci->db->get($table, $limit);
		return $data;
	}
        function select_all_limit_order($table, $limit, $order_by, $order){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
                $ci->db->order_by($order_by, $order);
		$data = $ci->db->get($table, $limit);
		return $data;
	}

    function select_all_order($table, $order_by, $order){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
        $ci->db->order_by($order_by, $order);
		$data = $ci->db->get();
		return $data->result();
	}
	function get_paging($table,$limit,$from,$order,$type) {
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->limit($limit,$from);
		$ci->db->order_by($order,$type);
		return $ci->db->get()->result();
	}
        
        function get_paging_where($table,$column,$where,$limit,$from,$order,$type) {
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->limit($limit,$from);
                $ci->db->where($column,$where);
		$ci->db->order_by($order,$type);
		return $ci->db->get()->result();
	}
        
        function select_all_limit_random($table, $limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
                $ci->db->order_by('id', 'RANDOM');
                $ci->db->limit($limit);
		$ci->db->from($table);
		$data = $ci->db->get();
		return $data->result();
	}
        
        function select_where_double_order($table,$column,$where,$column2,$where2,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
                $ci->db->where($column2,$where2);
                $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get();
		return $data;
	}