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
<main class="preview-container w-100 d-flex flex-column">
    <div class="w-100 preview-nav d-flex flex-colum justify-content-between align-items-center">
        <div class="preview-nav-brand d-flex align-items-center">
            <img src="../static/assets/icons/icon.64.png" alt="web site icon">
            <p> Preview </p>
        </div>
        <a href="<?= AppFileManager::getLink( 'account/dashboard', $data ) ?>" class="preview-nav-content-button d-flex justify-content-center align-items-center">
            <button class="preview-nav-button d-flex justify-content-center align-items-center">
                <i class="bi bi-easel3-fill"></i>
                <span> DASHBOARD </span>
            </button>
        </a>
    </div>
    <div class="w-100 preview-data d-flex flex-column justify-content-center align-items-center">
        <iframe src="dashboard" frameborder="0" class="w-100 preview-frame"></iframe>
    </div>
</main>