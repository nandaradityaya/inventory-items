<?php

class M_kategori extends CI_Model {
    protected $_table = 'kategori';

    public function lihat() {
        return $this->db->get($this->_table)->result();
    }

    public function lihat_id($id_kategori) {
        return $this->db->get_where($this->_table, ['id_kategori' => $id_kategori])->row();
    }

    public function tambah($data) {
        return $this->db->insert($this->_table, $data);
    }

    public function ubah($data, $id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->update($this->_table, $data);
    }

    public function hapus($id_kategori) {
        return $this->db->delete($this->_table, ['id_kategori' => $id_kategori]);
    }
}
