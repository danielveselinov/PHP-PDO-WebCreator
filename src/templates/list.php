<section class="d-flex flex-column justify-content-center align-items-center vh-100 bg-image-custom">
    <p class="display-4 text-white text-uppercase">list of All companies</p>
    <div class="container">
        <div class="row">
            <?php require_once __DIR__ . "/../components/companies.php"; ?>
        </div>
    </div>
    <a href="<?= PATH ?>start" class="btn btn-outline-light btn-lg text-uppercase">Retrun back</a>
</section>