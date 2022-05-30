<?php 
    namespace App;
        define( 'views', './public/views/' );
        define( 'bundles', './public/bundles/' );
        define( 'static', 'static/' );
        define( 'assets', 'static/assets/' );
        define( 'routes', './public/AppRoute.php' );
        define( 'sql', './_/sql/' );
        define( 'configs', './_/configs/' );

        function __split_file( string $name = "" ) {
            $result = preg_split( '#^App\\\#', $name );
            if ( $result ) {
                return $result[ 1 ];
            }
        }

        function __explode( string $path = '' ) {
            $list = explode( '\\', $path );
            array_pop( $list );
            return implode( '/', $list );
        }

        function __getFileName( string $path ) {
            return "$path.php";
        }

        function __load( string $path ) {
            include_once( $path );
        }

        /**
            *
            * now i can auto load
            * my class 
        */

        spl_autoload_register( function ( $class ) {
            __load(
                __getFileName(
                    __explode(
                        __split_file( $class )
                    )
                )
            );
        } );
?>