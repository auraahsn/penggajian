<?php 

class DataJabatan extends CI_Controller{
    public function index(){
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->PenggajianModel->getData('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
}
