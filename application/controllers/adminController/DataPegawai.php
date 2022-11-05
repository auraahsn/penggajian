<?php 

class DataPegawai extends CI_Controller{
    public function index(){
        $data['title'] = "Data Pegawai"; 
        $data['pegawai'] = $this->PenggajianModel->getData('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function addData(){
        $data['title'] = "Tambah Data Pegawai"; 
        $data['jabatan'] = $this->PenggajianModel->getData('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function addDataAction(){
        $nik    = $this->input->post('nik');
        $nama_pegawai    = $this->input->post('nama_pegawai');
        $jenis_kelamin    = $this->input->post('jenis_kelamin');
        $tanggal_masuk    = $this->input->post('tanggal_masuk');
        $jabatan    = $this->input->post('jabatan');
        $status    = $this->input->post('status');
        $photo    = $_FILES['photo']['name'];
        if($photo == ''){}
        else{
            $config ['upload_path'] = './assets/photo';
            $config ['allowed_type'] = 'jpg|jpeg|png|tiff';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('photo')){
                echo "Photo gagal diupload!";
            }else{
                $photo=$this->upload->data('file_name');
            }
        }

        $data = array(
            'nik'           => $nik,
            'nama_pegawai'  => $nama_pegawai,
            'jenis_kelamin' => $jenis_kelamin,
            'jabatan'       => $jabatan,
            'tanggal_masuk' => $tanggal_masuk,
            'status'        => $status,
            'photo'         => $photo,
        );

        $this->PenggajianModel->insertData($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
            redirect('/adminController/DataPegawai');
    }
}

?>