<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppPubItem\AppPubItem;

    $name = AppGlobal::post( 'name' );
    $site_id = AppGlobal::post( 'site_id' );
    $picture = AppGlobal::post( 'picture' );
    $description = AppGlobal::post( 'description' );

    if ( $name AND $site_id AND $description AND $picture ) {
        $site_id = intval( $site_id );
        $file_id = intval( json_decode( $picture )[ 0 ] );

        $pub = new AppPubItem(
            $site_id,
            $file_id,
            $name,
            $description
        );

        try{
            $pub->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'site_id' => $pub->getSiteId(),
                'file_id' => $pub->getFileId(),
                'pub_id' => $pub->getPubId(),
                'name' => $name,
                'description' => $description,
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create a pub item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create a pub'
    ] );
?>