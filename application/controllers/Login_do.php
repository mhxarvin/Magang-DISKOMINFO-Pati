<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_do extends CI_Controller {

    public function login() {
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_validate');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('success' => FALSE, 'msg' => validation_errors()));
        } else {
            echo json_encode(array('success' => TRUE, 'msg' => 'Anda berhasil login, tunggu sejenak!'));
        }
    }

    public function validate($username) {
        $this->load->model('authentication_model');
        $expired = $this->authentication_model->isExpired($username);
        if($expired) {
            $this->form_validation->set_message("validate", "{field} <b>$username</b> sudah tidak berlaku lagi.");
            return FALSE;
        }
        
        $data = $this->authentication_model->getUserByUserPassword($_POST['username'], sha1($_POST['password']));
        if (sizeof($data) > 0) {            
            // $_SESSION['persediaan']['ta'] = $_POST['tahun'];
            $_SESSION['persediaan']['userid'] = $data['UserId'];
            $_SESSION['persediaan']['username'] = $data['UserName'];
            $_SESSION['persediaan']['groupid'] = $data['UserGroupGroupId'];
            $_SESSION['persediaan']['realname'] = $data['UserRealName'];
            $_SESSION['persediaan']['unitkerjaid'] = $data['UserUnitKerjaId'];
            $_SESSION['persediaan']['unitkerjanama'] = $data['UnitKerjaNama'];
            return TRUE;


        } else {
            $this->form_validation->set_message("validate", "Nama Pengguna atau Kata Sandi salah.");
            return FALSE;
        }
        
    }

    function logout() {
//        session_destroy();
        $this->session->sess_destroy();
        redirect('/');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */