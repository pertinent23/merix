<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppActivityItem\AppActivityItem;

    $site_id = AppGlobal::get( 's' );

    if ( !$site_id ) {
        AppPacker::redirectTo();
    }

    $list = AppActivityItem::gets( intval( $site_id ) );
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../../static/assets/icons/icon.64.png" alt="web site icon">
        <p> activités </p>
    </section>
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>
<main class="w-100 d-flex flex-column">
    <section class="d-flex content-page-options flex-column align-items-center">
        <?php 
            foreach ( $list as $item ) {
                AppPacker::render( 'items/activity.item', [
                    'item' => $item
                ] );
            }

            if ( !count( $list ) ) {
                AppPacker::render( 'items/notfound.item' );
            }
        ?>
    </section>
</main>