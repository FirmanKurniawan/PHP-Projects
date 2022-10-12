<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model{

	public function download()
	{
		$this->db->select('*');
		$this->db->from('tbl_file');
        $this->db->order_by('id_file','DESC');
        return $this->db->get()->result();
	}

	public function guru()
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->join('tbl_mapel','tbl_mapel.id_mapel = tbl_guru.id_mapel','left');
        $this->db->order_by('id_guru','DESC');
        return $this->db->get()->result();
	}

	//memunculkan berita deg paging
	public function berita($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user','left');
        $this->db->order_by('id_berita','desc');
        $this->db->limit($limit,$start);
        return $this->db->get()->result();
	}

	public function total_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_berita.id_user','left');
        $this->db->order_by('id_berita','DESC');
        return $this->db->get()->result();
	}

	public function detail_berita($slug_berita)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user','left');
        $this->db->where('slug_berita',$slug_berita);
        return $this->db->get()->row();
	}

	public function latest_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user','left');
        $this->db->order_by('id_berita','desc');
        $this->db->limit(10);
        return $this->db->get()->result();
	}

	public function gallery()
	{
		$this->db->select('tbl_gallery.*,count(tbl_foto.id_gallery) as jml_foto');
		$this->db->from('tbl_gallery');
		$this->db->join('tbl_foto','tbl_foto.id_gallery = tbl_gallery.id_gallery', 'left');
		$this->db->group_by('tbl_gallery.id_gallery');
		$this->db->order_by('tbl_gallery.id_gallery','desc');
		return $this->db->get()->result();
	}

	public function detail_gallery($id_gallery)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_gallery', $id_gallery);
		$this->db->order_by('id_foto','desc');
		return $this->db->get()->result();
	}

	public function nama_gallery($id_gallery)
	{
		$this->db->select('*');
		$this->db->from('tbl_gallery');
		$this->db->where('id_gallery', $id_gallery);
		return $this->db->get()->row();
	}

	public function siswa()
	{
		 $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->order_by('id_siswa','DESC');
        return $this->db->get()->result();
	}

	public function slider_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user','left');
        $this->db->order_by('id_berita','desc');
        $this->db->limit(6);
        return $this->db->get()->result();
	}
}