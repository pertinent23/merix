<?php 
    namespace App\modules\theme\entity\AppPostItem;
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

            public function update(int $id): void {
                
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