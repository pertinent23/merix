<?php 
    use App\modules\AppFileManager\AppFileManager;
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;

    $site_id = AppGlobal::get( 's' );
    $user_id = AppGlobal::get( 'i' );

    if ( !$site_id OR !$user_id ) {
        AppPacker::redirectTo( 'account/sites' );
    }

    $data = [
        's' => $site_id,
        'i' => $user_id
    ];
?>
<section class="navbar-container d-flex align-items-center justify-content-center">
    <a href="<?= AppFileManager::getLink( 'account/themes', $data ) ?>" class="d-flex align-items-center navbar-item" id="themes">
        <i class="bi bi-palette-fill"></i>
        <p class="d-none d-sm-flex"> THEMES </p>
    </a>
    <a href="<?= AppFileManager::getLink( 'account/dashboard', $data ) ?>" class="d-flex align-items-center navbar-item" id="dashboard">
        <i class="bi bi-easel3-fill"></i>
        <p class="d-none d-sm-flex"> DASHBOARD </p>
    </a>
    <a href="<?= AppFileManager::getLink( 'account/settings', $data ) ?>" class="d-flex align-items-center navbar-item" id="settings">
        <i class="bi bi-gear-wide-connected"></i>
        <p class="d-none d-sm-flex"> PARAMETRES </p>
    </a>
</section>