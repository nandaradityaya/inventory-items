<?php
use Dompdf\Dompdf;
class Laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'laporan';
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_barang_rusak', 'm_barang_rusak');
        $this->load->model('M_penerimaan', 'm_penerimaan');
        $this->load->model('M_pengeluaran', 'm_pengeluaran');
        $this->load->model('M_detail_terima', 'm_detail_terima');
        $this->load->model('M_detail_keluar', 'm_detail_keluar');
    }

    public function index() {
        // Ambil tanggal dari input
        $tanggal_input = $this->input->post('tanggal') ?? '';

        // Konversi tanggal dari 'd/m/Y' ke 'Y-m-d'
        $dateTime = DateTime::createFromFormat('d/m/Y', $tanggal_input);
        if ($dateTime !== false) {
            $tanggal = $dateTime->format('d/m/Y');  // Format tanggal untuk database
        } else {
            $tanggal = null;
        }

        // Ambil data penerimaan, pengeluaran, dan barang rusak
        if ($tanggal) {
            $penerimaan = $this->m_detail_terima->lihat_by_date($tanggal);
            $pengeluaran = $this->m_detail_keluar->lihat_by_date($tanggal);
            $barang_rusak = $this->m_barang_rusak->lihat_by_date($tanggal);
        } else {
            $penerimaan = $this->m_detail_terima->lihat_all();
            $pengeluaran = $this->m_detail_keluar->lihat_all();
            $barang_rusak = $this->m_barang_rusak->lihat();
        }

        // Ambil stok barang
        $all_barang = $this->m_barang->lihat();  // Mengambil semua data barang
        $stok_barang = [];
        foreach ($all_barang as $barang) {
            $stok_barang[$barang->nama_barang] = $barang->stok;
            $satuan[$barang->nama_barang] = $barang->satuan;
        }

        // Gabungkan data, termasuk kategori
        $laporan = [];

        // Proses penerimaan
        foreach ($penerimaan as $item) {
            $nama_barang = $item['nama_barang'];
            if (!isset($laporan[$nama_barang])) {
                $laporan[$nama_barang] = [
                    'masuk' => 0,
                    'keluar' => 0,
                    'rusak' => 0,
                    'stok' => $stok_barang[$nama_barang] ?? 0,
                    'satuan' => $satuan[$nama_barang] ?? 'Satuan Tidak Ada',
                    'kategori' => $item['nama_kategori'] ?? 'Kategori Tidak Ada',
                ];
            }
            $laporan[$nama_barang]['masuk'] += $item['jumlah'];
        }

        // Proses pengeluaran
        foreach ($pengeluaran as $item) {
            $nama_barang = $item['nama_barang'];
            if (!isset($laporan[$nama_barang])) {
                $laporan[$nama_barang] = [
                    'masuk' => 0,
                    'keluar' => 0,
                    'rusak' => 0,
                    'stok' => $stok_barang[$nama_barang] ?? 0,
                    'satuan' => $satuan[$nama_barang] ?? 'Satuan Tidak Ada',
                    'kategori' => $item['nama_kategori'] ?? 'Kategori Tidak Ada',
                ];
            }
            $laporan[$nama_barang]['keluar'] += $item['jumlah'];
        }

        // Proses barang rusak
        foreach ($barang_rusak as $item) {
            $nama_barang = $item->nama_barang;
            if (!isset($laporan[$nama_barang])) {
                $laporan[$nama_barang] = [
                    'masuk' => 0,
                    'keluar' => 0,
                    'rusak' => 0,
                    'stok' => $stok_barang[$nama_barang] ?? 0,
                    'satuan' => $satuan[$nama_barang] ?? 'Satuan Tidak Ada',
                    'kategori' => $item->nama_kategori ?? 'Kategori Tidak Ada',
                ];
            }
            $laporan[$nama_barang]['rusak'] += $item->jumlah_rusak;
        }

        // Kirim data ke view
        $this->data['no'] = 1;
        $this->data['laporan'] = $laporan;
        $this->data['tanggal'] = $tanggal_input;
        $this->data['title'] = 'Laporan Barang';
        $this->load->view('laporan/lihat', $this->data);
    }

    public function export() {
        $dompdf = new Dompdf();
        
        // Ambil tanggal dari input
        $tanggal_input = $this->input->post('tanggal') ?? '';

        // Konversi tanggal dari 'd/m/Y' ke 'Y-m-d'
        $dateTime = DateTime::createFromFormat('d/m/Y', $tanggal_input);
        if ($dateTime !== false) {
            $tanggal = $dateTime->format('d/m/Y');  // Format tanggal
        } else {
            $tanggal = null;
        }

        // Ambil data penerimaan, pengeluaran, dan barang rusak berdasarkan tanggal
        if ($tanggal) {
            $penerimaan = $this->m_detail_terima->lihat_by_date($tanggal);
            $pengeluaran = $this->m_detail_keluar->lihat_by_date($tanggal);
            $barang_rusak = $this->m_barang_rusak->lihat_by_date($tanggal);
        } else {
            $penerimaan = $this->m_detail_terima->lihat_all();
            $pengeluaran = $this->m_detail_keluar->lihat_all();
            $barang_rusak = $this->m_barang_rusak->lihat();
        }

        // Ambil stok barang
        $all_barang = $this->m_barang->lihat();
        $stok_barang = [];
        foreach ($all_barang as $barang) {
            $stok_barang[$barang->nama_barang] = $barang->stok;
            $satuan[$barang->nama_barang] = $barang->satuan;
        }

        // Gabungkan data, termasuk kategori
        $laporan = [];

        // Proses penerimaan
        foreach ($penerimaan as $item) {
            $nama_barang = $item['nama_barang'];
            if (!isset($laporan[$nama_barang])) {
                $laporan[$nama_barang] = [
                    'masuk' => 0,
                    'keluar' => 0,
                    'rusak' => 0,
                    'stok' => $stok_barang[$nama_barang] ?? 0,
                    'satuan' => $satuan[$nama_barang] ?? 'Satuan Tidak Ada',
                    'kategori' => $item['nama_kategori'] ?? 'Kategori Tidak Ada',
                ];
            }
            $laporan[$nama_barang]['masuk'] += $item['jumlah'];
        }

        // Proses pengeluaran
        foreach ($pengeluaran as $item) {
            $nama_barang = $item['nama_barang'];
            if (!isset($laporan[$nama_barang])) {
                $laporan[$nama_barang] = [
                    'masuk' => 0,
                    'keluar' => 0,
                    'rusak' => 0,
                    'stok' => $stok_barang[$nama_barang] ?? 0,
                    'satuan' => $satuan[$nama_barang] ?? 'Satuan Tidak Ada',
                    'kategori' => $item['nama_kategori'] ?? 'Kategori Tidak Ada',
                ];
            }
            $laporan[$nama_barang]['keluar'] += $item['jumlah'];
        }

        // Proses barang rusak
        foreach ($barang_rusak as $item) {
            $nama_barang = $item->nama_barang;
            if (!isset($laporan[$nama_barang])) {
                $laporan[$nama_barang] = [
                    'masuk' => 0,
                    'keluar' => 0,
                    'rusak' => 0,
                    'stok' => $stok_barang[$nama_barang] ?? 0,
                    'satuan' => $satuan[$nama_barang] ?? 'Satuan Tidak Ada',
                    'kategori' => $item->nama_kategori ?? 'Kategori Tidak Ada',
                ];
            }
            $laporan[$nama_barang]['rusak'] += $item->jumlah_rusak;
        }

        // Set data untuk di-export ke PDF
        $this->data['laporan'] = $laporan;
        $this->data['title'] = 'Laporan Barang Tanggal ' . ($tanggal_input ? $tanggal_input : 'Semua');
        $this->data['no'] = 1;

        // Buat halaman HTML dari view
        $html = $this->load->view('laporan/report', $this->data, true);

        // Atur orientasi dan ukuran kertas PDF
        $dompdf->setPaper('A4', 'Landscape');
        $dompdf->load_html($html);
        $dompdf->render();

        // Ekspor PDF
        $dompdf->stream('Laporan Barang Tanggal ' . ($tanggal_input ? $tanggal_input : 'Semua') . ' - ' . date('d F Y'), array("Attachment" => false));
    }
}
