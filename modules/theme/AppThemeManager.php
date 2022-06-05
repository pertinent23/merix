<?php 
    namespace App\modules\theme\AppThemeManager;
        use App\modules\theme\types\AppSite\AppSite;
        use App\modules\theme\entity\AppPubItem\AppPubItem;
        use App\modules\theme\entity\AppPostItem\AppPostItem;
        use App\modules\theme\entity\AppSiteItem\AppSiteItem;
        use App\modules\theme\entity\AppPlaceItem\AppPlaceItem;
        use App\modules\theme\entity\AppProjectItem\AppProjectItem;
        use App\modules\theme\entity\AppActivityItem\AppActivityItem;
        use App\modules\theme\entity\AppEmployeeItem\AppEmployeeItem;

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

            public static function getSite( int $id ) : AppSite {
                return AppSiteItem::get( $id );
            }

            public static function getEmployees( int $id ) : array {
                return AppEmployeeItem::gets( $id );
            }

            public static function getActivities( int $id ) : array {
                return AppActivityItem::gets( $id );
            }

            public static function getProjects( int $id ) : array {
                return AppProjectItem::gets( $id );
            }

            public static function getPlaces( int $id ) : array {
                return AppPlaceItem::gets( $id );
            }

            public static function getPosts( int $id ) : array {
                return AppPostItem::gets( $id );
            }

            public static function getPubs( int $id ) : array {
                return AppPubItem::gets( $id );
            }
        }
?>