<?php

class M_detail_keluar extends CI_Model {
	protected $_table = 'detail_keluar';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_keluar($no_keluar){
		return $this->db->get_where($this->_table, ['no_keluar' => $no_keluar])->result();
	}

	public function hapus($no_keluar){
		return $this->db->delete($this->_table, ['no_keluar' => $no_keluar]);
	}

	public function lihat_by_date($tanggal) {
        $this->db->select('detail_keluar.nama_barang, SUM(detail_keluar.jumlah) as jumlah, kategori.nama_kategori');
        $this->db->from('detail_keluar');
        $this->db->join('pengeluaran', 'pengeluaran.no_keluar = detail_keluar.no_keluar');
        $this->db->join('barang', 'barang.nama_barang = detail_keluar.nama_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->where('pengeluaran.tgl_keluar', $tanggal);
        $this->db->group_by('detail_keluar.nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lihat_by_date_range($tanggal_awal, $tanggal_akhir) {
        $this->db->select('detail_keluar.nama_barang, SUM(detail_keluar.jumlah) as jumlah, kategori.nama_kategori');
        $this->db->from('detail_keluar');
        $this->db->join('pengeluaran', 'pengeluaran.no_keluar = detail_keluar.no_keluar');
        $this->db->join('barang', 'barang.nama_barang = detail_keluar.nama_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        
        // Menggunakan BETWEEN untuk rentang tanggal
        $this->db->where('pengeluaran.tgl_keluar >=', $tanggal_awal);
        $this->db->where('pengeluaran.tgl_keluar <=', $tanggal_akhir);
        
        $this->db->group_by('detail_keluar.nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function lihat_all() {
        $this->db->select('detail_keluar.nama_barang, SUM(detail_keluar.jumlah) as jumlah, kategori.nama_kategori');
        $this->db->from('detail_keluar');
        $this->db->join('pengeluaran', 'pengeluaran.no_keluar = detail_keluar.no_keluar');
        $this->db->join('barang', 'barang.nama_barang = detail_keluar.nama_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->group_by('detail_keluar.nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	
}