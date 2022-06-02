<?php 
    namespace App\modules\theme\AppThemeManager;
        use App\modules\theme\types\AppSite\AppSite;

        abstract class AppThemeManager{
            /** 
                *
                * this function will 
                * return the current site id
                * if the have been sent by the user 
            */
            public static function getSiteId() : int {
                if ( isset( $_GET[ 'st' ] ) ) {
                    return intval( $_GET[ 'st' ] );
                }
                return -1;
            }

            /** 
                *
                * this function will verify if we are in 
                * a them context 
            */
            public static function isTheme() : bool {
                return file_exists( 'configs.json' );
            }
        }
?>