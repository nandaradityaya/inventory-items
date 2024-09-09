<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partials/head.php') ?>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('partials/sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('partials/topbar.php') ?>
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('kategori/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Kategori</a>
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
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="card shadow">
                        <div class="card-header"><strong>Daftar Kategori</strong></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Kategori</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($all_kategori as $kategori): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $kategori->nama_kategori ?></td>
                                                <td>
                                                    <a href="<?= base_url('kategori/ubah/' . $kategori->id_kategori) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                                    <a onclick="return confirm('Apakah Anda yakin?')" href="<?= base_url('kategori/hapus/' . $kategori->id_kategori) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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
            <?php $this->load->view('partials/footer.php') ?>
        </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
</body>
</html>
