<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppSiteItem\AppSiteItem;

    $user_id = AppGlobal::get( 'i' );

    if ( !$user_id ) {
        AppPacker::redirectTo();
    }

    $list = AppSiteItem::gets( intval( $user_id ) );
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../static/assets/icons/icon.64.png" alt="web site icon">
        <p> sites </p>
    </section>
</nav>
<main class="w-100 d-flex flex-column">
    <section class="d-flex content-page-options justify-content-center">
        <div class="page-option page-item d-flex flex-column align-items-center justify-content-center" id="add-new">
            <div class="page-option-icon d-flex justify-content-center align-items-center">
                <i class="bi bi-window-plus"></i>
            </div><br>
            <span class="page-item-title"> CREER </span>
        </div>
        <?php 
            foreach ( $list as $item ) {
                AppPacker::render( 'items/site.item', [
                    'data' => $item
                ] );
            }
        ?>
    </section>
</main>