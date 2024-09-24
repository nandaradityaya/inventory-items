<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partials/head.php') ?>
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Load Sidebar -->
        <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Load Topbar -->
                <?php $this->load->view('partials/topbar.php') ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Rusak</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('barang_rusak/proses_tambah') ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_barang">Pilih Barang</label>
                                    <select name="id_barang" id="id_barang" class="form-control" required>
                                        <option value="" disabled selected>Silahkan pilih barang</option>
                                        <?php foreach($barang as $brg): ?>
                                            <option value="<?= $brg->id ?>" data-nama="<?= $brg->nama_barang ?>">
                                                <?= $brg->kode_barang ?> - <?= $brg->nama_barang ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" name="kode_barang" id="kode_barang" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_rusak">Jumlah Rusak</label>
                                    <input type="number" name="jumlah_rusak" id="jumlah_rusak" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Load Footer -->
            <?php $this->load->view('partials/footer.php') ?>
        </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
    <script>
        document.getElementById('id_barang').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var namaBarang = selectedOption.getAttribute('data-nama');

            // Mengisi input nama_barang dengan nama barang yang dipilih
            document.getElementById('nama_barang').value = namaBarang;
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const idBarangSelect = document.getElementById('id_barang');
            const kodeBarangInput = document.getElementById('kode_barang');

            idBarangSelect.addEventListener('change', function () {
                const selectedOption = idBarangSelect.options[idBarangSelect.selectedIndex];
                const kodeBarang = selectedOption.value ? selectedOption.text.split(' - ')[0] : ''; // Mengambil kode barang
                kodeBarangInput.value = kodeBarang; // Memasukkan kode barang ke dalam input
            });
        });
    </script>

</body>
</html>
