<?php

defined('BASEPATH') OR exit('Nodirect script access allowed');
class M_mapel extends CI_Model{

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_mapel');
		$this->db->order_by('id_mapel','desc');
		return $this->db->get()->result();
	}
	public function add($data)
	{
		$this->db->insert('tbl_mapel', $data);
	}
	public function edit($data)
	{
		$this->db->where('id_mapel', $data['id_mapel']);
		$this->db->update('tbl_mapel', $data);
}
	public function delete($data)
	{
		$this->db->where('id_mapel', $data['id_mapel']);
		$this->db->delete('tbl_mapel', $data);
}
}