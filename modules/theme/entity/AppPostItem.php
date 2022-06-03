<?php 
    namespace App\modules\theme\entity\AppPostItem;
        use App\modules\theme\types\AppPost\AppPost;
        use App\modules\theme\types\AppPostType\AppPostType;
        use App\modules\theme\entity\AppPostTypeItem\AppPostTypeItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppFileItem\AppContentFileListItem;

        class AppPostItem extends AppTimeStampItem implements AppPost{
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
                return new AppPostTypeItem( '' );
            }
        }
?>