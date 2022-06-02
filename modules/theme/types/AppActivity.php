<?php 
    namespace App\modules\theme\types\AppActivity;
        use App\modules\theme\types\AppSimpleRecord\AppSimpleRecord;
        use App\modules\theme\types\AppFile\AppContentFileList;

        interface AppActivity extends AppSimpleRecord, AppContentFileList{
            /** 
                *
                * return the id of the
                * current activity 
            */
            public function getActivityId(): int;  
        }
?>