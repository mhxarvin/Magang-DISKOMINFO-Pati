<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_do extends YK_Controller {
    var $rules = array(
        array(
            'field' => 'MenuName',
            'label' => 'Nama Menu',
            'rules' => 'trim|required|is_unique[yk_menu.MenuName]'
        ),
        array(
            'field' => 'MenuModule',
            'label' => 'Nama Module',
            'rules' => 'trim'
        ),
        array(
            'field' => 'is_child',
            'label' => 'Sub Menu',
            'rules' => 'callback_checkStatus'
        ),
        array(
            'field' => 'MenuParentId',
            'label' => 'Menu Induk',
            'rules' => 'required'
        ),
        array(
            'field' => 'index',
            'label' => 'Index',
            'rules' => 'trim'
        ),
        array(
            'field' => 'search',
            'label' => 'Search',
            'rules' => 'trim'
        ),
        array(
            'field' => 'add',
            'label' => 'Add',
            'rules' => 'trim'
        ),
        array(
            'field' => 'update',
            'label' => 'Update',
            'rules' => 'trim'
        ),
        array(
            'field' => 'delete',
            'label' => 'Delete',
            'rules' => 'trim'
        ),
        array(
            'field' => 'detail',
            'label' => 'Detail',
            'rules' => 'trim'
        ),
        array(
            'field' => 'print',
            'label' => 'Print',
            'rules' => 'trim'
        ), 
        array(
            'field' => 'export',
            'label' => 'Export',
            'rules' => 'trim'
        ),       
        array(
            'field' => 'MenuOrder',
            'label' => 'Urutan',
            'rules' => 'trim'
        ),
        array(
            'field' => 'MenuIsShow',
            'label' => 'Tampilkan',
            'rules' => 'trim'
        )
    );
    
    function checkStatus($status) {
        if($status == 1 && $_POST['MenuParentId'] == '0') {
            $this->form_validation->set_message("checkStatus", "Untuk status %s harus pilih <b>Parent Menu</b> terlebih dahulu.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function add() {        
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdapat dalam database.');
        $this->form_validation->set_error_delimiters('<br>&bigodot; ', '');
        
        if($_POST['is_child'] == 1 && $_POST['MenuParentId'] == 0) {
            $parentId= -1;
        } elseif($_POST['is_child'] == 0) {
            $parentId = 0;
        } else {
            $parentId = $_POST['MenuParentId'];
        }
        $data = array(
            'MenuId' => NULL,
            'MenuParentId' => $parentId,
            'MenuName' => $_POST['MenuName'],
            'MenuModule' => empty($_POST['MenuModule']) ? NULL : $_POST['MenuModule'],
            'MenuIcon' => $_POST['MenuIcon'],
            'MenuIsShow' => $_POST['MenuIsShow'],
            'MenuOrder' => $_POST['MenuOrder']
        );
        $aksi = array(
            'index' => isset($_POST['index']) ? 1 : 0,
            'search' => isset($_POST['search']) ? 1 : 0,
            'add' => isset($_POST['add']) ? 1 : 0,
            'update' => isset($_POST['update']) ? 1 : 0,
            'delete' => isset($_POST['delete']) ? 1 : 0,
            'detail' => isset($_POST['detail']) ? 1 : 0,
            'print' => isset($_POST['print']) ? 1 : 0,
            'export' => isset($_POST['export']) ? 1 : 0
        );
        if($this->form_validation->run() == FALSE) {
            echo json_encode(array('success'=>FALSE, 'msg'=> validation_errors()));
        } else {            
            $this->load->model('menu_model');            
            $result = $this->menu_model->add($data, $aksi);
            if($result) {                
                $this->session->set_flashdata(array('added' => true, 'msg' => 'Menu baru berhasil ditambahkan!'));
                echo json_encode(array('success' => TRUE, 'msg'=>'Penambahan data berhasil.'));
            } else {
                echo json_encode(array('success' => FALSE, 'msg'=>'Penambahan data gagal.'));
            }
        }        
    }
    
    function update() {
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_rules('MenuId', 'Menu Id', 'required');
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdapat dalam database.');
        $this->form_validation->set_error_delimiters('<br>&bigodot; ', '');
        
        if($_POST['is_child'] == 1 && $_POST['MenuParentId'] == 0) {
            $parentId= -1;
        } elseif($_POST['is_child'] == 0) {
            $parentId = 0;
        } else {
            $parentId = $_POST['MenuParentId'];
        }
        $data = array(
            'MenuParentId' => $parentId,
            'MenuName' => $_POST['MenuName'],
            'MenuModule' => $_POST['MenuModule'],
            'MenuIcon' => $_POST['MenuIcon'],
            'MenuIsShow' => $_POST['MenuIsShow'],
            'MenuOrder' => $_POST['MenuOrder']
        );
        $aksi = array(
            'index' => isset($_POST['index']) ? 1 : 0,
            'search' => isset($_POST['search']) ? 1 : 0,
            'add' => isset($_POST['add']) ? 1 : 0,
            'update' => isset($_POST['update']) ? 1 : 0,
            'delete' => isset($_POST['delete']) ? 1 : 0,
            'detail' => isset($_POST['detail']) ? 1 : 0,
            'print' => isset($_POST['print']) ? 1 : 0,
            'export' => isset($_POST['export']) ? 1 : 0
        );
        if($this->form_validation->run() == FALSE) {
            echo json_encode(array('success'=>FALSE, 'msg'=> validation_errors()));
        } else {                        
            $this->load->model('menu_model');            
            $result = $this->menu_model->update($data, $aksi, $_POST['MenuId']);
            if($result) {                
                $this->session->set_flashdata(array('added' => true, 'msg' => 'Menu berhasil ditambahkan!'));
                echo json_encode(array('success' => TRUE, 'msg'=>'Penambahan data berhasil.'));
            } else {
                echo json_encode(array('success' => FALSE, 'msg'=>'Pengubahan data gagal.'));
            }
        }        
    }
    
    function delete() {
        $this->load->model('menu_model');
        $result = $this->menu_model->delete($_POST["id"]);
        if($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }

}

/* 
 * End of file menu_do.php 
 * File location ./application/controllers/sistem/menu_do.php
 */