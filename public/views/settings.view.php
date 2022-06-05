<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\AppFileManager\AppFileManager;

    $site_id = AppGlobal::get( 's' );
    $user_id = AppGlobal::get( 'i' );

    if ( !$site_id OR !$user_id ) {
        AppPacker::redirectTo( 'account/sites' );
    }

    $data = [
        's' => $site_id,
        'i' => $user_id,
        't' => AppTheme::getThemeOfSite( $site_id )
    ];
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
            <a href="<?= AppFileManager::getLink( 'account/deploy', $data ) ?>" class="d-flex align-items-center justify-content-center button">
                <i class="bi bi-cloud-upload-fill"></i>
                <span> DEPLOYER </span>
            </a>
        </div>
    </div>
</main>