<?php 
    namespace App\modules\theme\types\AppTimeStamp;

        interface AppTimeStamp{
            /**
                *
                * return the creation date
                * of the current record
            */
            public function getCreatedAt() : int;

            /** 
                *
                * return the last update data
                * of the current record  
            */
            public function getUpdatedAt() : int;
        }
?>