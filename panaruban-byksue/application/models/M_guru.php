<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model{
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->join('tbl_mapel','tbl_mapel.id_mapel = tbl_guru.id_mapel', 'left');
		$this->db->order_by('id_guru','DESC');
		return $this->db->get()->result();
	}
	public function detail ($id_guru)
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->join('tbl_mapel','tbl_mapel.id_mapel = tbl_guru.id_mapel', 'left');
		$this->db->where('id_guru',$id_guru);
		return $this->db->get()->row();
	}

	public function add($data)
	{
		$this->db->insert('tbl_guru',$data);
	}
	public function edit($data)
    {
        $this->db->where('id_guru',$data['id_guru']);
        $this->db->update('tbl_guru',$data);
    }

    public function delete($data)
    {
        $this->db->where('id_guru',$data['id_guru']);
        $this->db->delete('tbl_guru',$data);
    }
}