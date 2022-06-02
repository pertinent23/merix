<?php 
    namespace App\modules\theme\types\AppPostType;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;

        interface AppPostType extends AppTimeStamp{
            /** 
                *
                * return the id of the
                * current record 
            */
            public function getPostTypeId() : int;

            /** 
                *
                * return the label of the
                * current record 
            */
            public function getLabel() : string; 
        }
?>