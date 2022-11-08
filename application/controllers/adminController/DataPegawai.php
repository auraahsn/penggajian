<?php

class DataPegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Pegawai";
        $this->db->join('data_jabatan', 'data_jabatan.id_jabatan = data_pegawai.id_jabatan');

        //$this->db->join('data_pegawai', 'data_pegawai.id_jabatan = data_jabatan.id_jabatan');
        $data['pegawai'] = $this->PenggajianModel->getData('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function addData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->PenggajianModel->getData('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function addDataAction()
    {
        $nik    = $this->input->post('nik');
        $nama_pegawai    = $this->input->post('nama_pegawai');
        $jenis_kelamin    = $this->input->post('jenis_kelamin');
        $tanggal_masuk    = $this->input->post('tanggal_masuk');
        //$jabatan    = $this->input->post('jabatan');
        $id_jabatan      = $this->input->post('id_jabatan');
        $id_kehadiran      = $this->input->post('id_kehadiran');
        $status    = $this->input->post('status');

        $data = array(
            'nik'           => $nik,
            'nama_pegawai'  => $nama_pegawai,
            'jenis_kelamin' => $jenis_kelamin,
            //'jabatan'       => $jabatan,
            'id_jabatan'    => $id_jabatan,
            'id_kehadiran'  => $id_kehadiran,
            'tanggal_masuk' => $tanggal_masuk,
            'status'        => $status,
        );

        $this->PenggajianModel->insertData($data, 'data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
        redirect('/adminController/DataPegawai');
    }
    public function updateData($id)
    {
        $where = array('id_pegawai' => $id);
        $data['title'] = 'Update Data Pegawai';
        $data['jabatan'] = $this->PenggajianModel->getData('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdatePegawai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAction()
    {
        $id             = $this->input->post('id_pegawai');
        $nik             = $this->input->post('nik');
        $nama_pegawai    = $this->input->post('nama_pegawai');
        $jenis_kelamin    = $this->input->post('jenis_kelamin');
        $tanggal_masuk    = $this->input->post('tanggal_masuk');
        //$jabatan    = $this->input->post('jabatan');
        $id_jabatan      = $this->input->post('id_jabatan');
        $id_kehadiran      = $this->input->post('id_kehadiran');
        $status    = $this->input->post('status');

        $data = array(
            'nik'           => $nik,
            'nama_pegawai'  => $nama_pegawai,
            'jenis_kelamin' => $jenis_kelamin,
            //'jabatan'       => $jabatan,
            'id_jabatan'    => $id_jabatan,
            'id_kehadiran'  => $id_kehadiran,
            'tanggal_masuk' => $tanggal_masuk,
            'status'        => $status,
        );

        $where = array(
            'id_pegawai' => $id
        );

        $this->PenggajianModel->updateData('data_pegawai', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
        redirect('/adminController/DataPegawai');
    }
    public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->PenggajianModel->deleteData($where, 'data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
        redirect('/adminController/DataPegawai');
    }
}
