<?php 
    namespace App\modules\theme\types\AppPost;
        use App\modules\theme\types\AppFile\AppContentFileList;
        use App\modules\theme\types\AppPostType\AppPostType;

        interface AppPost extends AppContentFileList{
            /** 
                *
                * this function will
                * return the post id of the current 
                * record 
            */
            public function getPostId(): int;

            /** 
                *
                * this function will
                * return the post type id of the current 
                * record 
            */
            public function getPostTypeId(): int;

            /** 
                *
                * return the name of the
                * current record
                * 
            */
            public function getLabel(): string;

            /** 
                *
                * return the description of the
                * current record
            */
            public function getDescription(): string;

            /** 
                *
                * return the PostType of the
                * current record 
            */
            public function getPostType(): AppPostType;
        }
?>