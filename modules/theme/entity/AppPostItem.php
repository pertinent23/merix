<?php 
    namespace App\modules\theme\entity\AppPostItem;
        use PDO;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppPost\AppPost;
        use App\modules\theme\types\AppPostType\AppPostType;
        use App\modules\theme\entity\AppPostTypeItem\AppPostTypeItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppFileItem\AppContentFileListItem;

        class AppPostItem extends AppTimeStampItem implements AppPost, AppCRUD{
            use AppContentFileListItem;
            protected int $postId;
            protected int $postTypeId;
            protected string $label;
            protected string $description;

            public function __construct( string $label, string $description, int $post_type_id ) {
                $this->setLabel( $label );
                $this->setDescription( $description );
                $this->setPostTypeId( $post_type_id );
            }

            protected function setPostTypeId( int $post  ) : void {
                $this->postTypeId = $post;
            }

            protected function setPostId( int $post  ) : void {
                $this->postId = $post;
            }

            protected function setLabel( string $val ) : void {
                $this->label = $val;
            }

            protected function setDescription( string $val ) : void {
                $this->description = $val;
            }

            public function getDescription(): string {
                return $this->description;
            }

            public function getLabel(): string {
                return $this->label;
            }

            public function getPostId(): int {
                return $this->postId;
            }

            public function getPostTypeId(): int {
                return $this->postTypeId;
            }

            public function getPostType(): AppPostType {
                return new AppPostTypeItem( 0, '' );
            }

            public function create(): void {
                $req = new AppRequest( 'post.insert', [
                    'post_type_id' => $this->getPostTypeId(),
                    'label' => $this->getLabel(),
                    'description' => $this->getDescription(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setPostId( $req->getLastId() );

                foreach( $this->getFileIdList() as $id ) {
                    $req = new AppRequest( 'post.files.insert', [
                        'file_id' => $id,
                        'post_id' => $this->getPostId()
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
                $req = new AppRequest( 'post.list', [
                    'site_id' => $id
                ] );
                $req->exec();
                $result = $req->getResult()->fetchAll( PDO::FETCH_ASSOC );
                return array_map( function ( $item ) {
                    $site = new AppPostItem(
                        $item[ 'label' ],
                        $item[ 'description' ],
                        $item[ 'post_type_id' ]
                    );
                    $site->setPostId( intval( $item[ 'post_id' ] ) );
                    $site->setCreatedDate( $item[ 'createdAt' ] );
                    $site->setUpdatedDate( $item[ 'updatedAt' ] );
                        $req = new AppRequest( 'post.list.files', [
                            'post_id' => $site->getPostId()
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