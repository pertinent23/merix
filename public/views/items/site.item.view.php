<?php 
    use App\modules\AppFileManager\AppFileManager;
    $url = AppFileManager::getLink( 'account/dashboard', [
        'i' => $data->getUserId(),
        's' => $data->getSiteId()
    ] );
?>
<a href="<?= $url ?>" class="page-option page-item d-flex flex-column align-items-center justify-content-between">
    <div class="page-image d-flex justify-content-center align-items-center">
        <i class="bi bi-images"></i>
        <img src="../<?= $data->getFile()->getUrl() ?>" alt="logo of the site">
    </div>
    <span class="page-item-title"> <?= $data->getName() ?> </span>
    <span class="page-item-slogan"> <?= $data->getSlogan() ?> </span>
</a>