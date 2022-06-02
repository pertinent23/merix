<?php 
    namespace App\modules\theme\entity;
        use App\modules\theme\types\AppPost\AppPost;
        use App\modules\theme\types\AppPostType\AppPostType;

        class AppPostItem extends AppContentFileItem implements AppPost
        {
            private string $createAt;
            private string $description;
            private string $label;
            private int $post_id;
            private int $post_type_id;
            private int $updateAt; 

            public function __construct(
                string $createAt,
                string $description,
                string $label,
                
                
            )
        }
?>