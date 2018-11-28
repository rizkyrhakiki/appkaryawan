<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class divisi_model extends CI_Model
{
	public $table = 'divisi';

	function __construct()
	{
		parent::__construct();
	}

	public function find_all()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function find_by_id($id)
	{
	  $result = $this->db->get_where($this->table,array('id' => $id))->result_array();
	  if($result) {
		  return $result[0];
	  }
	  	else {
	  		return false;
		  }
	  }

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this-> table);
	}


}