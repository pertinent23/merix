<?php
    namespace App;
        require( './_/__loader.php' );

        use App\modules\AppPacker\AppPacker;
        use App\modules\http\AppEnv\AppEnv;

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
        * here we are resolving the
        * route 
    */
    AppEnv::resolve();