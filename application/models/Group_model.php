<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_Model {

    function getGroup($key, $start, $limit) {
        $this->db->select("*");
        $this->db->from("yk_group");
        $this->db->like('GroupBidang', $key);
        $this->db->or_like('GroupJabatan', $key);
        $this->db->limit($limit, $start);
        $query = $this->db->get();       
//        print_r($this->db->last_query());
//        print_r($this->db->count_all_results());
        return $query->result_array();
    }

    function countGroup($key) {
        $this->db->select("count(*) as total", FALSE);
        $this->db->from("yk_group");
        $this->db->like('GroupBidang', $key);
        $this->db->or_like('GroupJabatan', $key);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['total'];
    }
    
    function getDataTables($status = '', $aksi = '') {
        $this->load->library('Datatables');       
        
        $this->datatables->select("GroupId, GroupBidang, GroupJabatan");
        $this->datatables->from("yk_group");        
        $this->datatables->add_column('aksi', $aksi, 'GroupId');
        return $this->datatables->generate();
    }
    
    function getById($id) {
        $query = $this->db->get_where('yk_group', array('GroupId' => $id));
        $result = $query->result_array();
        return $result[0];
    }
    
    function getAll() {
        $query = $this->db->get('yk_group');
        return $query->result_array();
    }
    
    function add($data) {
        $this->db->set($data);
        $this->db->insert('yk_group');
        return $this->db->insert_id();
    }
    
    function update($data, $id) {
        $this->db->set($data); 
        $this->db->where('GroupId', $id);
        $this->db->update('yk_group');
        return $this->db->affected_rows();
    }
    
    function delete($id) {
        $this->db->delete('yk_group', array('GroupId' => $id));
        return $this->db->affected_rows();
    }
    
    function getEmptyGroup() {
       $group['GroupId'] = NULL;
       $group['GroupBidang'] = NULL;
       $group['GroupJabatan'] = NULL;
       return $group;
   }

}

/* 
 * End of file group_model.php 
 * File location ./application/models/group_model.php
 */