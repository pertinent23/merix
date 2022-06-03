<?php 
    namespace App\modules\AppUpload;
        class AppUpload{
            /** 
                *
                * this function will verify that
                * a file have been sent in the 
                * request 
            */
            public static function fileSent( string $key ) : bool {
                return isset( $_FILES[ $key ] );
            }

            public static function getFileList(): array {
                $result = [];
                    foreach ( $_FILES as $key => $_ )
                        array_push( $result, $key );
                return $result;
            } 
        } 
?>