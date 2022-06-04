<?php 
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppPostTypeItem\AppPostTypeItem;

    $site_id = AppGlobal::post( 'site_id' );

    if ( $site_id ) {
        $list = AppPostTypeItem::gets( intval( $site_id ) );
        AppGlobal::setStatus( 200 );
        AppGlobal::responseJson( array_map( function ( AppPostTypeItem $item ) {
            return [
                'label' => $item->getLabel(),
                'post_type_id' => $item->getPostTypeId()
            ];
        }, $list ) );
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to return the list of post type'
    ] );
?>