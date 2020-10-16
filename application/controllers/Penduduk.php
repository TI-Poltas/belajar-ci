<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model'); //memangggil file Model, sesuaikan nama file di folder Models
    }

    public function index() 
    {
        $data['penduduk'] = $this->Penduduk_model->get_penduduk();
        $this->load->view('templates/header');  //sesuaikan dengan file pada folder views
        $this->load->view('penduduk/index', $data);  //lihat line 14 $data = penduduk
        $this->load->view('templates/footer');  //sesuaikan dengan file pada folder views
    }

    public function form()
    {
        $this->load->view('templates/header');  //sesuaikan dengan file pada folder views
        $this->load->view('penduduk/form');  //sesuaikan dengan file pada folder views
        $this->load->view('templates/footer');  //sesuaikan dengan file pada folder views
    }

    public function get_detail()
    {
        $nik = $_POST['nik'];
        $result = $this->Penduduk_model->get_penduduk_nik($nik);
        if ($result->num_rows() > 0) {
            echo json_encode($result->row());
        } else {
            echo "Data Was Not Found";
        }
    }
    function post_data()
    {
        if(!session_id()) session_start();
        if($this->Penduduk_model->create_data($this->input->post(), $_FILES) > 0){
            $_SESSION['flash'] = ['Sukses','Data Berhasil Disimpan','success'];
        }else{
            $_SESSION['flash'] = ['Gagal','Data Gagal Disimpan','error'];
        }
        redirect('penduduk/index');
    }
    public function hapus_penduduk()
    {
        if(!session_id()) session_start();
        if($this->Penduduk_model->delete_data($this->uri->segment(3)) > 0){
            $_SESSION['flash'] = ['Sukses','Data Berhasil Dihapus','success'];
        }else{
            $_SESSION['flash'] = ['Gagal','Data Gagal Dihapus','error'];
        }
        redirect('penduduk/index');
    }
}
