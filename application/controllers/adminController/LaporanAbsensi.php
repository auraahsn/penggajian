<?php

class LaporanAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Laporan Absensi Pegawai";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterLaporanAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }
    public function cetakLaporanAbsensi()
    {
        $data['title'] = "Cetak Laporan Absensi Pegawai";

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulanTahun = $bulan . $tahun;

        // if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        //     $bulan = $_GET['bulan'];
        //     $tahun = $_GET['tahun'];
        //     $bulanTahun = $bulan . $tahun;
        // } else {
        //     $bulan = date('m');
        //     $tahun = date('Y');
        //     $bulanTahun = $bulan . $tahun;
        // }

        $data['cetak_kehadiran'] = $this->db->query("SELECT * 
        FROM data_kehadiran
        WHERE bulan = '$bulanTahun'
        ORDER BY nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetakLaporanAbsensi', $data);
    }
}
