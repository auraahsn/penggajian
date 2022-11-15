<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE) {
			$data['title'] = "Form Login";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('formLogin');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->PenggajianModel->cek_login($username, $password);

			if($cek == FALSE)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username atau password salah!</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
				</div>');
				redirect('welcome');
			}else{
				$this->session->set_userdata('hak_akses', $cek -> hak_akses);
				$this->session->set_userdata('nama_pegawai', $cek -> nama_pegawai);
				$this->session->set_userdata('id_pegawai', $cek -> id_pegawai);

				switch ($cek->hak_akses) {
					case 1 : redirect('adminController/DashboardAdmin');
							break;
					case 2 : redirect('pegawaiController/DashboardPegawai');
							break;
					default: break;
				}
			}
		}

		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username','required');
		$this->form_validation->set_rules('password', 'password','required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
