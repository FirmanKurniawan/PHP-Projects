<?php

defined ('BASEPATH') OR exit('No direct script access allowed');
class Berita extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_berita');
    }
    public function index()
    {
        $data = array(
                    'title'  => 'SMKN 2 SUMEDANG',
                    'title2' => 'News',
                    'berita'   => $this->m_berita->lists(),
                    'isi'    => 'admin/berita/v_lists'
                );
        $this->load->view('admin/layout/v_wrapper',$data, FALSE);
    }

    public function add()
    {
    
        $this->form_validation->set_rules('judul_berita','Judul Berita','required');
        $this->form_validation->set_rules('isi_berita','Isi Berita','required',array('required'=>'%s Harus Diisi'));
        

        if ($this->form_validation->run() == TRUE){
            $config['upload_path']   = './gambar_berita/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_berita'))
           {
              
                $data = array(
                    'title'  => 'SMKN 2 SUMEDANG',
                    'title2' => 'Add News',
                    'error'  => $this->upload->display_errors(),
                    'isi'    => 'admin/berita/v_add'
                );
                $this->load->view('admin/layout/v_wrapper',$data, FALSE);
            }
            else
            {
                  $upload_data              = array('uploads' => $this->upload->data());
                  $config['image_library']  = 'gd2';
                  $config['source_image']   = './gambar_berita/'.$upload_data['uploads']['file_name'];
                  $this->load->library('image_lib', $config);

                  $data = array(
                            'judul_berita'   => $this->input->post('judul_berita'),
                            'slug_berita'    => url_title($this->input->post('judul_berita'),'dash',TRUE),
                            'isi_berita'     => $this->input->post('isi_berita'),
                            'tgl_berita'     => date('Y-m-d'),
                            'id_user'        => $this->session->userdata('id_user'),
                            'gambar_berita'  => $upload_data['uploads']['file_name']
                        );
                    $this->m_berita->add($data);
                    $this->session->set_flashdata('pesan', 'Berita Berhasil Di Posting !!!');
                    redirect('berita');
            }
        }
    $data = array(
            'title'     => 'SMKN 2 SUMEDANG',
            'title2'    => 'Add News',
            'isi'       => 'admin/berita/v_add'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
      public function edit($id_berita)
    {
        $this->form_validation->set_rules('judul_berita','Judul Berita','required');
        $this->form_validation->set_rules('isi_berita','Isi Berita','required',array('required'=>'%s Harus di isi'));


        if ($this->form_validation->run() == TRUE){
            $config['upload_path']          = './gambar_berita/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('gambar_berita'))
                {
                        $data = array(
                            'title'     => 'SMA 1 NUSANTARA',
                            'title2'    => 'Edit Berita',
                            'error'     => $this->upload->display_errors(),
                            'berita'    => $this->m_berita->detail($id_berita),
                            'isi'       => 'admin/berita/v_edit'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else
                {
                        $upload_data             = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image']  = './gambar_berita/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);
                        //menghapus foto sesudah upload
                        $berita=$this->m_berita->detail($id_berita);
                        if ($berita->gambar_berita !=""){
                            unlink('./gambar_berita/'.$berita->gambar_berita);
                        }
                        //end menghapus foto
                        $data = array(
                            'id_berita'      => $id_berita,
                            'judul_berita'   => $this->input->post('judul_berita'),
                            'slug_berita'    => url_title($this->input->post('judul_berita'),'dash',TRUE),
                            'isi_berita'     => $this->input->post('isi_berita'),
                            'tgl_berita'     => date('Y-m-d'),
                            'id_user'        => $this->session->userdata('id_user'),
                            'gambar_berita'  => $upload_data['uploads']['file_name']
                        );
                    $this->m_berita->edit($data);
                    $this->session->set_flashdata('pesan', 'Berita Berhasil Di Reposting !!!');
                    redirect('berita');
                }
                        $data = array(
                            'id_berita'      => $id_berita,
                            'judul_berita'   => $this->input->post('judul_berita'),
                            'slug_berita'    => url_title($this->input->post('judul_berita'),'dash',TRUE),
                            'isi_berita'     => $this->input->post('isi_berita'),
                            'tgl_berita'     => date('Y-m-d'),
                            'id_user'        => $this->session->userdata('id_user'),
                );
                $this->m_berita->edit($data);
                $this->session->set_flashdata('pesan', 'Berita Berhasil Di Reposting !!!');
                redirect('berita');
        }
        $data = array(
            'title'     => 'SMKN 2 SUMEDANG',
            'title2'    => 'Add News',
            'berita'    => $this->m_berita->detail($id_berita),
            'isi'       => 'admin/berita/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    
    public function delete($id_berita)
    {
        //menghapus foto sesudah upload
        $berita=$this->m_berita->detail($id_berita);
        if ($berita->gambar_berita !=""){
            unlink('./gambar_berita/'.$berita->gambar_berita);
        }
        //end menghapus foto
        $data = array('id_berita' => $id_berita);
        $this->m_berita->delete($data);
        $this->session->set_flashdata('pesan', 'Berita Berhasil Di Hapus !!!');
        redirect('berita');
    }
}


    
    


