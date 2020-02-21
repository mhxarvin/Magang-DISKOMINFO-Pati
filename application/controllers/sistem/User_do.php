<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_do extends YK_Controller {
    var $rules = array(
        array(
            'field' => 'UserUnitKerjaId',
            'label' => 'Unit Kerja',
            'rules' => 'trim'
        ),
        array(
            'field' => 'UserNip',
            'label' => 'NIP',
            'rules' => 'trim'
        ),
        array(
            'field' => 'UserRealName',
            'label' => 'Nama Lengkap',
            'rules' => 'trim'
        ),
        array(
            'field' => 'UserName',
            'label' => 'Username',
            'rules' => 'required|is_unique[yk_user.UserName]'
        ),
        array(
            'field' => 'UserPassword',
            'label' => 'Password',
            'rules' => 'trim'
        ),
        array(
            'field' => 'UlangPassword',
            'label' => 'Ulang Password',
            'rules' => 'matches[UserPassword]'
        ),
        array(
            'field' => 'UserActive',
            'label' => 'Active',
            'rules' => 'trim'
        ),
	    array(
            'field' => 'UserHp',
            'label' => 'Nomor HP',
            'rules' => 'trim'
        ),
	    array(
            'field' => 'UserEmail',
            'label' => 'e-mail',
            'rules' => 'valid_email'
        ),
	    array(
            'field' => 'UserFoto',
            'label' => 'Foto',
            'rules' => 'trim'
        ),
	    array(
            'field' => 'UserExpired',
            'label' => 'Masa Berlaku',
            'rules' => 'trim'
        ),
	    array(
            'field' => 'UserLastLogin',
            'label' => 'Login Terakhir',
            'rules' => 'trim'
        ),
	    array(
            'field' => 'UserNote',
            'label' => 'Keterangan',
            'rules' => 'trim'
        ),
	    array(
            'field' => 'groups[]',
            'label' => 'Group',
            'rules' => 'required'
        )
    );
    
    function add() {        
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_message('matches', 'Ulangi password dengan benar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg'=> validation_errors()));
        } else {            
            $this->load->model('user_model');
            $this->load->helper('tanggal');
            
            $data = array(	
                'UserUnitKerjaId' => empty($_POST['UserUnitKerjaId']) ? NULL : $_POST['UserUnitKerjaId'],                            
                'UserNip' => $_POST['UserNip'],                            
                'UserRealName' => $_POST['UserRealName'],                            
                'UserName' => $_POST['UserName'],                            
                'UserPassword' => $_POST['UserPassword'],                            
                'UserActive' => empty($_POST['UserActive']) ? 0 : 1,
                'UserHp' => $_POST['UserHp'],                            
                'UserEmail' => $_POST['UserEmail'],                            
//                'UserFoto' => $_POST['UserFoto'],                            
                'UserExpired' => convertMysqlDate($_POST['UserExpired']),                            
//                'UserLastLogin' => $_POST['UserLastLogin'],                            
                'UserNote' => $_POST['UserNote']
            );            
            $result = $this->user_model->add($data, $_POST['groups']);
            if ($result) {
                $this->load->library('session');
                $this->session->set_flashdata(array('added' => true, 'msg' => 'User baru berhasil ditambahkan!'));
                echo json_encode(array('success' => true, 'msg'=> 'User Baru Berhasil Disimpan.'));
            } else {
                echo json_encode(array('success' => false, 'msg'=> 'User Baru Gagal Disimpan!'));
            }
        }                
    }
    
    function update() {        
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_rules("UserId", "Id User", "required");
        $this->form_validation->set_message('required', 'Field %s harus diisi.');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar.');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => false, 'msg'=> validation_errors()));
        } else {            
            $this->load->model('user_model');
            $this->load->helper('tanggal');
            
            $data = array(				
                'UserUnitKerjaId' => empty($_POST['UserUnitKerjaId']) ? NULL : $_POST['UserUnitKerjaId'],                                           
                //'UserNip' => $_POST['UserNip'],                            
                'UserRealName' => $_POST['UserRealName'],                            
                'UserName' => $_POST['UserName'],                            
                'UserPassword' => $_POST['UserPassword'],                            
                'UserActive' => empty($_POST['UserActive']) ? 0 : 1,
                //'UserHp' => $_POST['UserHp'],                            
                'UserEmail' => $_POST['UserEmail'],                            
//                'UserFoto' => $_POST['UserFoto'],                            
                'UserExpired' => convertMysqlDate($_POST['UserExpired']),
//                'UserLastLogin' => $_POST['UserLastLogin'],                            
                'UserNote' => $_POST['UserNote']
            );
            $result = $this->user_model->update($data, $_POST['groups'], $_POST['UserId']);
            if ($result) {
                $this->load->library('session');
                $this->session->set_flashdata(array('added' => true, 'msg' => 'User berhasil diupdate!'));
                echo json_encode(array('success' => true, 'msg'=> 'User Berhasil Diupdate.'));
            } else {
                echo json_encode(array('success' => false, 'msg'=> 'User Gagal Diupdate!'));
            }
        }                
    }
    
    public function delete() {
        $this->load->model('user_model');
        
        $result = $this->user_model->delete($_POST['id']);        
        if ($result) {
            echo json_encode(array('success' => true, 'msg'=> 'User berhasil dihapus!'));
        } else {
            echo json_encode(array('success' => false, 'msg'=> 'User Gagal Dihapus!'));
        }
    }

}

/* 
 * End of file User_do.php 
 * File location ./application/controllers/sistem/User_do.php
 */