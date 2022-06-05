<?php 
    use FFI\Exception;
    use App\modules\http\AppEnv\AppEnv;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppUserItem\AppUserItem;

        $email = AppGlobal::post( 'email' );
        $password = AppGlobal::post( 'password' );
        $name = AppGlobal::post( 'name' );
        if ( $name AND $password AND $email ) {
            $user = new AppUserItem(
                $email,
                $password,
                $name,
                $email === AppEnv::getRootEmail() ? 'admin' : 'client'
            );

            try{
                $user->create();
            } catch( Exception $e ) {
                AppGlobal::setStatus( 400 );
                AppGlobal::responseJson( [
                    'msg' => 'Email déjà utilisée'
                ] );
            }

            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( [
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'role' => $user->getRole(),
                'user_id' => $user->getUserId()
            ] );
        } 

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing data'
    ] );
?>