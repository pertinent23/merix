<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppPostTypeItem\AppPostTypeItem;

    $label = AppGlobal::post( 'label' );
    $site_id = AppGlobal::post( 'site_id' );

    if ( $label AND $site_id ) {
        $site_id = intval( $site_id );

        $post_type = new AppPostTypeItem(
            $site_id,
            $label
        );

        try{
            $post_type->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'site_id' => $site_id,
                'post_type_id' => $post_type->getPostTypeId(),
                'label' => $label,
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create a post type item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create a post type'
    ] );
?>