<?php
defined('BASEPATH') or exit('No direct script access allowed');

class desa extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'INPUT DESA';
        $data['heading'] = 'FORM INPUT DESA';

        $data['desa'] = $this->m_tamsil->get('tb_desa');

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('desa/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah_desa()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama desa Gagal Ditambahkan!!</div>');
            redirect('desa');
        } else {
            $data = [
                'nama_desa' => htmlspecialchars($this->input->post('nama', true))
            ];

            $this->m_tamsil->insert('tb_desa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nama desa Berhasil di Tambah!!</div>');
            redirect('desa');
        }
    }
}
