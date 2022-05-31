<?php 
    namespace App\public\AppRoute;
        use App\modules\http\AppRouter\AppRouter;
        use App\modules\AppPacker\AppPacker;

    function useRoot( string $title = 'MERIX', array $body = [], array $head = [], array $lazy = [] ) : callable {
        return fn() => (
            AppPacker::view( 'components/root', [
                'title'=> $title, 
                'head' => $head,
                'body' => $body,
                'lazy' => $lazy,
            ] )
        );
    }

    AppRouter::addRoute( 'index', (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_index' ), 
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.shema.list' )
            ], 
            [ AppPacker::view( 'index' ) ],
            [ AppPacker::addJSView( 'page/index' ) ]
        )
    ) );

    AppRouter::addRoute( 'account', fn() => (
        AppPacker::redirectTo( 'account/sites' )
    ) );

    AppRouter::addRoute( 'account/sites', (
        useRoot(
            'ACCUEIL',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ),
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.shema.list' )
            ], 
            [ AppPacker::view( 'sites' ) ],
            [ AppPacker::addJSView( 'page/sites' ) ]
        )
    ) );

    AppRouter::addRoute( '_/_/form', (
        useRoot(
            'MERIX',
            [ AppPacker::addCSSView( '_form' ) ],
            [ AppPacker::view( 'services/form' ) ],
            [ 
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.builder' ),
                AppPacker::addJSView( 'page/form' )
            ]
        )
    ) );

    AppRouter::addRoute( '_/_/file', (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'services/file' ) ],
            [ 
                AppPacker::addJSView( 'page/file.builder' ), 
                AppPacker::addJSView( 'page/file' ) 
            ]
        )
    ) );

    AppRouter::addRoute( 'api/user/registration',  (
        AppPacker::view( 'api/registration' )
    ) );
?>