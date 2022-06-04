<?php 
    namespace App\modules\theme\entity\AppActivityItem;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppActivity\AppActivity;
        use App\modules\theme\entity\AppFileItem\AppContentFileListItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppSimpleRecordItem\AppSimpleRecordItem;

        class AppActivityItem extends AppTimeStampItem implements AppActivity, AppCRUD{
            use AppContentFileListItem, AppSimpleRecordItem;
            protected int $activityId;

            public function __construct( int $site_id, string $name, string $description ) {
                $this->setSiteId( $site_id );
                $this->setName( $name );
                $this->setDescription( $description );
            }

            public function getActivityId(): int {
                return $this->activityId;
            }

            public function setActivityId( int $val ): void{
                $this->activityId = $val;
            }

            public function create(): void {
                $req = new AppRequest( 'activity.insert', [
                    'site_id' => $this->site_id,
                    'name' => $this->getName(),
                    'description' => $this->getDescription(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setActivityId( $req->getLastId() );

                foreach( $this->getFileIdList() as $id ) {
                    $req = new AppRequest( 'activity.files.insert', [
                        'file_id' => $id,
                        'activity_id' => $this->getActivityId()
                    ] );
                    $req->exec();
                    sleep( 0.1 );
                }
            }

            public function update(): void {
                
            }

            public static function get(int $id): mixed {
                
            }

            public static function gets(int $user_id): array {
                return [];
            }

            public static function delete(int $id): bool {
                return true;
            }
        }
?>