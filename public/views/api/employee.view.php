<?php 
    use FFI\Exception;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppEmployeeItem\AppEmployeeItem;

    $first_name = AppGlobal::post( 'first_name' );
    $last_name = AppGlobal::post( 'last_name' );
    $background = AppGlobal::post( 'background' );
    $age = AppGlobal::post( 'age' );
    $role_id = AppGlobal::post( 'role_id' );
    $picture = AppGlobal::post( 'picture' );

    if ( $role_id AND $first_name AND $last_name AND $age AND $background AND $picture ) {
        $role_id = intval( $role_id );
        $age = intval( $age );
        $file_id = intval( json_decode( $picture )[ 0 ] );

        $pub = new AppEmployeeItem(
            $role_id,
            $file_id,
            $background,
            $first_name,
            $last_name,
            $age
        );

        try{
            $pub->create();
            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'role_id' => $pub->getRoleId(),
                'file_id' => $pub->getFileId(),
                'employee_id' => $pub->getEmployeeId(),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'age' => $age,
            ] );
        } catch( Exception $e ) {
            AppGlobal::setStatus( 400 );
            AppGlobal::responseJson( [
                'msg' => 'Failed to create an employee item'
            ] );
        }
    }

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing form data to create an employee'
    ] );
?>