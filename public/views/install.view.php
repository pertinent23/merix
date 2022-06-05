<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\http\AppGlobal\AppGlobal;

    $dbname = AppGlobal::get( 'dbname' );
    $password = AppGlobal::get( 'password' );
    $user = AppGlobal::get( 'user' );
    $port = AppGlobal::get( 'port' );
    $host = AppGlobal::get( 'host' );

    if ( $dbname AND $user AND $port AND $host ) {
        AppPacker::render( 'save', [
            'dbname' => $dbname,
            'password' => $password,
            'user' => $user,
            'port' => intval( $port ),
            'host' => $host
        ] );
    } 
?>
<header class="colored"></header>
<nav class="d-flex flex-column justify-content-center align-items-center light">
    <section class="navbar-brand d-flex align-items-center">
        <img src="static/assets/icons/icon.64.png" alt="web site icon">
        <p> Merix </p>
    </section>
</nav>
<main class="d-flex justify-content-center align-items-center w-100">
    <form class="d-flex flex-column align-items-center w-100" method="GET" action="save">
        <div class="form-title w-100"> INSTALLATION </div>
        <div class="form-description d-flex align-items-center justify-content-center"> ECHEC DE CONNECTION A LA BASE DE DONNEES </div>
        <section class="form-content-field d-flex flex-column align-items-center justify-content-center w-100">
            <div class="field w-100 d-flex">
                <input class="field-control" type="text" id="name" value="merix" name="dbname" placeholder="Az:" autocomplete="off" required>
                <i class="bi bi-server"></i>
                <label for="name"> NOM DE LA BASE DE DONNEES: </label>
            </div>
            <div class="field w-100 d-flex">
                <input class="field-control" type="text" value="root" id="user" name="user" placeholder="Az:" autocomplete="off" required>
                <i class="bi bi-person-bounding-box"></i>
                <label for="user"> UTILISATEUR: </label>
            </div>
            <div class="field w-100 d-flex">
                <input class="field-control" type="number" value="3306" name="port" id="port" placeholder="Az:" autocomplete="off" required>
                <i class="bi bi-displayport-fill"></i>
                <label for="port"> PORT: </label>
            </div>
            <div class="field w-100 d-flex">
                <input class="field-control" type="text" value="localhost" name="host" id="host" placeholder="Az:" autocomplete="off" required>
                <i class="bi bi-wifi"></i>
                <label for="host"> DOMAINE: </label>
            </div>
            <div class="field w-100 d-flex">
                <input class="field-control" type="text" name="password" id="password" placeholder="Az:">
                <i class="bi bi-shield-lock-fill"></i>
                <label for="password"> MOT DE PASSE: </label>
            </div>
        </section>
        <span class="form-error"></span>
        <section class="form-content-button d-flex align-items-center justify-content-end w-100">
            <div class="d-flex align-items-center justify-content-between form-buttons-container">
                <button class="submit" type="submit">
                    <i class="bi bi-gear-wide-connected submit-icon"></i>
                    <span class="submit-label"> INSTALLER </span>
                </button>
            </div>
        </section>
    </form>
</main>