<?php

class Barang_rusak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->login['role'] != 'admin') redirect();
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

        // Ambil data barang berdasarkan kode
        $barang = $this->m_barang->lihat_kode($kode_barang);  // Metode lihat_kode harus ada di model

        if ($barang) {
            // Kurangi stok barang
            $new_stok = $barang->stok - $jumlah_rusak;

            if ($new_stok >= 0) {
                $this->m_barang->update_stok($kode_barang, $new_stok);

                // Konversi tanggal ke format 'Y-m-d'
                $tanggal_input = date('d/m/Y');
                $dateTime = DateTime::createFromFormat('d/m/Y', $tanggal_input);
                $tanggal = $dateTime->format('Y-m-d');

                $this->m_barang_rusak->tambah([
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $nama_barang,
                    'jumlah_rusak' => $jumlah_rusak,
                    'keterangan' => $keterangan,
                    'tanggal' => $tanggal,
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

    public function edit($id) {
        $data['title'] = 'Edit Barang Rusak';
        $data['barang_rusak'] = $this->m_barang_rusak->lihat_by_id($id); // Ambil data barang rusak berdasarkan ID
        $data['barang'] = $this->m_barang->lihat(); // Ambil semua barang untuk pilihan
        $data['aktif'] = 'barang_rusak';
        $this->load->view('barang_rusak/edit', $data);
    }
    
    public function proses_edit($id) {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_rusak_baru = $this->input->post('jumlah_rusak');
        $keterangan = $this->input->post('keterangan');
    
        // Ambil data barang rusak yang akan di-edit
        $barang_rusak_lama = $this->m_barang_rusak->lihat_by_id($id);
        
        if ($barang_rusak_lama) {
            // Ambil data barang berdasarkan kode
            $barang = $this->m_barang->lihat_kode($kode_barang);
    
            if ($barang) {
                // Hitung stok baru dengan cara menambahkan kembali stok lama, kemudian dikurangi stok baru
                $stok_awal = $barang->stok + $barang_rusak_lama->jumlah_rusak; // Kembalikan stok lama
                $stok_akhir = $stok_awal - $jumlah_rusak_baru; // Kurangi stok dengan jumlah baru
    
                if ($stok_akhir >= 0) {
                    // Update stok barang
                    $this->m_barang->update_stok($kode_barang, $stok_akhir);
    
                    // Konversi tanggal ke format 'Y-m-d'
                    $tanggal_input = date('d/m/Y');
                    $dateTime = DateTime::createFromFormat('d/m/Y', $tanggal_input);
                    $tanggal = $dateTime->format('Y-m-d');
    
                    // Update data barang rusak
                    $this->m_barang_rusak->update($id, [
                        'kode_barang' => $kode_barang,
                        'nama_barang' => $nama_barang,
                        'jumlah_rusak' => $jumlah_rusak_baru,
                        'keterangan' => $keterangan,
                        'tanggal' => $tanggal,
                    ]);
    
                    $this->session->set_flashdata('success', 'Barang rusak berhasil diupdate!');
                } else {
                    $this->session->set_flashdata('error', 'Stok barang tidak cukup!');
                }
            } else {
                $this->session->set_flashdata('error', 'Barang tidak ditemukan!');
            }
        } else {
            $this->session->set_flashdata('error', 'Data barang rusak tidak ditemukan!');
        }
        redirect('barang_rusak');
    }
    

    public function delete($id) {
        $this->m_barang_rusak->delete($id);
        $this->session->set_flashdata('success', 'Barang rusak berhasil dihapus!');
        redirect('barang_rusak');
    }
}
