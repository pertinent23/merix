<div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row">
    <div class="list-item-content-image">
        <img src="../../<?= $item->getFile()->getUrl() ?>" alt="test">
    </div>
    <div class="list-item-content-data d-flex flex-column justify-content-center">
        <span> <?= $item->getName() ?> </span>
        <p> <?= $item->getDescription() ?> </p>
        <div class="list-item-button-container d-flex align-items-center">
            <button>
                <i class="bi bi-x-octagon-fill"></i>
                <span> SUPPRIMER </span>
            </button>
        </div>
    </div>
</div>