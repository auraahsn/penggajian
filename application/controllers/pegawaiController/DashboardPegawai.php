<?php

class DashboardPegawai extends CI_Controller
{

    // agar mengaksesnya tidak menggunaakan url
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('hak_akses') !='2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda belum login!</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
				</div>');
				redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "DashboardPegawai";
        $id=$this->session->userdata('id_pegawai');
        $data['pegawai'] = $this->db->query("SELECT*FROM data_pegawai WHERE id_pegawai='$id'")->result();
        // var_dump($data);
        // die();
        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dashboardpegawai', $data);
        $this->load->view('templates_pegawai/footer');
    }
}
