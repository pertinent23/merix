<?php 
    namespace App\modules\theme\types\AppPub;
        use App\modules\theme\types\AppSimpleRecord\AppSimpleRecord;
        use App\modules\theme\types\AppFile\AppContentFile;

        interface AppPub extends AppSimpleRecord, AppContentFile{
            /** 
                *
                * return the id of the
                * current pub 
            */
            public function getPubId(): int;  
        }
?>