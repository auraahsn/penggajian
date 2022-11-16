<?php

class GajiPegawai extends CI_Controller
{

    // agar mengaksesnya tidak menggunaakan url
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda belum login!</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
				</div>');
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Data Gaji";
        $nik = $this->session->userdata('nik'); 
        $data['gaji'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik,
                        data_jabatan.gaji_pokok,data_jabatan.tj_transport,data_jabatan.uang_makan,
                        data_kehadiran.alfa,data_kehadiran.bulan,data_kehadiran.id_kehadiran 
                        FROM data_pegawai
                        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik 
                        INNER JOIN data_jabatan ON data_jabatan.id_jabatan=data_pegawai.id_jabatan
                        WHERE data_kehadiran.nik = '$nik'
                        ORDER BY data_kehadiran.bulan DESC        
        
                        ")->result();
        // var_dump($data);
        // die();
        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dataGaji', $data);
        $this->load->view('templates_pegawai/footer');
    }
}
