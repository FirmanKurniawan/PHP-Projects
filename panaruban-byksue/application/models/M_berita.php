<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model{
    
        public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->join('tbl_user','tbl_user.id_user = tbl_berita.id_user', 'left');
        $this->db->order_by('id_berita','DESC');
        return $this->db->get()->result();
    }
    public function detail ($id_berita)
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->where('id_berita',$id_berita);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_berita',$data);
    }
    public function edit($data)
    {
        $this->db->where('id_berita',$data['id_berita']);
        $this->db->update('tbl_berita',$data);
    }

    public function delete($data)
    {
        $this->db->where('id_berita',$data['id_berita']);
        $this->db->delete('tbl_berita',$data);
    }
}