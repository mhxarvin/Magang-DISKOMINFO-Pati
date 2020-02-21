<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index_model extends CI_Model {

    function getIndex($key, $start, $limit) {
        $this->db->select("*");
        $this->db->from("mst_index");
        $this->db->like('IndexName', $key);
        $this->db->or_like('IndexDescription', $key);
        $this->db->limit($limit, $start);
        $query = $this->db->get();       
//        print_r($this->db->last_query());
//        print_r($this->db->count_all_results());
        return $query->result_array();
    }

    function countIndex($key) {
        $this->db->select("count(*) as total", FALSE);
        $this->db->from("mst_index");
        $this->db->like('IndexName', $key);
        $this->db->or_like('IndexDescription', $key);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['total'];
    }
    
    function getDataTables($status = '', $aksi = '') {
        $this->load->library('Datatables');       
        
        $this->datatables->select("IndexId, IndexName, IndexDescription");
        $this->datatables->from("mst_index");        
        $this->datatables->add_column('aksi', $aksi, 'IndexId');
        return $this->datatables->generate();
    }
    
    function getById($id) {
        $query = $this->db->get_where('mst_index', array('IndexId' => $id));
        $result = $query->result_array();
        return $result[0];
    }
    
    function getAll() {
        $query = $this->db->get('mst_index');
        return $query->result_array();
    }
    
    function findByName($key) {
        $this->db->select("IndexId AS id, IndexNama AS `value`, IndexSatuan AS info", FALSE);
        $this->db->from("mst_index");
        $this->db->like("IndexNama", $key);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function add($data) {
        $this->db->set($data);
        $this->db->insert('mst_index');
        return $this->db->insert_id();
    }
    
    function update($data, $id) {
        $this->db->set($data); 
        $this->db->where('IndexId', $id);
        $this->db->update('mst_index');
        return $this->db->affected_rows();
    }
    
    function delete($id) {
        $this->db->delete('mst_index', array('IndexId' => $id));
        return $this->db->affected_rows();
    }
    
    function getEmptyIndex() {
       $index['IndexId'] = NULL;
       $index['IndexName'] = NULL;
       $index['IndexDescription'] = NULL;
       return $index;
   }

}

/* 
 * End of file index_model.php 
 * File location ./application/models/index_model.php
 */