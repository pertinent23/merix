<?php 
    namespace App\modules\AppFileManager;
        use App\modules\http\AppEnv\AppEnv;

        abstract class AppFileManager{
            /** 
                *
                * this function will be use 
                * to return the path of the view 
            */
            public static function getViewPath( string $name = '' ) : string {
                if ( AppFileManager::verifyViewKeyExist() ) {
                    return constant( 'views' ) . "$name.view.php";
                }
                return '';
            }

            /** 
                *
                * return true if the global view
                * reference exist 
            */
            public static function verifyViewKeyExist() : bool {
                return defined( 'views' );
            }

            /** 
                *
                * return the link of a bundle
                * with the param name 
            */
            public static function getBunglePath( string $name = '' ) : string {
                if ( AppFileManager::verifyBundleKeyExist() ) {
                    return constant( 'bundles' ) . "$name.bundle.php";
                }
                return '';
            }

            /** 
                *
                * return true if the bundle
                * global key exist 
            */
            public static function verifyBundleKeyExist() : bool {
                return defined( 'bundles' );
            }

            /** 
                *
                * return true if the static
                * global key exist 
            */
            public static function verifyStaticKeyExist() : bool {
                return defined( 'static' );
            }

            /** 
                *
                * return true if the assets
                * global key exist 
            */
            public static function verifyAssetsKeyExist() : bool {
                return defined( 'assets' );
            }

            /** 
                *
                * return true if the route
                * global key exist 
            */
            public static function verifyRoutesKeyExist() : bool {
                return defined( 'routes' );
            }

            /** 
                *
                * return true if the sql
                * global key exist 
            */
            public static function verifySQLExist() : bool {
                return defined( 'sql' );
            }

            /** 
                *
                * return true if the sql
                * global key exist 
            */
            public static function verifyConfigsExist() : bool {
                return defined( 'configs' );
            }

            /** 
                *
                * return the path to a
                * static file 
            */
            public static function getStaticPath( string $name = '' ) : string {
                if ( AppFileManager::verifyStaticKeyExist() ) {
                    return AppEnv::getServerLink().constant( 'static' ) . "$name";
                }
                return '';
            }

            /** 
                *
                * return the path to an
                * assets 
            */
            public static function getAssetsPath( string $name = '' ) : string {
                if ( AppFileManager::verifyStaticKeyExist() ) {
                    return AppEnv::getServerLink().constant( 'assets' ) . "$name";
                }
                return '';
            }

            /** 
                *
                * return a global link to another 
                * api 
            */
            public static function getLink( string $link = '' ) : string {
                return AppEnv::getServerLink()."$link";
            }

            /** 
                *
                * return the path to the file AppRoute.php 
            */
            public static function getRoutesPath() : string {
                if ( AppFileManager::verifyRoutesKeyExist() ) {
                    return constant( 'routes' );
                }
                return '';
            }

            /** 
                *
                * return the path to the path
                * of an sql resource 
            */
            public static function getSQLPath( string $name ) : string {
                if ( AppFileManager::verifySQLExist() ) {
                    return constant( 'sql' )."$name.sql";
                }
                return '';
            }

            /** 
                *
                * return the path to the path
                * of an config resource 
            */
            public static function getConfigsPath( string $name = '__configs' ) : string {
                if ( AppFileManager::verifyConfigsExist() ) {
                    return constant( 'configs' )."$name.json";
                }
                return '';
            }
        }
?>