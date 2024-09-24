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
                <div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
							<!-- <a href="<?= base_url('barang_rusak/export') ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a> -->
							<a href="<?= base_url('barang_rusak/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang Rusak</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Serial Number</td>
                                            <td>Nama Barang</td>
                                            <td>Jumlah Rusak</td>
                                            <td>Keterangan</td>
                                            <td>Tanggal</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($barang_rusak)): ?>
                                            <?php $no = 1; foreach ($barang_rusak as $rusak): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $rusak->kode_barang ?></td>
                                                    <td><?= $rusak->nama_barang ?></td>
                                                    <td><?= $rusak->jumlah_rusak ?></td>
                                                    <td><?= $rusak->keterangan ?></td>
                                                    <td><?= $rusak->tanggal ?></td>
                                                    <td>
                                                        <!-- <a href="<?= base_url('barang_rusak/edit/' . $rusak->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></i>&nbsp;&nbsp;Edit</a> -->
                                                        <a href="<?= base_url('barang_rusak/delete/' . $rusak->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Belum ada data barang rusak</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Load Footer -->
            <?php $this->load->view('partials/footer.php') ?>
        </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
    <script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>
