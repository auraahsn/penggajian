<?php

class DataJabatan extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->PenggajianModel->getData('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function addData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/addDataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function addDataAction()
    {
        // $this->_rules();
        
        // if ($this->form_validation->run() == FALSE) {
        //     $this->addData();
        // } else {
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
            );

            $this->PenggajianModel->insertData($data, 'data_jabatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
            redirect('/adminController/DataJabatan');
        // }
    }

    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Update Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAction()
    {
        // $this->_rules();
        
        // if ($this->form_validation->run() == FALSE) {
        //     $this->updateData();
        // } else {
            $id = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
            );

            $where = array(
                'id_jabatan' => $id
            );

            $this->PenggajianModel->updateData('data_jabatan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
            redirect('/adminController/DataJabatan');
        //}
    }

    public function deleteData($id){
        $where = array('id_jabatan' => $id);
        $this->PenggajianModel->deleteData($where, 'data_jabatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
            redirect('/adminController/DataJabatan');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji_pokok', 'required');
        $this->form_validation->set_rules('tj_transport', 'tj_transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'uang_makan', 'required');
    }

}
?>
