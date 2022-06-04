<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppSiteItem\AppSiteItem;

    $site_id = AppGlobal::get( 's' );

    if ( !$site_id ) {
        AppPacker::redirectTo( 'account/sites' );
    }

    $item = AppSiteItem::get( intval( $site_id ) );
    if ( !( $item instanceof  AppSiteItem ) ) {
        AppPacker::redirectTo( 'account/sites' );
    }
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
            <p class="list-item-text"> <?= $item->getName() ?> </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-journal-text"></i>
                <span> Slogan </span>
            </div>
            <p class="list-item-text"> <?= $item->getSlogan() ?> </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-globe2"></i>
                <span> Pays </span>
            </div>
            <p class="list-item-text"> <?= $item->getCountry() ?> </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-geo-fill"></i>
                <span> Commune </span>
            </div>
            <p class="list-item-text"> <?= $item->getDistrict() ?> </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-geo-alt-fill"></i>
                <span> Quartier </span>
            </div>
            <p class="list-item-text"> <?= $item->getPosition() ?> </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-book-half"></i>
                <span> Histoire </span>
            </div>
            <p class="list-item-text"> <?= $item->getHistory() ?> </p>
        </div>
    </section>
</main>