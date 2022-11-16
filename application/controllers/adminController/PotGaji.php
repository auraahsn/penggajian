<?php

class PotGaji extends CI_Controller
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
        $data['title'] = "Data Potongan Gaji Pegawai";
        $data['pot_gaji'] = $this->PenggajianModel->getData('pot_gaji')->result();
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPotGaji', $data);
        $this->load->view('templates_admin/footer');
    }
    public function addData()
    {
        $data['title'] = "Tambah Data Potongan Gaji Pegawai";
        $data['pot_gaji'] = $this->PenggajianModel->getData('pot_gaji')->result();
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formPotGaji', $data); 
        $this->load->view('templates_admin/footer');
    }
    public function addDataAction(){
        $potongan = $this->input->post('potongan');
        $jml_potongan = $this->input->post('jml_potongan');

        $data=array(
            'potongan' => $potongan,
            'jml_potongan' => $jml_potongan,
        );

        $this->PenggajianModel->insertData($data, 'pot_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
            redirect('/adminController/PotGaji');
    }
    public function updateData($id_pot_gaji)
    {
        $where = array('id_pot_gaji' => $id_pot_gaji);
        $data['title'] = 'Update Data Potongan Gaji Pegawai'; 
        $data['pot_gaji'] = $this->db->query("SELECT * FROM pot_gaji WHERE id_pot_gaji='$id_pot_gaji'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updatePotonganGaji', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAction()
    {
        $id_pot_gaji     = $this->input->post('id_pot_gaji');
        $potongan        = $this->input->post('potongan');
        $jml_potongan    = $this->input->post('jml_potongan');

        $data = array(
            'potongan' => $potongan,
            'jml_potongan' => $jml_potongan
        );

        $where = array(
            'id_pot_gaji' => $id_pot_gaji
        );

        $this->PenggajianModel->updateData('pot_gaji', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
        redirect('/adminController/PotGaji');
    }
    public function deleteData($id)
    {
        $where = array('id_pot_gaji' => $id);
        $this->PenggajianModel->deleteData($where, 'pot_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
        redirect('/adminController/PotGaji');
    }
}
