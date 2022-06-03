<?php 
    namespace App\modules\theme\entity\AppPubItem;
        use App\modules\theme\types\AppPub\AppPub;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppSimpleRecorditem\AppSimpleRecorditem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppPubItem extends AppTimeStampItem implements AppPub{
            use AppContentFileItem, AppSimpleRecorditem;
            protected int $pub_id;

            public function __construct( string $description, string $name ) {
                $this->setDescription( $description );
                $this->setName( $name );
            }

            public function getPubId() : int {
                return $this->pub_id;
            }
        }
?>