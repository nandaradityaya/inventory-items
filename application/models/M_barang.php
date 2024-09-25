<?php

class M_barang extends CI_Model{
	protected $_table = 'barang';

	public function lihat(){
		// $query = $this->db->get($this->_table);
		// return $query->result();

		$this->db->select('barang.*, kategori.nama_kategori');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'left');
		$this->db->order_by('id', 'DESC');
        return $this->db->get($this->_table)->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok(){
		$query = $this->db->get_where($this->_table, 'stok > 1');
		return $query->result();
	}

	public function lihat_by_id($id) {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

    public function lihat_by_kode($kode_barang) {
        return $this->db->get_where($this->_table, ['kode_barang' => $kode_barang])->row();
    }

	public function lihat_id($kode_barang){
		$query = $this->db->get_where($this->_table, ['kode_barang' => $kode_barang]);
		return $query->row();
	}

	public function lihat_nama_barang($nama_barang){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_barang' => $nama_barang]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function plus_stok($stok, $nama_barang){
		$query = $this->db->set('stok', 'stok+' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function min_stok($stok, $nama_barang){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($data, $kode_barang){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_barang' => $kode_barang]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_barang){
		return $this->db->delete($this->_table, ['kode_barang' => $kode_barang]);
	}

	public function lihat_stok_minimal(){
		$this->db->where('stok <', 10);
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_kode($kode_barang) {
        $this->db->where('kode_barang', $kode_barang);
        $query = $this->db->get($this->_table);
        return $query->row();
    }
	

    public function update_stok($kode_barang, $stok) {
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->update($this->_table, ['stok' => $stok]);
    }

	public function update_stok_by_id($id, $stok) {
        $this->db->where('id', $id);
        return $this->db->update($this->_table, ['stok' => $stok]);
    }

	public function filter_by_date($tanggal_awal, $tanggal_akhir) {
		$this->db->where('DATE(created_at) >=', $tanggal_awal);
		$this->db->where('DATE(created_at) <=', $tanggal_akhir);
		$this->db->select('barang.*, kategori.nama_kategori');
		$this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'left');
		$this->db->order_by('id', 'DESC');
		return $this->db->get($this->_table)->result();
	}
	
}