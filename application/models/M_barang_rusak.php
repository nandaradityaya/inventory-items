<?php

class M_barang_rusak extends CI_Model {
    
    public function lihat() {
        return $this->db->get('barang_rusak')->result();
    }
    
    public function tambah($data) {
        $this->db->insert('barang_rusak', $data);
        return $this->db->affected_rows();
    }

    public function kurangi_stok($kode_barang, $jumlah) {
        $this->db->set('stok', 'stok - ' . (int)$jumlah, FALSE);
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->update('barang');
    }
    
}
