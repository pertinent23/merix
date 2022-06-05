<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\AppTheme\AppTheme;

    $list = AppTheme::getThemeList();
    $theme_map = [];

    foreach ( $list as $theme ) {
        $data = AppTheme::getThemeData( $theme );
        array_push( $theme_map, [
            'name' => $theme,
            'img' => AppTheme::getAssetsPath( $theme, $data[ 'preview' ] )
        ] );
    }
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
        <div class="theme-item d-none flex-column align-items-center justify-content-center">
            <div class="add-theme d-flex justify-content-center align-items-center">
                <i class="bi bi-plus-circle-dotted"></i>
            </div>
            <span class="theme-add-title"> AJOUTER </span>
        </div>
        <!--div class="theme-item d-flex flex-column align-items-center justify-content-center">
            <img src="../static/assets/images/Screenshot from 2022-06-01 14-46-58.png" alt="theme mockup">
            <div class="theme-content-action d-flex justify-content-center align-items-center">
                <button class="d-flex align-items-center">
                    <i class="bi bi-shuffle"></i>
                    <span> APPLIQUER </span>
                </button>
            </div>
        </div-->
        <?php 
            foreach ( $theme_map as $data ) {
                ?>
                    <div class="theme-item d-flex flex-column align-items-center justify-content-center">
                        <img src="<?= $data[ 'img' ] ?>" alt="theme mockup">
                        <div class="theme-content-action d-flex justify-content-center align-items-center">
                            <button class="d-flex align-items-center">
                                <i class="bi bi-shuffle"></i>
                                <span> APPLIQUER </span>
                            </button>
                        </div>
                    </div>
                <?php
            }
        ?>
    </section>
</main>