<div class="w-100 d-flex list-item align-items-center flex-column flex-sm-row padding">
    <div class="list-item-content-image d-flex justify-content-center align-items-center">
        <div class="list-item-icon d-flex justify-content-center align-items-center">
            <i class="bi bi-person-circle"></i>
        </div>
    </div>
    <div class="list-item-content-data d-flex flex-column justify-content-center">
        <span> <?= $item->getLastName() ?>, <?= $item->getFirstName() ?> </span>
        <span> 
            <?= $item->getRole()->getLabel() ?>,
            <?= $item->getAge() ?> ans 
        </span>
        <p> <?= $item->getBackground() ?> </p>
        <div class="list-item-button-container d-flex align-items-center">
            <button>
                <i class="bi bi-x-octagon-fill"></i>
                <span> SUPPRIMER </span>
            </button>
        </div>
    </div>
</div>