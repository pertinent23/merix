<?php  
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppSiteItem\AppSiteItem;
    use App\modules\theme\entity\AppRoleItem\AppRoleItem;
    use App\modules\theme\entity\AppPostTypeItem\AppPostTypeItem;

    $name = AppGlobal::post( 'name' );
    $district = AppGlobal::post( 'district' );
    $slogan = AppGlobal::post( 'slogan' );
    $country = AppGlobal::post( 'country' );
    $position = AppGlobal::post( 'position' );
    $history = AppGlobal::post( 'history' );
    $picture = AppGlobal::post( 'picture' );
    $user_id = AppGlobal::post( 'user_id' );

    if ( $name AND $district AND $slogan AND $country AND $position AND $history AND $user_id AND $picture ) {
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

        function createItems( int $site_id ) {
            $mayor = new AppRoleItem(
                $site_id,
                'mayor',
                'Maire de la commune'
            );

            $deputy_mayor = new AppRoleItem(
                $site_id,
                'deputy-mayor',
                'Adjoint au Maire'
            );

            $secretary = new AppRoleItem(
                $site_id,
                'secretary',
                'Secrétaire à la marie'
            );

            $wedding = new AppPostTypeItem(
                $site_id,
                'wedding'
            );

            $death = new AppPostTypeItem(
                $site_id,
                'death'
            );

            $birth = new AppPostTypeItem(
                $site_id,
                'birth'
            );

            $mayor->create();
            $deputy_mayor->create();
            $secretary->create();
            $wedding->create();
            $death->create();
            $birth->create();
        };

        try {
            $site->create();
            AppGlobal::setStatus( 200 );
            createItems( $site->getSiteId() );
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