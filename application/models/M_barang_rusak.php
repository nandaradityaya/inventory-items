<?php

class M_barang_rusak extends CI_Model {
    
    public function lihat() {
        $this->db->select('barang_rusak.*, kategori.nama_kategori');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang.kode_barang = barang_rusak.kode_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function lihat_by_date($tanggal) {
        $this->db->select('barang_rusak.*, kategori.nama_kategori');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang.kode_barang = barang_rusak.kode_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $dateTime = DateTime::createFromFormat('d/m/Y', $tanggal);
        $tanggal_db = $dateTime ? $dateTime->format('Y-m-d') : null;
        if ($tanggal_db) {
            $this->db->where('DATE(barang_rusak.tanggal)', $tanggal_db);
        }
        return $this->db->get()->result();
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

    public function get_total_barang_rusak() {
        $this->db->select_sum('jumlah_rusak');
        $query = $this->db->get('barang_rusak');
        return $query->row()->jumlah_rusak;
    }

    public function lihat_by_id($id) {
        $this->db->select('*');
        $this->db->from('barang_rusak');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('barang_rusak', $data);
        return $this->db->affected_rows();
    }    

    public function delete($id) {
        $this->db->delete('barang_rusak', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
