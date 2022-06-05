<?php 
    use App\modules\AppTheme\AppTheme;
?>
<nav class="w-100 d-flex align-items-center navbar flex-column">
    <section class="navbar-brand d-flex align-items-center">
        <i class="bi bi-building"></i>
        <p class="navbar-title"> EMPLOYEE </p>
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
        <a href="other" class="navbar-item d-flex align-items-center justify-content-center active" id="others">
            <p> Autre </p>
        </a>
    </section>
</nav>
<main class="w-100 d-flex flex-column align-items-center content-item-data">
    <section class="w-100 d-flex justify-content-center align-items-center page-item-container link">
        <div class="w-100 d-flex flex-column page-item link">
            <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                <img 
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'img/carlo-navarro-WCbCRXk7nmU-unsplash.jpg' ) ?>" 
                    class="page-item-image w-100"
                />
                <a href="post" class="page-item-nav"> ANNONCES </a>
            </div>
        </div>
        <div class="w-100 d-flex flex-column page-item link">
            <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                <img 
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'img/alvaro-reyes-qWwpHwip31M-unsplash.jpg' ) ?>" 
                    class="page-item-image w-100"
                />
                <a href="project" class="page-item-nav"> PROJET </a>
            </div>
        </div>
        <div class="w-100 d-flex flex-column page-item link">
            <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                <img 
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'img/cyprus-2003382_640.jpg' ) ?>" 
                    class="page-item-image w-100"
                />
                <a href="activity" class="page-item-nav"> ACTIVITES </a>
            </div>
        </div>
        <div class="w-100 d-flex flex-column page-item link">
            <div class="w-100 d-flex justify-content-center align-items-center page-item-image-container">
                <img 
                    src="<?= AppTheme::getAssetsPath( 'all-black', 'img/dovi-rfOFRwKHtJM-unsplash.jpg' ) ?>" 
                    class="page-item-image w-100"
                />
                <a href="pub" class="page-item-nav"> PUBLICITE </a>
            </div>
        </div>
    </section>
</main>