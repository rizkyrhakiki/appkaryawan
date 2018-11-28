<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('karyawan_model', 'karyawan');

		$this->load->model('divisi_model', 'divisi');


	}

	public function index()
	{

		$data['records'] = $this->karyawan->find_all();
		$this->load->view("karyawan/index", $data);
	}

	public function tambah()
	{
		$sql = "SELECT id,nama FROM divisi";
		$query = $this->db->query($sql);
		$data['divisi'] = $query->result_array();
		$jabatan = array(
			'Manajer' => 'Manajer',
			'Supervisor' => 'Supervisor',
			'Karyawan' => 'karyawan'
		);
		$data['jabatan'] = $jabatan;
		$this->load->view("karyawan/tambah", $data);
	}

	public function tambah_save()
	{
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('karyawan/tambah');
		} else {
			$config = array(
				'upload_path' => "./assets/uploads/",
				'allowed_types' => "*",
				'overwrite' => true
			);
			$file_name = "";
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
			} else {
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				exit;
			}

			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'telpon' => $this->input->post('telpon'),
				'jabatan' => $this->input->post('jabatan'),
				'jeniskelamin' => $this->input->post('jeniskelamin'),
				'iddivisi' => $this->input->post('iddivisi'),
				'foto' => $file_name

			);
			$this->karyawan->insert($data);
			redirect(base_url('karyawan'));
		}
	}

	public function detail()
	{
		$id = $this->uri->segment(3);
		$data['karyawan'] = $this->karyawan->find_by_id($id);
		$this->load->view('karyawan/detail', $data);
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['karyawan'] = $this->karyawan->find_by_id($id);
		$jabatan = array(
			'Manajer' => 'Manajer',
			'Supervisor' => 'Supervisor',
			'Karyawan' => 'karyawan'
		);
		$data['jabatans'] = $jabatan;
		$data['divisi'] = $this->divisi->find_all();

		$this->load->view('karyawan/edit', $data);
	}

	public function edit_save(){
		$this->form_validation->set_rules('nama','Nama Karyawan','required');
		$this->form_validation->set_rules('email','Email Karyawan','required');

		if ($this->form_validation->run()==FALSE){
			$id = $this->post('id');
			$data['divisi'] = $this->divisi->find_by_id($id);
			$jabatan = array(
				'Manajer' => 'Manajer',
				'Supervisor' => 'Supervisor',
				'Karyawan' => 'karyawan'
			);
		$data['jabatans'] = $jabatan;
		$data['divisi'] = $this->divisi->find_all();

		$this->load->view('karyawan/edit', $data);
		}else{
			$config = array(
				'upload_path' => "./assets/uploads/",
				'allowed_types' => "*",
				'overwrite' => true
			);
			$file_name = "";
			$this->load->library('upload', $config);
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'telpon' => $this->input->post('telpon'),
				'jabatan' => $this->input->post('jabatan'),
				'jeniskelamin' => $this->input->post('jeniskelamin'),
				'iddivisi' => $this->input->post('iddivisi'),
				'foto' => $file_name

			);
			$id = $this->input->post('id');
			$this->karyawan->update($id,$data);
			redirect(base_url('/karyawan'));
		}
	}
}
