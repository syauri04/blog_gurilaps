<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Chain_model extends CI_Model {

        public function get_provinsi()
        {

            $this->db->order_by('name', 'asc');
            return $this->db->get('dc_provinces')->result();
        }

        public function get_kota()
        {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('name', 'asc');
            $this->db->join('dc_provinces', 'dc_regencies.province_id = dc_provinces.id');
            return $this->db->get('dc_regencies')->result();
        }

        public function get_kecamatan()
        {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('name', 'asc');
            $this->db->join('dc_regencies', 'dc_district.regency_id = dc_regencies.id');
            return $this->db->get('dc_district')->result();
        }

        public function get_kelurahan()
        {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('name', 'asc');
            $this->db->join('dc_district', 'dc_villages.district_id = dc_district.id');
            return $this->db->get('dc_villages')->result();
        }


        // untuk edit ambil dari id level paling bawah
        public function get_selected_by_id_kelurahan($id_kelurahan)
        {
            $this->db->where('id', $id_kelurahan);
            $this->db->join('dc_district', 'dc_villages.district_id = dc_district.id');            
            $this->db->join('dc_regencies', 'dc_villages.regency_id = dc_regencies.id');
            $this->db->join('dc_provinces', 'dc_villages.province_id = dc_provinces.id');
            return $this->db->get('dc_villages')->row();
        }

    }