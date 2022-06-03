<?php 
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\theme\entity\AppUserItem\AppUserItem;  

        $email = AppGlobal::post( 'email' );
        $password = AppGlobal::post( 'password' );
        if ( $password AND $email ) {
            $data = AppUserItem::login( $email, $password );

            if ( !$data ) {
                AppGlobal::setStatus( 400 );
                AppGlobal::responseJson( [
                    'msg' => 'Compte non trouvé'
                ] );
            }

            AppGlobal::setStatus( 200 );
            AppGlobal::responseJson( $data );
        } 

    AppGlobal::setStatus( 400 );
    AppGlobal::responseJson( [
        'msg' => 'Missing data'
    ] );
?>