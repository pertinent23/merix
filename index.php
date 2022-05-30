<?php
    namespace App;
        require( './_/__loader.php' );

        use App\modules\http\AppEnv\AppEnv;
        use App\modules\AppPacker\AppPacker;
        use App\modules\http\AppRouter\AppRouter;
        use App\modules\http\AppGlobal\AppGlobal;

    /** 
        * when we receive a request in the
        * first step we have to create 
        * the database instance 
    */    
    AppEnv::initDB();

    /** 
        *
        * here we are starting the 
        * route manager 
    */
    AppPacker::startRoutes();
    
    /** 
        *
        * now we can resolve non derectly
        * defined routes 
    */
    AppRouter::addMiddleWare( function( AppGlobal $global ) {
        $configs = AppPacker::getConfigs( '__routes' );
        foreach ( $configs as $sub_path => $data ) {
            if ( $sub_path === $global->getPath() ) {
                if ( is_string( $data ) ) {
                    AppPacker::render( $data );
                    $global->send();
                } elseif( is_array( $data ) ) {
                    if ( array_key_exists( 'view', $data ) && is_string( $data[ 'view' ] ) ) {
                        $list = [ ];
                        if ( array_key_exists( 'params', $data ) AND is_array( $data[ 'params' ] ) ) {
                            $list = $data[ 'params' ];
                        }
                        AppPacker::render( $data[ 'view' ], $list );
                        $global->send();
                    }
                }
            }
        }
    } );

    /** 
        *
        * here we are resolving the
        * route 
    */
    AppEnv::resolve();