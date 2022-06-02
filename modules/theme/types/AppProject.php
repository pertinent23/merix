<?php 
    namespace App\modules\theme\types\AppProject;
        use App\modules\theme\types\AppSimpleRecord\AppSimpleRecord;
        use App\modules\theme\types\AppFile\AppContentFile;

        interface AppProject extends AppSimpleRecord, AppContentFile{
            /** 
                *
                * return the id of the
                * current project 
            */
            public function getProjectId(): int;  
        }
?>