<?php

class Kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if($this->session->login['role'] != 'admin') redirect();
        $this->data['aktif'] = 'kategori';
        $this->load->model('M_kategori', 'm_kategori');
    }

    public function index() {
        $this->data['title'] = 'Data Kategori';
        $this->data['all_kategori'] = $this->m_kategori->lihat();
        $this->data['no'] = 1;

        $this->load->view('kategori/lihat', $this->data);
    }

    public function tambah() {
        $this->data['title'] = 'Tambah Kategori';

        $this->load->view('kategori/tambah', $this->data);
    }

    public function proses_tambah() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        if($this->m_kategori->tambah($data)) {
            $this->session->set_flashdata('success', 'Kategori Berhasil Ditambahkan!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Kategori Gagal Ditambahkan!');
            redirect('kategori/tambah');
        }
    }

    public function ubah($id_kategori) {
        $this->data['title'] = 'Ubah Kategori';
        $this->data['kategori'] = $this->m_kategori->lihat_id($id_kategori);

        $this->load->view('kategori/ubah', $this->data);
    }

    public function proses_ubah($id_kategori) {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        if($this->m_kategori->ubah($data, $id_kategori)) {
            $this->session->set_flashdata('success', 'Kategori Berhasil Diubah!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Kategori Gagal Diubah!');
            redirect('kategori/ubah/' . $id_kategori);
        }
    }

    public function hapus($id_kategori) {
        if($this->m_kategori->hapus($id_kategori)) {
            $this->session->set_flashdata('success', 'Kategori Berhasil Dihapus!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Kategori Gagal Dihapus!');
            redirect('kategori');
        }
    }
}
