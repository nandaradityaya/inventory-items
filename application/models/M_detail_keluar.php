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
        $this->db->select('nama_barang, SUM(jumlah) as jumlah');
        $this->db->from('detail_keluar');
        $this->db->join('pengeluaran', 'detail_keluar.no_keluar = pengeluaran.no_keluar');
        $this->db->where('pengeluaran.tgl_keluar', $tanggal);
        $this->db->group_by('nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lihat_all() {
        $this->db->select('nama_barang, SUM(jumlah) as jumlah');
        $this->db->from('detail_keluar');
        $this->db->join('pengeluaran', 'detail_keluar.no_keluar = pengeluaran.no_keluar');
        $this->db->group_by('nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	
}