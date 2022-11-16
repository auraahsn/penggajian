<?php

class dataAbsensi extends CI_Controller
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
        $data['title'] = "Data Absensi Pegawai";
        $this->db->join('data_pegawai', 'data_kehadiran.id_pegawai = data_pegawai.id_pegawai');

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, data_pegawai.id_pegawai,
        data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.id_jabatan
        FROM data_kehadiran INNER JOIN data_pegawai ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_kehadiran.nama_jabatan = data_jabatan.nama_jabatan
        WHERE data_kehadiran.bulan= '$bulanTahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }
    public function inputAbsensi()
    {
    
        if ($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) { 
                if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nik' => $post['nik'][$key],
                        'nama_pegawai' => $post['nama_pegawai'][$key],
                        'jenis_kelamin' => $post['jenis_kelamin'][$key],
                        'nama_jabatan' => $post['nama_jabatan'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'alfa' => $post['alfa'][$key],
                        'id_pegawai' => $post['id_pegawai'][$key],
                    );
                }
            }

            $this->PenggajianModel->insert_batch('data_kehadiran', $simpan); 
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
            </div>');
            redirect('/adminController/DataAbsensi');
        }


        $data['title'] = "Form Input Absensi";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $this->db->join('data_jabatan', 'data_jabatan.id_jabatan = data_pegawai.id_jabatan');
        // $this->db->join('data_kehadiran', 'data_kehadiran.id_pegawai = data_pegawai.id_pegawai');
        $data['inputAbsensi'] = $this->db->query("SELECT data_pegawai.*,
        data_jabatan.nama_jabatan FROM data_pegawai
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan
        WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulanTahun' 
        AND data_pegawai.nik=data_kehadiran.nik) ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formInputAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }
}
