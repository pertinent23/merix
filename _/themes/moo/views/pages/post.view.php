<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\AppFileManager\AppFileManager;
    use App\modules\theme\AppThemeManager\AppThemeManager;

    $id = AppGlobal::get( 's' ) ? AppGlobal::get( 's' ) : $s;
    $list =  AppThemeManager::getPosts( intval( $id )  );
?>
<nav class="w-100 d-flex align-items-center navbar flex-column">
    <section class="navbar-brand d-flex align-items-center">
        <i class="bi bi-building"></i>
        <p class="navbar-title"> Annonces </p>
        <span class="bar"></span>
    </section>
    <section class="navbar-container d-flex align-items-center space">
        <a href="index" class="navbar-item d-flex align-items-center justify-content-center" id="home">
            <p> Accueil </p>
        </a>
        <a href="tourism" class="navbar-item d-flex align-items-center justify-content-center" id="tourism">
            <p> Tourisme </p>
        </a>
        <a href="employee" class="navbar-item d-flex align-items-center justify-content-center" id="emmployees">
            <p> Personnel </p>
        </a>
        <a href="other" class="navbar-item d-flex align-items-center justify-content-center" id="others">
            <p> Autre </p>
        </a>
    </section>
</nav>
<main class="w-100 d-flex flex-column align-items-center content-item-data">
    <section class="w-100 d-flex justify-content-center align-items-center page-item-container">
        <?php 
            if ( !count( $list) ) AppPacker::renderThemeView( 'all-black', 'not' );

            foreach( $list as $item )  {
                $img = $item->getFileList()->current();
                ?> 
                    <div class="w-100 d-flex flex-column page-item">
                        <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                            <img 
                                src="<?= AppFileManager::getLink( $img->getUrl() ) ?>" 
                                class="page-item-image w-100"
                            />
                        </div>
                        <div class="w-100 d-flex flex-column align-items-center page-item-data-container">
                            <h1> <?= $item->getLabel() ?> </h1>
                            <h3> <?= $item->getCreatedDate() ?> </h3>
                            <p> <?= $item->getDescription() ?> </p>
                        </div>
                    </div>
                <?php
            }
        ?>
    </section>
</main>