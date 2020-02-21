<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends YK_Controller {


    public function index() {
//        $this->load_view_frontend('frontend/home'); 
        $this->load->view('login'); 
    }

    public function berita($query="", $page = 0) {
        $this->load->library('pagination');
        $this->load->model('berita_model');
        $limitView = 5;
        $page = ($page*1) < 1 ? 0 : ($page*1);
        $isiBerita = '';
        if (!empty($_POST['value'])) {
            $isiBerita = $_POST['value'];
            $key = $isiBerita;
        } elseif (!empty($query)) {
            $arrData = explode("--", $query);
            $isiBerita = $arrData[0];
            $key = $isiBerita;
            
        } else {
            $data['value'] = "";
            $key = "";
        }

        $data['beritaCari'] = $isiBerita;
        $data['total'] = $this->berita_model->countBeritaFo();
        $data['rows'] = $this->berita_model->getBeritaFo($page, $limitView);
        $data['page'] = $page;
       
        $config['base_url'] = base_url()."/main/berita/index/";
        $config['first_url'] = base_url()."/main/berita/index/?key=$key";
        $config['total_rows'] = $data['total'];
        $config['per_page'] = $limitView;
        $config['cur_page'] = $page;
        $config['suffix'] = "?key=".$key;
        $this->pagination->initialize($config);        
        
        $data['added'] = false;
        $this->load->library('session');
        if($this->session->flashdata('added') != '') {
            $data['added'] = true;
            $data['message'] = $this->session->flashdata('message'); 
        } 
        
       $this->load_view_frontend('frontend/berita', $data); 
    }

    function berita_detail($id){
        $this->load->model('berita_model');

        $data['berita'] = $this->berita_model->getById($id);
        //print_r($data);
        $this->load_view_frontend('frontend/berita_detail',  $data);
    }


    public function pengumuman($query="", $page = 0) {
        $this->load->library('pagination');
        $this->load->model('pengumuman_model');
        $limitView = 3;
        $page = ($page*1) < 1 ? 0 : ($page*1);
        $isiPengumuman = '';
        if (!empty($_POST['value'])) {
            $isiPengumuman = $_POST['value'];
            $key = $isiPengumuman;
        } elseif (!empty($query)) {
            $arrData = explode("--", $query);
            $isiPengumuman = $arrData[0];
            $key = $isiPengumuman;
            
        } else {
            $data['value'] = "";
            $key = "";
        }

        $data['pengumumanCari'] = $isiPengumuman;
        $data['total'] = $this->pengumuman_model->countPengumumanFo();
        $data['rows'] = $this->pengumuman_model->getPengumumanFo($page, $limitView);
        $data['page'] = $page;
       
        $config['base_url'] = base_url()."/main/pengumuman/index/";
        $config['first_url'] = base_url()."/main/pengumuman/index/?key=$key";
        $config['total_rows'] = $data['total'];
        $config['per_page'] = $limitView;
        $config['cur_page'] = $page;
        $config['suffix'] = "?key=".$key;
        $this->pagination->initialize($config);        
        
        $data['added'] = false;
        $this->load->library('session');
        if($this->session->flashdata('added') != '') {
            $data['added'] = true;
            $data['message'] = $this->session->flashdata('message'); 
        } 
        
       $this->load_view_frontend('frontend/pengumuman', $data); 
    }

    function pengumuman_detail($id){
        $this->load->model('pengumuman_model');

        $data['pengumuman'] = $this->pengumuman_model->getById($id);
        //print_r($data);
        $this->load_view_frontend('frontend/pengumuman_detail',  $data);
    }

    public function login() {
        $this->load->view('login'); 
    }

    function download(){
        $this->load->model('download_model');

        $data['download'] = $this->download_model->getAll();
        //print_r($data);
        $this->load_view_frontend('frontend/download',  $data);
    }

    function sibaper(){
        $this->load->model('sibaper_fo_model');

        $data['periode'] = $this->sibaper_fo_model->getPeriode();
        //print_r($data);
        $this->load_view_frontend('frontend/periode',  $data);
    }

    function periode_desa($id){
        $this->load->model('sibaper_fo_model');
        $data['periode'] = $this->sibaper_fo_model->getPeriodeById($id);
        $data['periode_desa'] = $this->sibaper_fo_model->getPeriodeDesa($id);
        //print_r($data);
        $this->load_view_frontend('frontend/periode_desa',  $data);
    }

    function dashboard($id){
        $this->load->model('sibaper_fo_model');
        $data['jmlPendaftar'] = $this->sibaper_fo_model->getJmlPendaftar($id);
        $data['jmlLolosVerif'] = $this->sibaper_fo_model->getJmlLolosVerif($id);
        $data['jmlCalon'] = $this->sibaper_fo_model->getCalon($id);
        $data['dpt'] = $this->sibaper_fo_model->getJmlDpt($id);
        $data['hasilSuara'] = $this->sibaper_fo_model->getHasilSuara($id);
        $data['desa'] = $this->sibaper_fo_model->getDesaById($id);
        //print_r($data['hasilSuara']);
        $this->load_view_frontend('frontend/dashboard',  $data);
    }



}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */