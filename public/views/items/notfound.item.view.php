<?php 
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\AppFileManager\AppFileManager;

    $link = AppFileManager::getLink( 'account/dashboard', [
        's' => AppGlobal::get( 's' ),
        'i' => AppGlobal::get( 'i' ),
    ] );
?>
<div class="w-100 d-flex list-item align-items-center flex-column">
    <div class="d-flex w-100 align-items-center list-item-label">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <span> PAGE VIDE </span>
    </div>
    <p class="list-item-text w-100 d-flex justify-content-center flex-column align-items-center"> 
        Cette section n'a pas encore de contenu
        <h5 style="margin: 0px;"> <a href="<?= $link ?>" class="list-item-link"> En ajouter </a> </h5>
    </p>
</div>