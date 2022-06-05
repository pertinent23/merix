<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\AppThemeManager\AppThemeManager;
    use App\modules\theme\entity\AppEmployeeItem\AppEmployeeItem;

    $id = AppGlobal::get( 's' ) ? AppGlobal::get( 's' ) : 0;
    $res =  AppThemeManager::getEmployees( $id  );
    $site = AppThemeManager::getSite( $id );
    $list = array_filter( $res, function ( AppEmployeeItem $item ) {
        $role = $item->getRole();
        if ( $role->getLabel() === 'mayor' || $role->getLabel() === 'deputy-mayor'  ) {
            return true;
        }
    } );
?>
<nav class="w-100 d-flex align-items-center navbar flex-column">
    <section class="navbar-brand d-flex align-items-center">
        <i class="bi bi-building"></i>
        <p class="navbar-title"> <?= $site->getName() ?> </p>
        <span class="bar"></span>
    </section>
    <section class="navbar-container d-flex align-items-center space">
        <a href="index" class="navbar-item d-flex align-items-center justify-content-center active" id="home">
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
    <h1 class="page-bar"></h1>
    <div class="w-100 d-flex flex-column flex-md-row justify-content-center align-items-center page-presentation">
        <div class="page-presentation-image d-flex justify-content-center align-items-center">
            <div class="page-presentation-image-container d-flex justify-content-center align-items-center">
                <img
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'eyasu-etsub-j3R9C-Xqe1w-unsplash.jpg' ) ?>" 
                    alt="Mairie Image"
                    class="w-100"
                >
            </div>
        </div>
        <div class="page-presentation-data d-flex flex-column">
            <h1> Nom de ma mairie </h1>
            <h5 class="upper"> Slogan de la mairei </h5>
            <h4>
                <i class="bi bi-globe2"></i>
                <span class="upper"> Pays </span>
            </h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Sed non risus. Suspendisse lectus tortor, 
                dignissim sit amet, adipiscing nec, ultricies sed, dolor. 
                Cras elementum ultrices diam. Maecenas ligula massa, varius a, 
                semper congue, euismod non, mi. Proin porttitor, orci nec nonummy 
            </p>
        </div>
    </div>
    <section class="w-100 d-flex justify-content-center align-items-center page-item-container">
        <?php 
            if ( !count( $list) ) AppPacker::renderThemeView( 'all-black', 'not' );
        ?>
        <div class="w-100 d-flex flex-column page-item">
            <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                <img 
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'scott-webb-G1J3JoI91A4-unsplash.jpg' ) ?>" 
                    class="page-item-image w-100"
                />
            </div>
            <div class="w-100 d-flex flex-column align-items-center page-item-data-container">
                <h1> TITLE </h1>
                <h3> Sub title </h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, </p>
            </div>
        </div>
        <div class="w-100 d-flex flex-column page-item">
            <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                <img 
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'scott-webb-G1J3JoI91A4-unsplash.jpg' ) ?>" 
                    class="page-item-image w-100"
                />
            </div>
            <div class="w-100 d-flex flex-column align-items-center page-item-data-container">
                <h1> TITLE </h1>
                <h3> Sub title </h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, </p>
            </div>
        </div>
        <div class="w-100 d-flex flex-column page-item">
            <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                <img 
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'scott-webb-G1J3JoI91A4-unsplash.jpg' ) ?>" 
                    class="page-item-image w-100"
                />
            </div>
            <div class="w-100 d-flex flex-column align-items-center page-item-data-container">
                <h1> TITLE </h1>
                <h3> Sub title </h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, </p>
            </div>
        </div>
    </section>
</main>