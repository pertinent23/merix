<?php 
    namespace App\modules\theme\types\AppUser;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;

        interface AppUser extends AppTimeStamp{
            /** 
                *
                * return the id of the
                * current user 
            */
            public function getUserId() : int;

            /**
                *
                * return the user name 
            */
            public function getName() : string;

            /** 
                *
                * return the user email
                * address
            */
            public function getEmail() : string;

            /** 
                *
                * return the user password 
            */
            public function getPassword() : string;

            /** 
                *
                * return the use role 
            */
            public function getRole(): string;
        }
?>