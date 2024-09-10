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
		$this->db->select('nama_barang, SUM(jumlah) as jumlah');
		$this->db->from('detail_terima');
		$this->db->join('penerimaan', 'detail_terima.no_terima = penerimaan.no_terima');
		$this->db->where('penerimaan.tgl_terima', $tanggal);
		$this->db->group_by('nama_barang');
		$query = $this->db->get();
		return $query->result_array();
	}
	

    public function lihat_all() {
        $this->db->select('nama_barang, SUM(jumlah) as jumlah');
        $this->db->from('detail_terima');
        $this->db->join('penerimaan', 'detail_terima.no_terima = penerimaan.no_terima');
        $this->db->group_by('nama_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	
}