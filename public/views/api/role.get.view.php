<?php 
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppRoleItem\AppRoleItem;

    $site_id = AppGlobal::post( 'site_id' );

    if ( $site_id ) {
        $list = AppRoleItem::gets( intval( $site_id ) );
        AppGlobal::setStatus( 200 );
        AppGlobal::responseJson( array_map( function ( AppRoleItem $item ) {
            return [
                'label' => $item->getLabel(),
                'description' => $item->getDescription(),
                'role_id' => $item->getRoleId()
            ];
        }, $list ) );
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to return the list of post type'
    ] );
?>