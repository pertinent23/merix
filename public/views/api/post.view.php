<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppPostItem\AppPostItem;

    $label = AppGlobal::post( 'label' );
    $post_type_id = AppGlobal::post( 'post_type_id' );
    $picture = AppGlobal::post( 'picture' );
    $description = AppGlobal::post( 'description' );

    if ( $label AND $post_type_id AND $description AND $picture ) {
        $files_id = json_decode( $picture );
        $post_type_id = intval( $post_type_id );

        $post = new AppPostItem(
            $label,
            $description,
            $post_type_id
        );

        $post->setFiles( $files_id );

        try{
            $post->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'post_type_id' => $post->getPostTypeId(),
                'files_id' => $files_id,
                'post_id' => $post->getPostId(),
                'label' => $label,
                'description' => $description,
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create a post item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create a post'
    ] );
?>