<?php 
    namespace App\modules\theme\types\AppRole;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;

        interface AppRole extends AppTimeStamp{
            /** 
                *
                * return the id of the
                * role 
            */
            public function getRoleId(): int;

            /** 
                *
                * return the label of 
                * the role 
            */
            public function getLabel(): string;

            /** 
                *
                * return the description
                * of the role 
            */
            public function getDescription(): string;
        }
?>