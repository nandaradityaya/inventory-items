<?php

class M_barang_rusak extends CI_Model {
    
    public function lihat() {
        $this->db->select('barang_rusak.*, barang.nama_barang, barang.kode_barang, kategori.nama_kategori');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang.id = barang_rusak.id_barang', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function lihat_by_date($tanggal) {
        $this->db->select('barang_rusak.*, barang.nama_barang, barang.kode_barang, kategori.nama_kategori');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang.id = barang_rusak.id_barang', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $dateTime = DateTime::createFromFormat('d/m/Y', $tanggal);
        $tanggal_db = $dateTime ? $dateTime->format('Y-m-d') : null;
        if ($tanggal_db) {
            $this->db->where('DATE(barang_rusak.tanggal)', $tanggal_db);
        }
        return $this->db->get()->result();
    }
    
    public function tambah($data) {
        return $this->db->insert('barang_rusak', $data);
        // return $this->db->affected_rows();
        // return $this->db->insert($this->_table, $data);
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
         $this->db->select('barang_rusak.*, barang.nama_barang, barang.kode_barang');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang.id = barang_rusak.id_barang', 'left');
        $this->db->where('barang_rusak.id', $id);
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

    public function lihat_by_date_range($tanggal_awal, $tanggal_akhir) {
        $this->db->select('barang_rusak.nama_barang, barang.kode_barang, SUM(barang_rusak.jumlah_rusak) as jumlah_rusak, kategori.nama_kategori, barang_rusak.tanggal');
        $this->db->from('barang_rusak');
        $this->db->join('barang', 'barang.nama_barang = barang_rusak.nama_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        
        // Validasi dan konversi format tanggal untuk tanggal_awal
        $dateTimeAwal = DateTime::createFromFormat('d/m/Y', $tanggal_awal);
        $tanggal_awal_db = $dateTimeAwal ? $dateTimeAwal->format('Y-m-d') : null;
        
        // Validasi dan konversi format tanggal untuk tanggal_akhir
        $dateTimeAkhir = DateTime::createFromFormat('d/m/Y', $tanggal_akhir);
        $tanggal_akhir_db = $dateTimeAkhir ? $dateTimeAkhir->format('Y-m-d') : null;

        // Jika kedua tanggal valid, lakukan query dengan rentang tanggal
        if ($tanggal_awal_db && $tanggal_akhir_db) {
            $this->db->where('barang_rusak.tanggal >=', $tanggal_awal_db);
            $this->db->where('barang_rusak.tanggal <=', $tanggal_akhir_db);
        }
        
        $this->db->group_by('barang_rusak.nama_barang');
        $query = $this->db->get();
        // $result = $query->result_array();
        return $query->result();
        
        // Konversi format tanggal menjadi d/m/Y
        foreach ($result as &$row) {
            if (isset($row['tanggal'])) {
                $dateTimeRusak = DateTime::createFromFormat('Y-m-d', $row['tanggal']);
                $row['tanggal'] = $dateTimeRusak ? $dateTimeRusak->format('d/m/Y') : $row['tanggal'];
            }
        }

        return $result;
    }
}
