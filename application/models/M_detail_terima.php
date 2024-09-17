<?php

class M_detail_terima extends CI_Model {
	protected $_table = 'detail_terima';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_terima($no_terima){
		return $this->db->get_where($this->_table, ['no_terima' => $no_terima])->result();
	}

	public function hapus($no_terima){
		return $this->db->delete($this->_table, ['no_terima' => $no_terima]);
	}

	public function lihat_by_date($tanggal) {
        $this->db->select('detail_terima.nama_barang, SUM(detail_terima.jumlah) as jumlah, kategori.nama_kategori');
        $this->db->from('detail_terima');
        $this->db->join('penerimaan', 'penerimaan.no_terima = detail_terima.no_terima');
        $this->db->join('barang', 'barang.nama_barang = detail_terima.nama_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->where('penerimaan.tgl_terima', $tanggal);
        $this->db->group_by('detail_terima.nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lihat_all() {
        $this->db->select('detail_terima.nama_barang, SUM(detail_terima.jumlah) as jumlah, kategori.nama_kategori');
        $this->db->from('detail_terima');
        $this->db->join('penerimaan', 'penerimaan.no_terima = detail_terima.no_terima');
        $this->db->join('barang', 'barang.nama_barang = detail_terima.nama_barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->group_by('detail_terima.nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	
}