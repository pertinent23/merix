<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppRoleItem\AppRoleItem;

    $label = AppGlobal::post( 'label' );
    $description = AppGlobal::post( 'description' );
    $site_id = AppGlobal::post( 'site_id' );

    if ( $label AND $site_id AND $description ) {
        $site_id = intval( $site_id );

        $role = new AppRoleItem(
            $site_id,
            $label,
            $description
        );

        try{
            $role->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'site_id' => $site_id,
                'role_id' => $role->getRoleId(),
                'label' => $label,
                'description' => $description
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create a role type item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create a role type'
    ] );
?>