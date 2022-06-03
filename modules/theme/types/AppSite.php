<?php 
    namespace App\modules\theme\types\AppSite;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;
        use App\modules\theme\types\AppFile\AppContentFile;

        interface AppSite extends AppTimeStamp, AppContentFile{
            /** 
                *
                * this method will return the 
                * id of the current record 
            */
            public function getSiteId() : int;

            /** 
                *
                * this method will return 
                * user id 
            */
            public function getUserId() : int;

            /**
                *
                * this method will return the
                * the site logo
            */
            public function getFileId() : int;

            /**
                *
                * return the name of 
                * your site 
            */
            public function getName() : string;

            /** 
                *
                * return the slogan of 
                * your site 
            */
            public function getSlogan() : string;

            /** 
                *
                * return the district of
                * your commune 
            */
            public function getDistrict() : string;

            /** 
                *
                * return the country of your
                * commune 
            */
            public function getCountry() : string;

            /** 
                *
                * return the country of your 
                * municipality 
            */
            public function getPosition() : string;

            /** 
                *
                * return the history of 
                * your commune 
            */
            public function getHistory() : string;
        }
?>