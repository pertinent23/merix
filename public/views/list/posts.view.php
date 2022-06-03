<?php 
    use App\modules\AppPacker\AppPacker;
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../../static/assets/icons/icon.64.png" alt="web site icon">
        <p> annonces </p>
    </section>
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>
<main class="w-100 d-flex flex-column">
    <section class="d-flex content-page-options flex-column align-items-center">
        <div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row">
            <div class="list-item-content-image">
                <img src="../../static/assets/images/Screenshot from 2022-06-01 14-46-58.png" alt="test">
            </div>
            <div class="list-item-content-data d-flex flex-column justify-content-center">
                <span> Un short text </span>
                <p> a long text to describe the content </p>
                <div class="list-item-button-container d-flex align-items-center">
                    <button>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span> SUPPRIMER </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row">
            <div class="list-item-content-image d-flex justify-content-center align-items-center">
                <div class="list-item-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>
            </div>
            <div class="list-item-content-data d-flex flex-column justify-content-center">
                <span> Un short text </span>
                <p> a long text to describe the content </p>
                <div class="list-item-button-container d-flex align-items-center">
                    <button>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span> SUPPRIMER </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row">
            <div class="list-item-content-image d-flex justify-content-center align-items-center">
                <div class="list-item-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>
            </div>
            <div class="list-item-content-data d-flex flex-column justify-content-center">
                <span> Un short text </span>
                <div class="list-item-button-container d-flex align-items-center">
                    <button>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span> SUPPRIMER </span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>