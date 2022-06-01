<?php 
    use App\modules\AppFileManager\AppFileManager;
?>
<section class="navbar-container d-flex align-items-center justify-content-center">
    <a href="<?= AppFileManager::getLink( 'account/themes' ) ?>" class="d-flex align-items-center navbar-item" id="themes">
        <i class="bi bi-palette-fill"></i>
        <p class="d-none d-sm-flex"> THEMES </p>
    </a>
    <a href="<?= AppFileManager::getLink( 'account/dashboard' ) ?>" class="d-flex align-items-center navbar-item" id="dashboard">
        <i class="bi bi-easel3-fill"></i>
        <p class="d-none d-sm-flex"> DASHBOARD </p>
    </a>
    <a href="<?= AppFileManager::getLink( 'account/settings' ) ?>" class="d-flex align-items-center navbar-item" id="settings">
        <i class="bi bi-gear-wide-connected"></i>
        <p class="d-none d-sm-flex"> PARAMETRES </p>
    </a>
</section>