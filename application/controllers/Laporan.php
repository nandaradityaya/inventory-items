<?php

class Laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'laporan';
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_penerimaan', 'm_penerimaan');
        $this->load->model('M_pengeluaran', 'm_pengeluaran');
        $this->load->model('M_detail_terima', 'm_detail_terima');
        $this->load->model('M_detail_keluar', 'm_detail_keluar');
    }

    public function index() {
        // Ambil tanggal dari input
        $tanggal_input = $this->input->post('tanggal') ?? '';
    
        // Coba konversi tanggal dari format 'd/m/Y' ke 'Y-m-d'
        $dateTime = DateTime::createFromFormat('d/m/Y', $tanggal_input);
        if ($dateTime !== false) {
            $tanggal = $dateTime->format('d/m/Y');
        } else {
            $tanggal = null;
        }
    
        // Ambil data penerimaan dan pengeluaran
        if ($tanggal) {
            $penerimaan = $this->m_detail_terima->lihat_by_date($tanggal);
            $pengeluaran = $this->m_detail_keluar->lihat_by_date($tanggal);
        } else {
            $penerimaan = $this->m_detail_terima->lihat_all();
            $pengeluaran = $this->m_detail_keluar->lihat_all();
        }
    
        // Gabungkan data
        $laporan = [];
        foreach ($penerimaan as $item) {
            $laporan[$item['nama_barang']]['masuk'] = $item['jumlah'];
        }
        foreach ($pengeluaran as $item) {
            if (!isset($laporan[$item['nama_barang']])) {
                $laporan[$item['nama_barang']] = ['masuk' => 0, 'keluar' => 0];
            }
            $laporan[$item['nama_barang']]['keluar'] = $item['jumlah'];
        }
    
        // Kirim data ke view
        $this->data['no'] = 1;
        $this->data['laporan'] = $laporan;
        $this->data['tanggal'] = $tanggal_input;
        $this->data['title'] = 'Laporan Barang';
        $this->load->view('laporan/lihat', $this->data);
    }
    
}
