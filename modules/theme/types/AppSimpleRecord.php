<?php 
    namespace App\modules\theme\types\AppSimpleRecord;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;

        interface AppSimpleRecord extends AppTimeStamp{
            /** 
                *
                * return the name of the
                * current record
                * 
            */
            public function getName(): string;

            /** 
                *
                * return the description of the
                * current record
            */
            public function getDescription(): string;
        }
?>