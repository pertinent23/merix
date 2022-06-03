<?php 
    namespace App\modules\theme\entity\AppProjectItem;
        use App\modules\theme\types\AppProject\AppProject;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppSimpleRecorditem\AppSimpleRecorditem;

        class AppProjectItem extends AppTimeStampItem implements AppProject{
            use AppContentFileItem, AppSimpleRecorditem;
            protected int $projectId;

            public function __construct( string $name, string $description ) {
                $this->setName( $name );
                $this->setDescription( $description );
            }

            public function getProjectId(): int{
                return $this->projectId;
            }
        }
?>