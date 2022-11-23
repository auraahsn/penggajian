<?php

class AbsensiPegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Absensi";
        $nik = $this->session->userdata('nik');

        // $data['absensi'] = $this->PenggajianModel->getData('absensi_pegawai')->result();
        $data['absensi'] = $this->db->query("SELECT absensi_pegawai.*
        FROM absensi_pegawai 
        INNER JOIN data_pegawai ON data_pegawai.nama_pegawai=absensi_pegawai.nama
        WHERE data_pegawai.nik= '$nik'
        ORDER BY absensi_pegawai.created_at")->result();

        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dataAbsensi', $data);
        $this->load->view('templates_pegawai/footer');
    }
    public function absensiAdd()
    {
        $data['title'] = "Absensi Pegawai";

        //$this->db->join('data_pegawai', 'data_pegawai.id_jabatan = data_jabatan.id_jabatan');
        $data['absensi'] = $this->PenggajianModel->getData('absensi_pegawai')->result();

        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/formTambahAbsensi', $data);
        $this->load->view('templates_pegawai/footer');
    }
    public function absensiAction()
    {
        $nama    = $this->input->post('nama');
        $keterangan    = $this->input->post('keterangan');

        $data = array(
            'nama'           => $nama,
            'keterangan'  => $keterangan,
        );

        $this->PenggajianModel->insertData($data, 'absensi_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Absensi berhasil!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
        redirect('/PegawaiController/AbsensiPegawai');
    }
}
