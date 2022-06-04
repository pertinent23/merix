<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppUserItem\AppUserItem;

    $user_id = AppGlobal::get( 'i' );

    if ( !$user_id ) {
        AppPacker::redirectTo( 'account/sites' );
    }

    $item = AppUserItem::get( intval( $user_id ) );
    if ( !( $item instanceof  AppUserItem ) ) {
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
                <i class="bi bi-globe"></i>
                <span> Nom </span>
            </div>
            <p class="list-item-text"> <?= $item->getName() ?> </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-envelope-plus-fill"></i>
                <span> Email </span>
            </div>
            <p class="list-item-text"> <?= $item->getEmail() ?> </p>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column">
            <div class="d-flex w-100 align-items-center list-item-label">
                <i class="bi bi-shield-lock-fill"></i>
                <span> Mot de passe </span>
            </div>
            <p class="list-item-text"> <?= $item->getPassword() ?> </p>
        </div>
    </section>
</main>