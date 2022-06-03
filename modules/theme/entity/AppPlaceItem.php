<?php 
    namespace App\modules\theme\entity\AppPlaceItem;
        use App\modules\theme\types\AppPlace\AppPlace;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppFileItem\AppContentFileListItem;
        use App\modules\theme\entity\AppSimpleRecorditem\AppSimpleRecorditem;

        class AppPlaceItem extends AppTimeStampItem implements AppPlace{
            use AppContentFileListItem, AppSimpleRecorditem;
            protected int $placeId;

            public function __construct( string $name, string $description )
            {
                $this->setName( $name );
                $this->setDescription( $description );
            }

            public function getPlaceId(): int
            {
                return $this->placeId;
            }
        }
?>