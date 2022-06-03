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

            /** 
                *
                * the date of the creation
                * of the current record 
            */
            public function getCreatedDate( string $format ) : string;

            /** 
                *
                * the time of the creation of
                * the current record 
            */
            public function getCreatedTime( string $format ) : string;

            /** 
                *
                * the date time of the creation 
                * of the current record 
            */
            public function getCreatedDateTime() : string;

            /** 
                *
                * the last update date of the current
                * record  
            */
            public function getUpdatedDate( string $format ) : string;

            /** 
                *
                * the last update time of the current record 
            */
            public function getUpdatedTime( string $format ) : string;

            /** 
                *
                * the last update date time
                * of the current record 
            */
            public function getUpdatedDateTime() : string;
        }
?>