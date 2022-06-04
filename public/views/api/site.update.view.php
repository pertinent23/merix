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
    $site_id = AppGlobal::post( 'site_id' );

    if ( $name AND $district AND $slogan AND $country AND $position AND $history AND $site_id ) {
        $site_id = intval( $site_id );
        $site = new AppSiteItem( 0, 0, 
            $name,
            $slogan,
            $district,
            $history,
            $country,
            $position
        );
        $site->setSiteId( $site_id );
        try {
            $site->update();
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
                'msg' => 'Failed to update a site item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to update a site'
    ] );
?>