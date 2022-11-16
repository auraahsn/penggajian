<?php

class DataGaji extends CI_Controller
{
    
    // agar mengaksesnya tidak menggunaakan url
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('hak_akses') !='1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda belum login!</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
				</div>');
				redirect('welcome');
        }
    }
    
    public function index()
    {
        $data['title'] = "Data Gaji Pegawai";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        // $where = array(
        //     'bulan' => $bulanTahun
        // );
        // $this->PenggajianModel->get_where($bulanTahun);
        // $this->db->join('data_jabatan', 'data_jabatan.id_jabatan = data_pegawai.id_jabatan');
        // $data['gaji'] = $this->PenggajianModel->getData('data_pegawai')->result();

        // $data['gaji'] = $this->PenggajianModel->getData('data_pegawai')->get_where('data_kehadiran', $where)->result();


        // $data['gaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai,
        // data_pegawai.jenis_kelamin, data_jabatan.nama_jabatan,  
        // data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan
        // FROM data_pegawai 
        // INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        // INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.id_jabatan
        // WHERE data_kehadiran.bulan = '$bulanTahun'
        // ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $data['potongan'] = $this->PenggajianModel->getData('pot_gaji')->result();

        $data['gaji'] = $this->db->query("SELECT data_pegawai.*, 
        data_jabatan.*, data_kehadiran.alfa
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.id_jabatan=data_pegawai.id_jabatan
        WHERE data_kehadiran.bulan = '$bulanTahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakGaji()
    {
        $data['title'] = "Cetak Data Gaji Pegawai";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['potongan'] = $this->PenggajianModel->getData('pot_gaji')->result();

        $data['cetak_gaji'] = $this->db->query("SELECT data_pegawai.*, 
        data_jabatan.*, data_kehadiran.alfa
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.id_jabatan=data_pegawai.id_jabatan
        WHERE data_kehadiran.bulan = '$bulanTahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetakDataGaji', $data);
    }
}
