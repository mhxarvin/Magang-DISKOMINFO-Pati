<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends YK_Controller {
    
    function index() {                
        $this->load_view('sistem/auth');        
    }
    
    function search() {
        $this->load->model('group_model');
        
        $status = $this->input->post('status');
//        if (has_permission('pengguna-delete')) {
        $aksi = '<div class="hidden-lg hidden-lg btn-group">'
                    . '<a href="' . base_url("sistem/auth/update/$1") . '" class="btn btn-outline-primary">'
                    . '<i class=" fa fa-unlock-alt" "></i>'
                    . '</a>'
                . '</div>';
        echo $this->group_model->getDataTables($status, $aksi);        
    }
            
    function update($groupId) {                
        $this->load->model('menu_model');
        $this->load->model('group_model');
        
        $data['data'] = $this->menu_model->getAuthenticationMenu($groupId);
        $data['sub'] = 'update';
        $data['groupId'] = $groupId;
        $data['group'] = $this->group_model->getById($groupId);
        
        $this->load_view('sistem/auth_form', $data);        
    }
}

/*
 * End of File: Group.php
 * File Location : ./controllers/sistem/Group.php
 */
