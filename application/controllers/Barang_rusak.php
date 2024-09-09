<?php

class Barang_rusak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->login['role'] != 'admin') redirect();
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_barang_rusak', 'm_barang_rusak');
    }

    public function index() {
        $data['title'] = 'Data Barang Rusak';
        $data['barang_rusak'] = $this->m_barang_rusak->lihat();
        $data['aktif'] = 'barang_rusak';
        $this->load->view('barang_rusak/lihat', $data);
    }

    public function tambah() {
        $data['title'] = 'Tambah Barang Rusak';
        $data['barang'] = $this->m_barang->lihat();
        $data['aktif'] = 'barang_rusak';
        $this->load->view('barang_rusak/tambah', $data);
    }

    public function proses_tambah() {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_rusak = $this->input->post('jumlah_rusak');
        $keterangan = $this->input->post('keterangan');
        // $tanggal = date('Y-m-d');

         // Ambil data barang berdasarkan kode
    $barang = $this->m_barang->lihat_kode($kode_barang);  // Metode lihat_kode harus ada di model

    if ($barang) {
        // Kurangi stok barang
        $new_stok = $barang->stok - $jumlah_rusak;

        if ($new_stok >= 0) {
            $this->m_barang->update_stok($kode_barang, $new_stok);
            $this->m_barang_rusak->tambah([
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'jumlah_rusak' => $jumlah_rusak,
                'keterangan' => $keterangan,
                'tanggal' => date('Y-m-d H:i:s'),
            ]);
            $this->session->set_flashdata('success', 'Barang rusak berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Stok barang tidak cukup!');
        }
    } else {
        $this->session->set_flashdata('error', 'Barang tidak ditemukan!');
    }
        redirect('barang_rusak');
    }
}
