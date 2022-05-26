<?php 
    namespace App\modules\http\AppRouter;
        use App\modules\AppView\AppView;
        use App\modules\http\AppGlobal\AppGlobal;

        class AppRouter{
            public static array $routes = [ ];
            /** 
                *
                * this function will be use
                * to add a route to our website 
            */
            public static function addRoute( string $path, AppView|callable $response ) : void {
                if ( !array_key_exists( $path, AppRouter::$routes ) ) {
                    AppRouter::$routes[ $path ] = $response;
                }
            }

            /** 
                *
                * this function 
                * will be use to find a route 
            */
            public static function findRoute( string $name ) : AppView|callable{
                return AppRouter::$routes[ $name ];
            }

            /** 
                *
                * return true if a 
                * route exist 
            */
            public static function isRoute( string $name ) : bool {
                return in_array( $name, AppRouter::$routes );
            }

            /** 
                *
                * is use to run a route controller
                * or a route view 
            */
            public static function executeRoute( AppView| callable $app, string $path = '' ) : void {
                if ( $app instanceof AppView ) {
                    $app->with( [
                        'context' => new AppGlobal(
                            $path
                        )
                    ] );
                } else if ( is_callable( $app ) ) {
                    AppRouter::executeRoute(
                        $app( new AppGlobal(
                            $path
                        ) )
                    );
                }
            }
        }
?>