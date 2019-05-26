<!-- FOOTER -->
<footer class="bg-dark text-white mt-5">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <p>Dibuat Oleh tim IT KIR 13 . Copyright &copy; <?= date('Y'); ?></p>
            </div>
        </div>
    </div>
</footer>

<?php foreach ($script as $s) : ?>
    <script src="<?= $s['src']; ?>"></script>
<?php endforeach; ?>

<script>
    $('.custom-file-input').on('change', function() {
        let namaFile = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(namaFile);
    });
</script>

</body>

</html>