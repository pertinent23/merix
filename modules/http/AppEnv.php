<?php 
    namespace App\modules\http\AppEnv;
        use App\modules\http\AppRouter\AppRouter;
        use App\modules\db\AppDataBase\DataBase;
        use App\modules\AppPacker\AppPacker;

        class AppEnv{
            /** 
                *
                * content the database
                * object
            */
            protected static DataBase $db;

            /** 
                *
                * this function will test
                * if we are on a developpment environnement 
            */
            public static function is_local() : bool {
                return $_SERVER[ 'SERVER_NAME' ] === '127.0.0.1' OR $_SERVER[ 'SERVER_ADDR' ] === '127.0.0.1';
            }

            /** 
                *
                * this function will return
                * the resource we are looking for 
            */
            public static function get_resource() : string {
                $path = isset( $_SERVER[ 'REDIRECT_URL' ] ) ? $_SERVER[ 'REDIRECT_URL' ] : ( isset( $_SERVER[ 'REQUEST_URI' ] ) ? $_SERVER[ 'REQUEST_URI' ] : $_SERVER[ 'HTTP_REDIRECT_URL' ] );
                if ( AppEnv::is_local() ) {
                    $list = explode( '/', $path );
                    array_shift( $list );
                    array_shift( $list );
                    if ( count( $list ) === 1 AND $list[ 0 ] === '' ) {
                        return 'index';
                    }
                    return implode( '/', $list );
                } else {
                    if ( $path === '' OR $path === '/' ) {
                        return 'index';
                    }
                    return $path;
                }
            }

            /** 
                *
                * this function will return
                * all created route in the project 
            */
            public static function get_all_routes(): array {
                return array_keys( AppRouter::$routes );
            }

            /** 
                *
                * this function will verify if the request route 
                * exist 
            */
            public static function check_resource_exist() : bool {
                $path = AppEnv::get_resource();
                $list = AppEnv::get_all_routes();
                return in_array( $path, $list );
            }

            /** 
                *
                * this function is used to resolve
                * a route and if the route doesn't 
                * exist, an 404 error will be provided 
            */
            public static function resolve(): void {
                $path = AppEnv::get_resource();
                if ( AppEnv::check_resource_exist() ) {
                    $route = AppRouter::findRoute( $path );
                    AppRouter::executeRoute( $route, $path );
                } else {
                    $middlewares = AppRouter::getMiddleWares();
                        foreach( $middlewares as $fn ) {
                            if ( is_callable( $fn ) ) {
                                AppRouter::executeRoute( $fn, $path );
                            }
                        }
                        http_response_code( 404 );
                        if ( AppRouter::isRoute( '**' ) ) {
                            $route = AppRouter::findRoute( '**' );
                            AppRouter::executeRoute( $route, $path );
                        }
                    die();
                }
            }

            /** 
                *
                * this function will return the 
                * absolute path to our server 
            */
            public static function getServerLink() : string {
                $sheme = $_SERVER[ 'REQUEST_SCHEME' ];
                $port = $_SERVER[ 'SERVER_PORT' ];
                $domain = $_SERVER[ 'SERVER_ADDR' ];
                $base = "$sheme://$domain:$port/";
                if ( AppEnv::is_local() ) {
                        $root = explode( '/', $_SERVER[ 'SCRIPT_NAME' ] )[ 1 ];
                    return "$base$root/";
                }
                return $base;
            }

            /** 
                *
                * return the database
                * instance 
            */
            public static function getDB() : DataBase {
                return AppEnv::$db;
            }

            /** 
                *
                * this function will be use
                * to init the data base object 
            */
            public static function initDB() : void {
                $configs = AppPacker::getConfigs();
                    $db = new DataBase( $configs );
                AppEnv::$db = $db;
            }
        }
?>