<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppActivityItem\AppActivityItem;

    $name = AppGlobal::post( 'name' );
    $site_id = AppGlobal::post( 'site_id' );
    $picture = AppGlobal::post( 'picture' );
    $description = AppGlobal::post( 'description' );

    if ( $name AND $site_id AND $description AND $picture ) {
        $site_id = intval( $site_id );
        $files_id = json_decode( $picture );

        $activity = new AppActivityItem(
            $site_id,
            $name,
            $description
        );

        $activity->setFiles( $files_id );

        try{
            $activity->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'site_id' => $activity->getSiteId(),
                'files_id' => $files_id,
                'activity_id' => $activity->getActivityId(),
                'name' => $name,
                'description' => $description,
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create an activity item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create an activity'
    ] );
?>