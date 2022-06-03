<?php 
    namespace App\modules\theme\entity\AppPostTypeItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\types\AppPostType\AppPostType;

        class AppPostTypeItem extends AppTimeStampItem implements AppPostType{
            protected int $postId;
            protected string $label;

            public function __construct( string $label ) {
                $this->setLabel( $label );
            }

            public function getPostTypeId(): int {
                return $this->id;
            }

            public function getLabel(): string {
                return $this->label;
            }

            protected function setLabel( string $val ) : void {
                $this->label = $val;
            }
        }
?>