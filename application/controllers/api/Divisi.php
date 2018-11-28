<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Divisi extends REST_Controller
{
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('divisi_model','divisi');

	}

	function index_get()
	{
		$data = $this->divisi->find_all();

		if ($data){
			$this->response($data);
		}
		$this->response(null,REST_Controller::HTTP_NO_CONTENT);
	}


	function pagination_get(){
		$data = array();

		$limit_per_page = 10;
		$start_page = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
		$total_records = $this->divisi->get_total();
		if($total_records > 0){
			$data = $this->divisi->pagination($limit_per_page,$start_page);
		}
		if ($data){
			$this->response($data);
		}
		$this->response(null,REST_Controller::HTTP_NO_CONTENT);

	}
	function insert_post(){
		$this->form_validation->set_rules('kode','Kode divisi','required');
		$this->form_validation->set_rules('nama','Nama Divisi','required');
		if ($this->form_validation->run()==FALSE){
			$this->response($this->validation_errors(),REST_Controller::HTTP_BAD_REQUEST);
		}else{
			$data = array(
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama')
			);
			$result = $this->divisi->insert($data);
			$this->response($result);
		}

		 function detail_get(){
			$id = $this->uri->segment(4);
			$data= $this->divisi->find_by_id($id);
			 if ($data){
				 $this->response($data);
			 }
			 $this->response(null,REST_Controller::HTTP_NO_CONTENT);
		}
	}
	function update_post()
	{
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules('kode', 'Kode divisi', 'required');
		$this->form_validation->set_rules('nama', 'Nama Divisi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->response($this->validation_errors(), REST_Controller::HTTP_BAD_REQUEST);

		} else {
			$data = array(
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama')
			);
			$id = $this->input->post('id');
			$result = $this->divisi->update($id, $data);
			$this->response($result);

		}
	}
	function delete_post(){
		$id = $this->uri->segment(3);
		if ($id){
			$result = $this->divisi->delete($id);
		}
		$this->response($result);
	}
}
