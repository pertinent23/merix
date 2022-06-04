<?php 
    namespace App\modules\theme\entity\AppPubItem;
        use PDO;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppPub\AppPub;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppSimpleRecordItem\AppSimpleRecordItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppPubItem extends AppTimeStampItem implements AppPub, AppCRUD{
            use AppContentFileItem, AppSimpleRecordItem;
            protected int $pub_id;

            public function __construct( int $site_id, int $file_id, string $description, string $name ) {
                $this->setSiteId( $site_id );
                $this->setFileId( $file_id );
                $this->setDescription( $description );
                $this->setName( $name );
            }

            public function getPubId() : int {
                return $this->pub_id;
            }

            public function setPubId( int $val ): void{
                $this->pub_id = $val;
            }

            public function create(): void {
                $req = new AppRequest( 'pub.insert', [
                    'site_id' => $this->site_id,
                    'file_id' => $this->file_id,
                    'name' => $this->getName(),
                    'description' => $this->getDescription(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setPubId( $req->getLastId() );
            }

            public function update(): void {
                
            }

            public static function get(int $id): mixed {
                
            }

            public static function gets(int $id): array {
                $req = new AppRequest( 'pub.list', [
                    'site_id' => $id
                ] );
                $req->exec();
                $result = $req->getResult()->fetchAll( PDO::FETCH_ASSOC );
                return array_map( function ( $item ) {
                    $site = new AppPubItem(
                        $item[ 'site_id' ],
                        $item[ 'file_id' ],
                        $item[ 'name' ],
                        $item[ 'description' ]
                    );
                    $site->setPubId( intval( $item[ 'project_id' ] ) );
                    $site->setCreatedDate( $item[ 'createdAt' ] );
                    $site->setUpdatedDate( $item[ 'updatedAt' ] );
                    return $site;
                }, $result );
            }

            public static function delete(int $id): bool {
                return true;
            }
        }
?>