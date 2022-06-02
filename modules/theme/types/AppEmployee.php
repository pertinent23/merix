<?php 
    namespace App\modules\theme\types\AppEmployee;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;
        use App\modules\theme\types\AppFile\AppFile;
        use App\modules\theme\types\AppRole\AppRole;

        interface AppEmployee extends AppTimeStamp, AppFile{
            /** 
                *
                * return the id of the employee 
            */
            public function getEmployeeId(): int;

            /** 
                *
                * return the id of the role 
                * of the employee 
            */
            public function getRoleId() : int;

            /** 
                *
                * return the file id 
                * of the image of the employee 
            */
            public function getFileId() : int;

            /** 
                *
                * return the first name of the
                * employee 
            */
            public function getFirstName(): string;

            /** 
                *
                * return the last name of the
                * employee 
            */
            public function getLastName(): string;

            /** 
                *
                * return the age of the
                * employee 
            */
            public function getAge(): int;

            /** 
                *
                * return the background of the
                * employe 
            */
            public function getBackground(): string;

            /** 
                *
                * return the role of the 
                * current employee 
            */
            public function getRole(): AppRole;
        }
?>