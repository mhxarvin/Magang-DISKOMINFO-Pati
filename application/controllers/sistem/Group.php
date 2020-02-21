<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends YK_Controller {
    
    function index() {               
        //echo "grup"; 
        $this->load_view('sistem/group');        
    }
    
    function search() {
        $this->load->model('group_model');
        
        $aksi = '<div class="hidden-sm hidden-lg btn-group">';
//        if (has_permission('update')) {
            $aksi .= '<a href="' . base_url("sistem/group/update/$1") . '" class="btn btn-outline-info">'
                    . '<i class="ace-icon fa fa-pencil bigger-120"></i>'
                    . '</a>';
        
//        if (has_permission('delete')) {
            $aksi .= '<a href="javascript:;" class="btn btn-outline-danger" onclick="hapus($1)">'
                    . '<i class="ace-icon fa fa-trash-o bigger-120"></i>'
                    . '</a>';
        
        $aksi .='</div>';
        
        $status = $this->input->post('status');
        echo $this->group_model->getDataTables($status, $aksi);        
    }
    
    function add() {                
        $this->load->model('group_model');
        
        $data['group'] = $this->group_model->getEmptyGroup();
        $data['sub'] = 'add';
        $this->load_view('sistem/group_form', $data);        
    }
    
    function update($id) {                
        $this->load->model('group_model');
        
        $data['group'] = $this->group_model->getById($id);
        $data['sub'] = 'update';
        $this->load_view('sistem/group_form', $data);        
    }
}

/*
 * End of File: Group.php
 * File Location : ./controllers/sistem/Group.php
 */
