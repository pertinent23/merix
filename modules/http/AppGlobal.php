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

            public static function setStatus( int $code ) : void {
                http_response_code( $code );
            }

            public static function responseJson( array $list ) : void {
                echo json_encode( $list );
                die();
            }

            public static function useMethod( string $method, mixed $data ) : callable {
                return function ( AppGlobal $app ) use( $method, $data ) {
                    if ( $app->isMethod( $method ) ) {
                        return $data;
                    }
                    return false;
                };
            }

            public static function useGet( mixed $data ) : callable {
                return self::useMethod( 'get', $data );
            }

            public static function usePost( mixed $data ) : callable {
                return self::useMethod( 'post', $data );
            }

            public static function useDelete( mixed $data ) : callable {
                return self::useMethod( 'delete', $data );
            }

            public static function usePut( mixed $data ) : callable {
                return self::useMethod( 'put', $data );
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
                $this->send();
            }

            public function send() : void {
                die();
            }

            public function getPath() : string{
                return $this->path;
            }

            public function isMethod( string $method ) : bool {
                return trim( strtolower( $_SERVER[ 'REQUEST_METHOD' ] ) ) === trim( strtolower( $method ) );
            }
        }  
?>