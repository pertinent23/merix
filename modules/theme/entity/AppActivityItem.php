<?php 
    namespace App\modules\theme\entity\AppActivityItem;
        use App\modules\theme\types\AppActivity\AppActivity;
        use App\modules\theme\entity\AppFileItem\AppContentFileListItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppSimpleRecorditem\AppSimpleRecorditem;

        class AppActivityItem extends AppTimeStampItem implements AppActivity{
            use AppContentFileListItem, AppSimpleRecorditem;
            protected int $activityId;

            public function __construct( string $name, string $description )
            {
                $this->setName( $name );
                $this->setDescription( $description );
            }

            public function getActivityId(): int
            {
                return $this->activityId;
            }
        }
?>