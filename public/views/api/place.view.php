<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppPlaceItem\AppPlaceItem;

    $name = AppGlobal::post( 'name' );
    $site_id = AppGlobal::post( 'site_id' );
    $picture = AppGlobal::post( 'picture' );
    $description = AppGlobal::post( 'description' );

    if ( $name AND $site_id AND $description AND $picture ) {
        $site_id = intval( $site_id );
        $files_id = json_decode( $picture );

        $place = new AppPlaceItem(
            $site_id,
            $name,
            $description
        );

        $place->setFiles( $files_id );

        try{
            $place->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'site_id' => $place->getSiteId(),
                'files_id' => $files_id,
                'place_id' => $place->getPlaceId(),
                'name' => $name,
                'description' => $description,
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create a place item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create a place'
    ] );
?>