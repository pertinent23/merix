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
                <i class="bi bi-globe"></i>
                <span> Nom </span>
            </div>
            <p class="list-item-text"> nom de l'utilisateur </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-envelope-plus-fill"></i>
                <span> Email </span>
            </div>
            <p class="list-item-text"> email de l'utilisateur </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-shield-lock-fill"></i>
                <span> Mot de passe </span>
            </div>
            <p class="list-item-text"> Mot de passe de l'utilisateur </p>
        </div>
    </section>
</main>