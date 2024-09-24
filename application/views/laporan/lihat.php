<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
	<link href="<?= base_url('datatable/css/dataTables.bootstrap5.min.css')?>" rel="stylesheet" />
	
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
					<!-- <div class="float-right">
							<a href="<?= base_url('laporan/export') ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
					</div> -->
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
						<!-- <form action="<?= site_url('laporan/index') ?>" method="post">
                            <label for="tanggal">Filter Tanggal:</label>
                            <input type="text" autocomplete="off" id="tanggal" name="tanggal" value="<?= $tanggal ?>" placeholder="dd/mm/yyyy">
                            <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fa fa-filter"></i>&nbsp;&nbsp;Filter</button>
                        </form> -->

						<form action="<?= site_url('laporan/index') ?>" method="post">
    <label for="tanggal_awal">Tanggal Awal:</label>
    <input type="text" autocomplete="off" id="tanggal_awal" name="tanggal_awal" value="<?= $tanggal_awal ?>" placeholder="dd/mm/yyyy">
    
    <label for="tanggal_akhir">Tanggal Akhir:</label>
    <input type="text" autocomplete="off" id="tanggal_akhir" name="tanggal_akhir" value="<?= $tanggal_akhir ?>" placeholder="dd/mm/yyyy">
    
    <button type="submit" class="btn btn-primary btn-sm ml-2">
        <i class="fa fa-filter"></i>&nbsp;&nbsp;Filter
    </button>
</form>


						</div>
					</div>
					<div class="card-body">

                        <div class="table-responsive">
                            <?php if (!empty($laporan)): ?>
                                <table class="table table-bordered" id="dataTableLaporan" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
											<th>Stok</th>
											<th>Kategori</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Jumlah Barang Rusak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($laporan as $nama_barang => $data): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $nama_barang ?></td>
												<td>
													<?php if ($data['stok'] < 10): ?>
														<span class="badge badge-danger"><?= number_format($data['stok']); ?> <?= strtoupper ($data['satuan']); ?></span>
													<?php else: ?>
														<span class="badge badge-success"><?= number_format($data['stok']); ?> <?= strtoupper ($data['satuan']); ?></span>
													<?php endif; ?>
												</td>
												<td><?= htmlspecialchars($data['kategori']) ?></td>
                                                <td><?= isset($data['masuk']) ? $data['masuk'] : 0 ?></td>
                                                <td><?= isset($data['keluar']) ? $data['keluar'] : 0 ?></td>
												<td><?= isset($data['rusak']) ? $data['rusak'] : 0 ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>Tidak ada data untuk ditampilkan.</p>
                            <?php endif; ?>
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
	<!-- <script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

	<script src="<?= base_url('datatable/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?= base_url('datatable/js/dataTables.bootstrap5.min.js')?>"></script>
	<script>
		$(document).ready(function () {
			$("#dataTableLaporan").DataTable({
				dom: '<"row top"<"col-lg-4 col-md-4 col-sm-12 mb-2"B><"col-lg-4 col-md-4 col-sm-12 mb-2"l><"col-lg-4 col-md-4 col-sm-12 mb-2"f>>rtip',
				buttons: ['csv', 'excel', 'pdf', 'print']
			});
			table.buttons().container()
				.appendTo('#dataTableLaporan_wrapper .col-md-6:eq(0)');
		});
	</script>

<!-- Sertakan jQuery dan jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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