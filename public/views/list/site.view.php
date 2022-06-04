<?php 
    use App\modules\AppPacker\AppPacker;
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../../static/assets/icons/icon.64.png" alt="web site icon">
        <p> mon compte </p>
    </section>
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>
<main class="w-100 d-flex flex-column">
    <section class="d-flex content-page-options flex-column align-items-center">
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-file-earmark-person"></i>
                <span> Nom </span>
            </div>
            <p class="list-item-text"> nom de la mairie </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-journal-text"></i>
                <span> Slogan </span>
            </div>
            <p class="list-item-text"> slogan de la marie </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-globe2"></i>
                <span> Pays </span>
            </div>
            <p class="list-item-text"> pays de la marie </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-geo-fill"></i>
                <span> Commune </span>
            </div>
            <p class="list-item-text"> Commune de la marie </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-geo-alt-fill"></i>
                <span> Quartier </span>
            </div>
            <p class="list-item-text"> quartier de la marie </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-book-half"></i>
                <span> Histoire </span>
            </div>
            <p class="list-item-text"> histoire de la marie </p>
        </div>
    </section>
</main>