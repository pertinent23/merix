<?php 
    use App\modules\AppPacker\AppPacker;
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-between align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="../../static/assets/icons/icon.64.png" alt="web site icon">
        <p> employés </p>
    </section>
    <?php 
        AppPacker::render( 'components/account.menu' );
    ?>
</nav>
<main class="w-100 d-flex flex-column">
    <section class="d-flex content-page-options flex-column align-items-center">
        <div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row padding">
            <div class="list-item-content-image d-flex justify-content-center align-items-center">
                <div class="list-item-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-circle"></i>
                </div>
            </div>
            <div class="list-item-content-data d-flex flex-column justify-content-center">
                <span> <b> NAME: </b> last name, first name </span>
                <span> <b> AGE: </b> his age </span>
                <p> Here we have to describe the background of the employee </p>
                <div class="list-item-button-container d-flex align-items-center">
                    <button>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span> SUPPRIMER </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row padding">
            <div class="list-item-content-image d-flex justify-content-center align-items-center">
                <div class="list-item-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-circle"></i>
                </div>
            </div>
            <div class="list-item-content-data d-flex flex-column justify-content-center">
                <span> <b> NAME: </b> last name, first name </span>
                <span> <b> AGE: </b> his age </span>
                <p> Here we have to describe the background of the employee </p>
                <div class="list-item-button-container d-flex align-items-center">
                    <button>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span> SUPPRIMER </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row padding">
            <div class="list-item-content-image d-flex justify-content-center align-items-center">
                <div class="list-item-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-circle"></i>
                </div>
            </div>
            <div class="list-item-content-data d-flex flex-column justify-content-center">
                <span> <b> NAME: </b> last name, first name </span>
                <span> <b> AGE: </b> his age </span>
                <p> Here we have to describe the background of the employee </p>
                <div class="list-item-button-container d-flex align-items-center">
                    <button>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span> SUPPRIMER </span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>