<?php 
    namespace App\modules\theme\entity\AppProjectItem;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppProject\AppProject;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppSimpleRecordItem\AppSimpleRecordItem;

        class AppProjectItem extends AppTimeStampItem implements AppProject, AppCRUD{
            use AppContentFileItem, AppSimpleRecordItem;
            protected int $projectId;

            public function __construct( int $site_id, int $file_id, string $name, string $description ) {
                $this->setSiteId( $site_id );
                $this->setFileId( $file_id );
                $this->setName( $name );
                $this->setDescription( $description );
            }

            public function getProjectId(): int{
                return $this->projectId;
            }

            public function setProjectId( int $val ): void{
                $this->projectId = $val;
            }

            public function create(): void {
                $req = new AppRequest( 'project.insert', [
                    'site_id' => $this->site_id,
                    'file_id' => $this->file_id,
                    'name' => $this->getName(),
                    'description' => $this->getDescription(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setProjectId( $req->getLastId() );
            }

            public function update(): void {
                
            }

            public static function get(int $id): mixed
            {
                
            }

            public static function gets(int $user_id): array
            {
                return [];
            }

            public static function delete(int $id): bool
            {
                return true;
            }
        }
?>