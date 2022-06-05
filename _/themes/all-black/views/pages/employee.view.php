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
        <a href="employee" class="navbar-item d-flex align-items-center justify-content-center active" id="emmployees">
            <p> Personnel </p>
        </a>
        <a href="other" class="navbar-item d-flex align-items-center justify-content-center" id="others">
            <p> Autre </p>
        </a>
    </section>
</nav>
<main class="w-100 d-flex flex-column align-items-center content-item-data">
    <section class="w-100 d-flex justify-content-center align-items-center page-item-container">
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