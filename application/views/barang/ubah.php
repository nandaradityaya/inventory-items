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
								<form action="<?= base_url('barang/proses_ubah/' . $barang->kode_barang) ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="kode_barang"><strong>Serial Number</strong></label>
											<input type="text" name="kode_barang" placeholder="Masukkan Serial Number" autocomplete="off"  class="form-control" required value="<?= $barang->kode_barang ?>" maxlength="8" readonly>
										</div>
										<div class="form-group col-md-6">
											<label for="nama_barang"><strong>Nama Barang</strong></label>
											<input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" autocomplete="off"  class="form-control" required value="<?= $barang->nama_barang ?>">
										</div>
										<div class="form-group col-md-12">
                                            <label for="id_kategori"><strong>Kategori</strong></label>
                                            <select name="id_kategori" class="form-control" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($all_kategori as $kategori): ?>
                                                    <option value="<?= $kategori->id_kategori ?>" <?= $kategori->id_kategori == $barang->id_kategori ? 'selected' : '' ?>><?= $kategori->nama_kategori ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="stok"><strong>Stok</strong></label>
											<input type="number" name="stok" placeholder="Masukkan Stok" autocomplete="off"  class="form-control" required value="<?= $barang->stok ?>">
										</div>
										<div class="form-group col-md-6">
											<label for="satuan"><strong>Satuan</strong></label>
											<select name="satuan" id="satuan" class="form-control" required>
												<option value="">-- Silahkan Pilih --</option>
												<option value="pcs" <?= $barang->satuan == 'pcs' ? 'selected' : '' ?>>PCS</option>
												<option value="unit" <?= $barang->satuan == 'unit' ? 'selected' : '' ?>>UNIT</option>
												<option value="pac" <?= $barang->satuan == 'pac' ? 'selected' : '' ?>>PAC</option>
												<option value="dus" <?= $barang->satuan == 'dus' ? 'selected' : '' ?>>DUS</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="keterangan"><strong>Keterangan</strong></label>
											<input type="text" name="keterangan" placeholder="Masukkan Keterangan" autocomplete="off"  class="form-control" value="<?= $barang->keterangan ?>">
										</div>
									</div>
									<hr>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
									</div>
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