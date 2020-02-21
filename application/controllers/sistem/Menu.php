<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends YK_Controller {
    
    function index() {                
        $this->load_view('sistem/menu');        
    }
    
    function search() {
        $this->load->model('menu_model');
        
        $status = $this->input->post('status');
        echo $this->menu_model->getDataTables($status);        
    }
    
    function add() {                
        $this->load->model('menu_model');
        
        $data['parents'] = $this->menu_model->getVisibleMenu();
        $data['menu'] = $this->menu_model->getEmptyMenu();
        $data['aksi'] = $this->menu_model->getEmptyMenuAksi();
        $data['sub'] = 'add';
        $this->load_view('sistem/menu_form', $data);        
    }
    
    function update($id) {                
        $this->load->model('menu_model');
        
        $data['parents'] = $this->menu_model->getVisibleMenu();
        $data['menu'] = $this->menu_model->getById($id);
        $data['aksi'] = $this->menu_model->getMenuAksi($id);
        $data['sub'] = 'update';
        $this->load_view('sistem/menu_form', $data);        
    }
}

/*
 * End of File: Menu.php
 * File Location : ./controllers/sistem/Menu.php
 */
