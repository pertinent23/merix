<?php 
    namespace App\public\AppRoute;
        use App\modules\http\AppRouter\AppRouter;
        use App\modules\AppPacker\AppPacker;

    $globals = [
        AppPacker::addCSSView( 'global' ),
        AppPacker::addCSSView( 'icons' ),
        AppPacker::addJSView( 'global' ),
    ];

    AppRouter::addRoute( 'index', fn() => (
        AppPacker::view( 'components/root', [
            'title'=> 'MERIX', 
            'head' => [
                ...$globals
            ],
            'body' => [
                AppPacker::view( 'index' )
            ]
        ] )
    ) );

    AppRouter::addRoute( 'welcome', (
        AppPacker::view( 'test', [
            'name' => 'Franck'
        ] )
    ) );
?>