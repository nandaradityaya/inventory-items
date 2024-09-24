<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('barang') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
							<form action="<?= base_url('barang_rusak/proses_edit/' . $barang_rusak->id) ?>" method="POST">
    <div class="form-group">
        <label for="id_barang">Pilih Barang</label>
        <select name="id_barang" id="id_barang" class="form-control" required>
            <?php foreach($barang as $brg): ?>
                <option value="<?= $brg->id ?>" <?= ($brg->id == $barang_rusak->id_barang) ? 'selected' : '' ?>>
                    <?= $brg->kode_barang ?> - <?= $brg->nama_barang ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah_rusak">Jumlah Rusak</label>
        <input type="number" name="jumlah_rusak" id="jumlah_rusak" class="form-control" value="<?= $barang_rusak->jumlah_rusak ?>" required>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control" required><?= $barang_rusak->keterangan ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>


							</div>				
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
</body>
</html>