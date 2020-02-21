<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Unit_kerja_model extends CI_Model {

    
    function getDataTables($status = '') {
        $this->load->library('Datatables');
        
        $aksi = '<div class="hidden-sm hidden-xs btn-group">';
//        if (has_permission('edit')) {
            $aksi .= '<a href="' . base_url("sistem/menu/update/$1") . '" class="btn btn-outline-info">'
                    . '<i class="ace-icon fa fa-pencil bigger-120"></i>'
                    . '</a>';
        
//        if (has_permission('delete')) {
            $aksi .= '<a href="javascript:void(0)" class="btn btn-outline-danger" onclick="hapus($1)">'
                    . '<i class="ace-icon fa fa-trash-o bigger-120"></i>'
                    . '</a>';
        
        $aksi .='</div>';
        
        $this->datatables->select("UnitKerjaId, UnitKerjaNama, UnitKerjaPimpinan, UnitKerjaNip, UnitKerjaAktif");
        $this->datatables->from("mst_unit_kerja");       
        $this->datatables->add_column('aksi', $aksi, 'UnitKerjaId');
        return $this->datatables->generate();
    }


    function getUnitKerja($key, $start, $limit) {        
        $sql = "
         SELECT uk.*, induk.UnitKerjaNama AS UnitKerjaInduk  
         FROM mst_unit_kerja uk
         LEFT JOIN mst_unit_kerja induk ON induk.UnitKerjaId=uk.UnitKerjaIndukId
         WHERE uk.UnitKerjaAktif = 1 AND uk.UnitKerjaNama LIKE '%$key%'
         ORDER BY uk.UnitKerjaNama
         LIMIT $start, $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    

    function countUnitKerja($key) {        
        $sql = "
         SELECT count(*) as total
         FROM mst_unit_kerja uk
         LEFT JOIN mst_unit_kerja induk ON induk.UnitKerjaId=uk.UnitKerjaIndukId
         WHERE uk.UnitKerjaAktif = 1 AND uk.UnitKerjaNama LIKE '%$key%' ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['total'];
    }
    
    function getDataById($unitKerjaId) {
        $sql = "
            SELECT *
            FROM mst_unit_kerja
            WHERE UnitKerjaId = ?";
        $query = $this->db->query($sql, array($unitKerjaId));
        $result = $query->result_array();
        return $result[0];
    }
    
    function getName($unitKerjaId) {
        $sql = "
         SELECT UnitKerjaNama
         FROM mst_unit_kerja          
         WHERE UnitKerjaId = ?";
        $query = $this->db->query($sql,  array($unitKerjaId));
        $result = $query->result_array();
        return $result[0]['UnitKerjaNama'];
    }
    
    function getCountUnitKerjaAktif() {
        $sql = "
         SELECT COUNT(UnitKerjaId) as total
         FROM mst_unit_kerja          
         WHERE UnitKerjaAktif = 1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['total'];
    }
    
    function getUnitKerjaAktif() {
        $sql = "
            SELECT *
            FROM mst_unit_kerja 
            WHERE UnitKerjaAktif = 1
            ORDER BY UnitKerjaNama ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function getUnitKerjaAnak($idUnitKerja) {
        $sql = "
            SELECT *
            FROM mst_unit_kerja_anak uka
            INNER JOIN mst_unit_kerja uk ON uk.UnitKerjaId=uka.UnitKerjaAnakId
            WHERE uka.UnitKerjaAnakId <> ? AND uka.UnitKerjaAnakId IN (SELECT UnitKerjaId FROM mst_unit_kerja WHERE UnitKerjaIndukId = ?)
            ORDER BY UnitKerjaNama ";
        $params = array($idUnitKerja, $idUnitKerja);
        $query = $this->db->query($sql, $params);
        return $query->result_array();
    }
    
    function add($data) {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->insert('mst_unit_kerja');
        $id = $this->db->insert_id();            
        $this->db->trans_complete();
        if($this->db->trans_status()) {
            $sql = "CALL sp_set_unit_kerja(?)";
            $query = $this->db->query($sql, array($id));
            $result = $query->result_array();
            return $result[0];
        } else {
            return FALSE;
        }
    }

    function update($data, $id) {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->where('UnitKerjaId', $id);
        $this->db->update('mst_unit_kerja');
        $this->db->trans_complete();
        if($this->db->trans_status()) {
            $sql = "CALL sp_set_unit_kerja(?)";
            $query = $this->db->query($sql, array($id));
            $result = $query->result_array();
            return $result[0];
        } else {
            return FALSE;
        }
    }

    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('mst_unit_kerja_anak', array('UnitKerjaAnakId' => $id));
        $this->db->delete('mst_unit_kerja_anak', array('UnitKerjaId' => $id));
        $this->db->delete('mst_unit_kerja', array('UnitKerjaId' => $id));        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    function getEmptyUnitKerja() {
       $uk['UnitKerjaId'] = NULL;
       $uk['UnitKerjaNama'] = NULL;
       $uk['UnitKerjaAktif'] = NULL;
       return $uk;
   }

}

/* 
 * End of file unit_kerja_model.php 
 * File location ./application/models/unit_kerja_model.php
 */