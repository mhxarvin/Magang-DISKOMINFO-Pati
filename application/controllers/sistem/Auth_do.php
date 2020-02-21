<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_do extends YK_Controller {

    function update() {        
        $this->load->model('authentication_model');
        $this->load->library('session');
        $auth = array();
        for($i=0;$i<$_POST['total'];$i++) {
            array_push($auth, array("menuid" => $_POST['MenuId'.$i], 
                "index" => isset($_POST['index'.$i]) ? $_POST['index'.$i] : FALSE, 
                "search" => isset($_POST['search'.$i]) ? $_POST['search'.$i] : FALSE, 
                "add" => isset($_POST['add'.$i]) ? $_POST['add'.$i] : FALSE, 
                "update" => isset($_POST['update'.$i]) ? $_POST['update'.$i] : FALSE, 
                "delete" => isset($_POST['delete'.$i]) ? $_POST['delete'.$i] : FALSE, 
                "detail" => isset($_POST['detail'.$i]) ? $_POST['detail'.$i] : FALSE,
                "print" => isset($_POST['print'.$i]) ? $_POST['print'.$i] : FALSE,
                "export" => isset($_POST['export'.$i]) ? $_POST['export'.$i] : FALSE));
        }
        $result = $this->authentication_model->update($_POST['GroupId'], $auth);
        if($result) {            
            echo json_encode(array('success' => TRUE, 'msg'=>'Hak Akses Group berhasil diubah.'));
        } else {
            echo json_encode(array('success' => FALSE, 'msg'=>'<b>Kesalahan Database.</b><br/>Pengaturan Hak Akses Gagal!'));
        }        
    }
}

/* 
 * End of file authentikasi_do.php 
 * File location ./application/controllers/system/authentikasi_do.php
 */