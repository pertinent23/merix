<?php 
    namespace App\modules\AppUpload;
        use App\modules\AppFileManager\AppFileManager;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

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

            /** 
                *
                * return the file key
                * key list 
            */
            public static function getFileList(): array {
                $result = [];
                    foreach ( $_FILES as $key => $_ )
                        array_push( $result, $key );
                return $result;
            } 

            /** 
                *
                * this methods will be call to upload 
                * all file 
            */
            public static function uploadFile( string $key ) : bool | string {
                $infos = self::getFileInfos( $key );
                $name = strval( strtotime( AppTimeStampItem::now() ) ). '.' .$infos[ 'name' ];
                $path = AppFileManager::getUploadPath( $name );
                $result = move_uploaded_file( $infos[ 'tmp_name' ],  $path );
                chmod( $path, 0777 );
                if ( $result ) {
                    return $path;
                }
                return $result;
            }

            /** 
                *
                * this method will return  the 
                * file infos 
            */
            public static function getFileInfos( string $key ) :  array {
                $result = [ ];
                    if ( self::fileSent( $key ) ) {
                        $data = $_FILES[ $key ];
                        foreach( $data as $name => $value ) 
                            $result[ $name ] = $value;
                        $infos = pathinfo( $data[ 'name' ] );
                        $result[ 'ext' ] = $infos[ 'extension' ];
                    }
                return $result;
            }
        } 
?>