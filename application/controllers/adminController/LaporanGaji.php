<?php

class LaporanGaji extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Laporan Gaji Pegawai";

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

        $data['gaji'] = $this->db->query("SELECT data_pegawai.*, 
        data_jabatan.*, data_kehadiran.alfa
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.id_jabatan=data_pegawai.id_jabatan
        WHERE data_kehadiran.bulan = '$bulanTahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterLaporanGaji', $data);
        $this->load->view('templates_admin/footer');
    }
    public function cetakLaporanGaji()
    {
        $data['title'] = "Cetak Laporan Gaji Pegawai";

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulanTahun = $bulan . $tahun;

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
