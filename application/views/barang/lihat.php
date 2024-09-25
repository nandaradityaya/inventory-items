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
							<!-- <a href="<?= base_url('barang/export') ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a> -->
							<a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
					</div>
				</div>
				<hr>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<div class="card shadow">

					<div class="card-header">
						<div class="d-flex align-items-center justify-content-between">
							<strong>Daftar Barang</strong>
							<form action="<?= site_url('barang/index') ?>" method="post"> 
								<label for="tanggal_awal">Tanggal Awal:</label>
								<input type="text" autocomplete="off" id="tanggal_awal" name="tanggal_awal" value="<?= isset($tanggal_awal) ? $tanggal_awal : '' ?>" placeholder="dd/mm/yyyy">
								
								<label for="tanggal_akhir">Tanggal Akhir:</label>
								<input type="text" autocomplete="off" id="tanggal_akhir" name="tanggal_akhir" value="<?= isset($tanggal_akhir) ? $tanggal_akhir : '' ?>" placeholder="dd/mm/yyyy">
								
								<button type="submit" class="btn btn-primary btn-sm ml-2">
									<i class="fa fa-filter"></i>&nbsp;&nbsp;Filter
								</button>
							</form>
						</div>
						
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No</td>
										<td>Serial Number</td>
										<td>Nama Barang</td>
										<td>Kategori</td>
										<td>Stok</td>
										<!-- <td>Status</td> -->
										<td>Keterangan</td>						
										<td>Aksi</td>		
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_barang as $barang): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $barang->kode_barang ?></td>
											<td><?= $barang->nama_barang ?></td>
											<td><?= $barang->nama_kategori ?></td>
											<!-- <td><?= $barang->stok ?> <?= strtoupper($barang->satuan) ?></td> -->
											<td>
												<?php if ($barang->stok < 10): ?>
													<span class="badge badge-danger"><?= $barang->stok ?> <?= strtoupper($barang->satuan) ?></span>
												<?php else: ?>
													<span class="badge badge-success"><?= $barang->stok ?> <?= strtoupper($barang->satuan) ?></span>
												<?php endif; ?>
											</td>
											<td><?= $barang->keterangan ?></td>
												<td>
													<a href="<?= base_url('barang/ubah/' . $barang->kode_barang) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></i>&nbsp;&nbsp;Edit</a>
													<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('barang/hapus/' . $barang->kode_barang) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
												</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
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
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

	<script>
		$(function() {
			// Inisialisasi datepicker untuk tanggal_awal
			$("#tanggal_awal").datepicker({
				dateFormat: "dd/mm/yy", // Format tanggal yang akan ditampilkan
				changeMonth: true,
				changeYear: true,
				onClose: function(selectedDate) {
					// Atur minimal tanggal untuk tanggal_akhir setelah tanggal_awal dipilih
					$("#tanggal_akhir").datepicker("option", "minDate", selectedDate);
				}
			});

			// Inisialisasi datepicker untuk tanggal_akhir
			$("#tanggal_akhir").datepicker({
				dateFormat: "dd/mm/yy",
				changeMonth: true,
				changeYear: true,
				onClose: function(selectedDate) {
					// Atur maksimal tanggal untuk tanggal_awal setelah tanggal_akhir dipilih
					$("#tanggal_awal").datepicker("option", "maxDate", selectedDate);
				}
			});
		});
	</script>

</body>
</html>