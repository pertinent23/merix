<?php 
    use App\modules\AppPacker\AppPacker;
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../static/assets/icons/icon.64.png" alt="web site icon">
        <p> Merix </p>
    </section>
    <input type="hidden" id="nav-knowledge" value="settings">
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>
<main class="w-100 d-flex justify-content-center">
    <div class="w-100 settings-item-container d-flex align-items-center justify-content-center">
        <div class="settings-item d-flex justify-content-center align-items-center">
            <input type="checkbox" id="_id1" class="d-none" checked>
            <label for="_id1">
                <span></span>
            </label>
            <span class="title"> par défaut </span>
        </div>
        <div class="settings-item d-flex justify-content-center align-items-center">
            <input type="checkbox" id="_id2" class="d-none" checked>
            <label for="_id2">
                <span></span>
            </label>
            <span class="title"> theme choisit </span>
        </div>
        <div class="settings-item d-flex justify-content-center align-items-center">
            <button class="d-flex align-items-center justify-content-center">
                <i class="bi bi-cloud-upload-fill"></i>
                <span> DEPLOYER </span>
            </button>
        </div>
    </div>
</main>