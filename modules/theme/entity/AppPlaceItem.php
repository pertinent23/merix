<?php 
    namespace App\modules\theme\entity\AppPlaceItem;
        use PDO;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppPlace\AppPlace;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppFileItem\AppContentFileListItem;
        use App\modules\theme\entity\AppSimpleRecordItem\AppSimpleRecordItem;

        class AppPlaceItem extends AppTimeStampItem implements AppPlace, AppCRUD{
            use AppContentFileListItem, AppSimpleRecordItem;
            protected int $placeId;

            public function __construct( int $site_id, string $name, string $description ) {
                $this->setSiteId( $site_id );
                $this->setName( $name );
                $this->setDescription( $description );
            }

            public function getPlaceId(): int {
                return $this->placeId;
            }

            public function setPlaceId( int $val ): void{
                $this->placeId = $val;
            }

            public function create(): void {
                $req = new AppRequest( 'place.insert', [
                    'site_id' => $this->site_id,
                    'name' => $this->getName(),
                    'description' => $this->getDescription(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setPlaceId( $req->getLastId() );

                foreach( $this->getFileIdList() as $id ) {
                    $req = new AppRequest( 'place.files.insert', [
                        'file_id' => $id,
                        'place_id' => $this->getPlaceId()
                    ] );
                    $req->exec();
                    sleep( 0.1 );
                }
            }

            public function update(): void {
                
            }

            public static function get(int $id): mixed {
                
            }

            public static function gets(int $id): array {
                $req = new AppRequest( 'place.list', [
                    'site_id' => $id
                ] );
                $req->exec();
                $result = $req->getResult()->fetchAll( PDO::FETCH_ASSOC );
                return array_map( function ( $item ) {
                    $site = new AppPlaceItem(
                        $item[ 'site_id' ],
                        $item[ 'name' ],
                        $item[ 'description' ]
                    );
                    $site->setPlaceId( intval( $item[ 'place_id' ] ) );
                    $site->setCreatedDate( $item[ 'createdAt' ] );
                    $site->setUpdatedDate( $item[ 'updatedAt' ] );
                        $req = new AppRequest( 'place.list.files', [
                            'place_id' => $site->getPlaceId()
                        ] );
                        $req->exec();
                        $result = $req->getResult()->fetchAll( PDO::FETCH_ASSOC );
                        $site->setFiles( array_map( function ( $item ) {
                            return intval( $item[ 'file_id' ] );
                        } , $result ) );
                    return $site;
                }, $result );
            }

            public static function delete(int $id): bool {
                return true;
            }
        }
?>