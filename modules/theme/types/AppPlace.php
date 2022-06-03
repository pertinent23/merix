<?php 
    namespace App\modules\theme\types\AppPlace;
        use App\modules\theme\types\AppSimpleRecord\AppSimpleRecord;
        use App\modules\theme\types\AppFile\AppContentFileList;

        interface AppPlace extends AppSimpleRecord, AppContentFileList{
            /** 
                *
                * return the id of the
                * current place 
            */
            public function getPlaceId(): int;  
        }
?>