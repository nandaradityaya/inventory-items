<script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
    $("#tanggal").datepicker({
        dateFormat: 'dd/mm/yy', // pastikan format sesuai dengan yang diharapkan
        onSelect: function(dateText) {
            // Optional: Mengupdate nilai input atau melakukan aksi lain ketika tanggal dipilih
        }
    });
});
</script>
