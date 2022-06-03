<?php 
    use App\modules\AppUpload\AppUpload;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppFileItem\AppFileItem;

    if ( count( $_FILES ) ) {
        $title = AppGlobal::post( 'title' );
        $description = AppGlobal::post( 'description' );
        if ( $title AND $description ) {
            $list = AppUpload::getFileList();
            $result = [];
                foreach( $list as $key ) {
                    $data = AppUpload::getFileInfos( $key );
                    if ( $data[ 'error' ]  ) {
                        AppGlobal::setStatus( 400 );
                        AppGlobal::responseJson( [
                            'msg' => "Failed to upload the file {$data['name']}"
                        ] );
                    }
                }

                foreach( $list as $name ) {
                    $path = AppUpload::uploadFile( $key );
                    $data = AppUpload::getFileInfos( $key );
                    $file = new AppFileItem(
                        $path,
                        $title,
                        $description,
                        $data[ 'type' ]
                    );
                    $file->create();
                    array_push( $result, $file->getFileId() );
                    sleep( 0.2 );
                }
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( $result );
        }
        AppGlobal::setStatus( 400 );
        AppGlobal::responseJson( [
            'msg' => 'Missing data to upload files'
        ] );
    } else {
        AppGlobal::setStatus( 400 );
        AppGlobal::responseJson( [
            'msg' => 'none file send'
        ] );
    }
?>