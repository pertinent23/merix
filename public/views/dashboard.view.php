<?php 
    use App\modules\AppPacker\AppPacker;
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../static/assets/icons/icon.64.png" alt="web site icon">
        <p> Merix </p>
    </section>
    <input type="hidden" id="nav-knowledge" value="dashboard">
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>
<main class="w-100 d-flex flex-column">
    <section class="d-flex content-page-options justify-content-center">
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-house-fill"></i>
            </div>
            <span class="page-option-title"> MARIE </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-arrow-repeat"></i>
                </a>
            </div>
            <p class="page-option-description">
                Modifier les informations de la mairie
            </p>
        </div>
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-folder-symlink-fill"></i>
            </div>
            <span class="page-option-title"> PROJETS </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-patch-plus-fill"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-trash-fill"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-view-list"></i>
                </a>
            </div>
            <p class="page-option-description">
                Ajouter ou supprimer les projet de la Mairie
            </p>
        </div>
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-basket-fill"></i>
            </div>
            <span class="page-option-title"> PUBLICITE </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-cart-plus-fill"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-trash3-fill"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-card-list"></i>
                </a>
            </div>
            <p class="page-option-description">
                Gérer les publicités de votre mairie
            </p>
        </div>
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-building"></i>
            </div>
            <span class="page-option-title"> Tourisme </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-card-heading"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-patch-plus-fill"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-trash3-fill"></i>
                </a>
            </div>
            <p class="page-option-description">
                Gérer vos lieux touristiques de votre mairie
            </p>
        </div>
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-braces-asterisk"></i>
            </div>
            <span class="page-option-title"> ANNONCES </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-card-heading"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-brush-fill"></i>
                </a>
            </div>
            <p class="page-option-description">
                Gérer les annonces(maria, décès...) de votre mairie
            </p>
        </div>
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-sunset-fill"></i>
            </div>
            <span class="page-option-title"> ACTIVITES </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-view-list"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-tags-fill"></i>
                </a>
            </div>
            <p class="page-option-description">
                Gérer les activités de votre mairie
            </p>
        </div>
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-file-earmark-person-fill"></i>
            </div>
            <span class="page-option-title"> PERSONNEL </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-lines-fill"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-plus-fill"></i>
                </a>
            </div>
            <p class="page-option-description">
                Ajouter du membre du personnel et les administrer
            </p>
        </div>
        <div class="page-option d-flex flex-column align-items-center justify-content-between">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-person-rolodex"></i>
            </div>
            <span class="page-option-title"> MON COMPTE </span>
            <div class="page-option-action-list d-flex justify-content-center align-items-center">
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-postcard-fill"></i>
                </a>
                <a href="#" class="page-option-action d-flex justify-content-center align-items-center">
                    <i class="bi bi-vector-pen"></i>
                </a>
            </div>
            <p class="page-option-description">
                Gerer les informations de son compte
            </p>
        </div>
    </section>
</main>