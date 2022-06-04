<?php 
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppSiteItem\AppSiteItem;

    $site_id = AppGlobal::post( 'site_id' );

    if ( $site_id ) {
        $item = AppSiteItem::get( intval( $site_id ) );
        if ( $item instanceof AppSiteItem ) {
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'name' => $item->getName(),
                'country' => $item->getCountry(),
                'history' => $item->getHistory(),
                'position' => $item->getPosition(),
                'district' => $item->getDistrict(),
                'slogan' => $item->getSlogan()
            ] );
        }
        AppGlobal::setStatus( 400 );
        AppGlobal::responseJson( [
            'msg' => 'Site not found'
        ] );
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to return the site'
    ] );
?>