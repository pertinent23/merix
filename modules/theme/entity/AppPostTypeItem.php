<?php 
    namespace App\modules\theme\entity\AppPostTypeItem;
        use PDO;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\types\AppPostType\AppPostType;

        class AppPostTypeItem extends AppTimeStampItem implements AppPostType, AppCRUD{
            protected int $postTypeId;
            protected string $label;
            protected int $site_id;

            public function __construct( int $site_id, string $label ) {
                $this->setSiteId( $site_id );
                $this->setLabel( $label );
            }

            protected function setLabel( string $val ): void {
                $this->label = $val;
            }

            protected function setSiteId( int $val ): void {
                $this->site_id = $val;
            }

            public function getLabel(): string {
                return $this->label;
            }

            public function getSiteId() : int {
                return $this->site_id;
            }

            public function getPostTypeId(): int {
                return $this->postTypeId;
            }

            public function setPostTypeId( int $val ): void{
                $this->postTypeId = $val;
            }

            public function create(): void {
                $req = new AppRequest( 'posttype.insert', [
                    'site_id' => $this->getSiteId(),
                    'label' => $this->getLabel(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setPostTypeId( $req->getLastId() );
            }

            public function update(): void {
                
            }

            public static function get(int $id): mixed {
                
            }

            public static function gets(int $site_id): array {
                $req = new AppRequest( 'posttype.all', [
                    'site_id' => $site_id,
                ] );
                $req->exec();
                $result = $req->getResult()->fetchAll( PDO::FETCH_ASSOC );
                return array_map( function ( $item ) {
                    $posttype = new AppPostTypeItem(
                        $item[ 'site_id' ],
                        $item[ 'label' ]
                    );
                    $posttype->setPostTypeId( intval( $item[ 'post_type_id' ] ) );
                    $posttype->setCreatedDate( $item[ 'createdAt' ] );
                    $posttype->setCreatedDate( $item[ 'updatedAt' ] );
                    return $posttype;
                }, $result );;
            }

            public static function delete(int $id): bool {
                return true;
            }
        }
?>