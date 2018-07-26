<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_unit extends CI_Model {
     public function __construct() {
        parent::__construct();
    }

    function get_search($search){
		$this->db->select($this->tbl_unit.'.*,'.$this->tbl_condition.'.title as condition,'.$this->tbl_category_unit.'.title as category,'.$this->tbl_brand.'.title as brand,'.$this->tbl_transaction.'.title as transaction');
        $this->db->from($this->tbl_unit);
        $this->db->join($this->tbl_category_unit,$this->tbl_unit.'.id_category = '.$this->tbl_category_unit.'.id');
        $this->db->join($this->tbl_condition,$this->tbl_unit.'.id_condition = '.$this->tbl_condition.'.id');
        $this->db->join($this->tbl_brand,$this->tbl_unit.'.id_brand = '.$this->tbl_brand.'.id');
        $this->db->join($this->tbl_transaction,$this->tbl_unit.'.id_transaction = '.$this->tbl_transaction.'.id');
       	$this->db->like($this->tbl_unit.'.title', $search);
		$this->db->or_like($this->tbl_category_unit.'.title', $search); 
		$this->db->or_like($this->tbl_condition.'.title', $search); 
		$this->db->or_like($this->tbl_brand.'.title', $search); 
		$this->db->or_like($this->tbl_transaction.'.title', $search); 
        $this->db->order_by($this->tbl_unit.'.id','DESC');
        $data=$this->db->get();
        return $data;
	}
	

}