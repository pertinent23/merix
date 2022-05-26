<?php 
    namespace App\modules\http\AppGlobal;
        class AppGlobal{
            protected string $path = ''; 
            public static function get( string $key ) : mixed  {
                return isset( $_GET[ $key ] ) ? $_GET[ $key ] : null;
            }

            public static function post( string $key ) : mixed  {
                return isset( $_POST[ $key ] ) ? $_POST[ $key ] : null;
            }

            public static function session( string $key ) : mixed  {
                return isset( $_SESSION[ $key ] ) ? $_SESSION[ $key ] : null;
            }

            public static function cookie( string $key ) : mixed  {
                return isset( $_COOKIE[ $key ] ) ? $_COOKIE[ $key ] : null;
            }

            public static function header( string $key, mixed $val = '' ) : string  {
                if ( !$val ) {
                    return $_SERVER[ $key ];
                } else {
                        header( "$key: $val" );
                    return '';
                }
            }

            public function __construct( string $path = '' ) {
                $this->path = $path;
            }

            public function status( int $code ) : AppGlobal {
                http_response_code( $code );
                return $this;
            }

            public function json( array $list ) : void {
                echo json_encode( $list );
                die();
            }

            public function getPath() : string{
                return $this->path;
            }
        }  
?>