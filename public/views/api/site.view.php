<?php  
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppSiteItem\AppSiteItem;

    $name = AppGlobal::post( 'name' );
    $district = AppGlobal::post( 'district' );
    $slogan = AppGlobal::post( 'slogan' );
    $country = AppGlobal::post( 'country' );
    $position = AppGlobal::post( 'position' );
    $history = AppGlobal::post( 'history' );
    $picture = AppGlobal::post( 'picture' );
    $user_id = AppGlobal::post( 'user_id' );

    if ( $name AND $district AND $slogan AND $country AND $position AND $history AND $user_id ) {
        $file_id = intval( json_decode( $picture )[ 0 ] );
        $user_id = intval( $user_id );
        $site = new AppSiteItem(
            $user_id,
            $file_id,
            $name,
            $slogan,
            $district,
            $history,
            $country,
            $position
        );
        try {
            $site->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'site_id' => $site->getSiteId(),
                'name' => $name,
                'slogan' => $slogan,
                'history' => $history,
                'country' => $country,
                'position' => $position,
                'district' => $district
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create a site item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create a site'
    ] );
?>