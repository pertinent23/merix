<?php 
    use App\modules\AppPacker\AppPacker;
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../static/assets/icons/icon.outline.64.png" alt="web site icon">
        <p> themes </p>
    </section>
    <input type="hidden" id="nav-knowledge" value="themes">
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>
<main class="w-100 d-flex flex-column">
    <section class="d-flex content-page-options justify-content-center">
        <div class="theme-item d-flex flex-column align-items-center justify-content-center">
            <div class="add-theme d-flex justify-content-center align-items-center">
                <i class="bi bi-plus-circle-dotted"></i>
            </div>
            <span class="theme-add-title"> AJOUTER </span>
        </div>
        <div class="theme-item d-flex flex-column align-items-center justify-content-center">
            <img src="../static/assets/images/screely-1653749724276.png" alt="theme mockup">
            <div class="theme-content-action d-flex justify-content-center align-items-center">
                <button class="d-flex align-items-center">
                    <i class="bi bi-shuffle"></i>
                    <span> APPLIQUER </span>
                </button>
            </div>
        </div>
    </section>
</main>