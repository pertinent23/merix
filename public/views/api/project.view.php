<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppProjectItem\AppProjectItem;

    $name = AppGlobal::post( 'name' );
    $site_id = AppGlobal::post( 'site_id' );
    $picture = AppGlobal::post( 'picture' );
    $description = AppGlobal::post( 'description' );

    if ( $name AND $site_id AND $description AND $picture ) {
        $site_id = intval( $site_id );
        $file_id = intval( json_decode( $picture )[ 0 ] );

        $project = new AppProjectItem(
            $site_id,
            $file_id,
            $name,
            $description
        );

        try{
            $project->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'site_id' => $project->getSiteId(),
                'file_id' => $project->getFileId(),
                'project_id' => $project->getProjectId(),
                'name' => $name,
                'description' => $description,
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create a project item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create a project'
    ] );
?>