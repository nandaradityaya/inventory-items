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
                            <a href="<?= base_url('kategori') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header"><strong>Ubah Data Kategori!</strong></div>
                                <div class="card-body">
                                    <form action="<?= base_url('kategori/proses_ubah/' . $kategori->id_kategori) ?>" method="POST">
                                        <div class="form-group">
                                            <label for="nama_kategori"><strong>Nama Kategori</strong></label>
                                            <input type="text" name="nama_kategori" placeholder="Masukkan Nama Kategori" class="form-control" value="<?= $kategori->nama_kategori ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                    </form>
                                </div>
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
