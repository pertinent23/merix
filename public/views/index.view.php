<?php 
    use App\modules\AppFileManager\AppFileManager;
?>
<header></header>
<main>
    <section class="w-100 content-head-data flex-column">
        <nav class="d-flex flex-column flex-md-row justify-content-between align-items-center transparent">
            <section class="navbar-brand d-flex align-items-center">
                <img src="<?= AppFileManager::getAssetsPath( 'icons/icon.outline.64.png' ) ?>" alt="web site icon">
                <p> Merix </p>
            </section>
            <section class="navbar-container d-flex align-items-center justify-content-center">
                <a href="./index.html" class="d-flex align-items-center navbar-item active">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <p class="d-none d-sm-flex"> Accueil </p>
                </a>
                <a class="d-flex align-items-center navbar-item connection">
                    <i class="bi bi-person-circle"></i>
                    <p class="d-none d-sm-flex"> Connexion </p>
                </a>
                <a class="d-flex align-items-center navbar-item inscription">
                    <i class="bi bi-pencil-square"></i>
                    <p class="d-none d-sm-flex"> Inscription </p>
                </a>
            </section>
        </nav>
        <section class="parts part-1 w-100 d-flex flex-column-reverse flex-md-row">
            <div class="slide-1 slide">
                <div class="slide-title"> Bienvenue dans notre Content Management System, <span> Merix </span> </div>
                <p> Vous pourrez créer et personnaliser un site web pour votre commune afin d'accroître son tourisme et d'augmanter la rapidité administrative et la transparence. </p>
                <div class="button d-flex justify-content-center align-items-center inscription">
                    <i class="bi bi-puzzle-fill"></i>
                    <span> Commencer </span>
                </div>
            </div>
            <div class="slide-2 slide d-flex justify-content-center align-items-center">
                <div class="slide-image-container d-flex justify-content-center align-items-center">
                    <img src="<?= AppFileManager::getAssetsPath( 'images/undraw_web_devices_re_m8sc.svg' ) ?>" alt="the animation">
                </div>
            </div> 
        </section>
    </section>
    <section class="parts part-2 w-100 d-flex flex-column flex-md-row">
        <div class="slide-2 slide d-flex justify-content-center align-items-center">
            <div class="slide-image-container d-flex justify-content-center align-items-center">
                <img src="<?= AppFileManager::getAssetsPath( 'images/93694-work-from-home.gif' ) ?>" alt="the animation">
            </div>
        </div> 
        <div class="slide-1 slide d-flex flex-column justify-content-center">
            <div class="w-100 d-flex flex-column slide-data">
                <div class="slide-data-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-speedometer"></i>
                </div>
                <div class="slide-data-title"> Creer un site en un clique </div>
            </div>
        </div>
    </section>
    <hr width="80%">
    <section class="parts part-3 w-100 d-flex flex-column-reverse flex-md-row">
        <div class="slide-1 slide d-flex flex-column justify-content-center">
            <div class="w-100 d-flex flex-column slide-data">
                <div class="slide-data-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-motherboard"></i>
                </div>
                <div class="slide-data-title"> Travailler peu et faire plus </div>
            </div>
        </div>
        <div class="slide-2 slide d-flex justify-content-center align-items-center">
            <div class="slide-image-container d-flex justify-content-center align-items-center">
                <img src="<?= AppFileManager::getAssetsPath( 'images/undraw_building_blocks_re_5ahy_black.svg' ) ?>" alt="the animation">
            </div>
        </div> 
    </section>
    <hr width="80%">
    <section class="parts part-2 w-100 d-flex flex-column flex-md-row">
        <div class="slide-2 slide d-flex justify-content-center align-items-center">
            <div class="slide-image-container d-flex justify-content-center align-items-center">
                <img src="<?= AppFileManager::getAssetsPath( 'images/undraw_trendy_interface_re_xsou.svg' ) ?>" alt="the animation">
            </div>
        </div> 
        <div class="slide-1 slide d-flex flex-column justify-content-center">
            <div class="w-100 d-flex flex-column slide-data">
                <div class="slide-data-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-stack"></i>
                </div>
                <div class="slide-data-title"> Commencer des maintenant </div>
                <div class="button d-flex align-items-center inscription">
                    <i class="bi bi-puzzle-fill"></i>
                    <span> Commencer </span>
                </div>
            </div>
        </div>
    </section>
    <section class="d-flex justify-content-center align-items-center parts part-3"></section>
</main>
<header class="colored"></header>