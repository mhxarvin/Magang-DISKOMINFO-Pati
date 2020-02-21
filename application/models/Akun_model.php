<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akun_model extends CI_Model {

    function getAkun($key, $start, $limit) {
        $this->db->select("*");
        $this->db->from("mst_rekening");
        $this->db->like('AkunTa', $key);
        $this->db->limit($limit, $start);
        $query = $this->db->get();       
//        print_r($this->db->last_query());
//        print_r($this->db->count_all_results());
        return $query->result_array();
    }

    function countAkun($key) {
        $this->db->select("count(*) as total", FALSE);
        $this->db->from("mst_akun");
        $this->db->like('AkunTa', $key);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['total'];
    }
	
    function getDataTables($status = '', $aksi = '') {
        $this->load->library('Datatables');       
        
        $this->datatables->select("*");
        $this->datatables->from("mst_rekening");        
        $this->datatables->add_column('aksi', $aksi, 'AkunId');
        return $this->datatables->generate();
    }
    
    function getById($id) {
        $query = $this->db->get_where('mst_akun', array('AkunId' => $id));
        $result = $query->result_array();
        return $result[0];
    }
    
    function getAll() {
        $query = $this->db->get('mst_rekening');
        return $query->result_array();
    }
    
    function getAkunLevel() {
        $query = $this->db->get('mst_akun_level');
        return $query->result_array();
    }
    
    function add($data) {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->insert('mst_akun');
        $id = $this->db->insert_id();
        $this->db->trans_complete();                
        if($this->db->trans_status()) {
            return $id;
        } else {
            return 0;
        }
    }
    
    function update($data, $id) {
        $this->db->trans_start();
        $this->db->set($data); 
        $this->db->where('AkunId', $id);
        $this->db->update('mst_akun');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('mst_akun', array('AkunId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    function getEmptyAkun() {
        $akun['AkunId'] = NULL;
        $akun['AkunTa'] = $_SESSION['keudes']['tahunanggaran'];
        $akun['AkunLevelId'] = NULL;
        $akun['AkunKode'] = NULL;
        $akun['AkunNama'] = NULL;
        $akun['AkunIndukId'] = NULL;
        return $akun;
    }

}

/* 
 * End of file Akun_model.php 
 * File location ./application/models/$folder/Akun_model.php
 */
