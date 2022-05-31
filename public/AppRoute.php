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
            [ AppPacker::addCSSView( '_index' ) ], 
            [ AppPacker::view( 'index' ) ],
            [
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.shema.list' ),
                AppPacker::addJSView( 'page/index' )
            ]
        )
    ) );

    AppRouter::addRoute( 'account', fn() => (
        AppPacker::redirectTo( 'account/home' )
    ) );

    AppRouter::addRoute( 'account/home', (
        useRoot(
            'ACCUEIL',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' )
            ], 
            [ AppPacker::view( 'sites' ) ]
        )
    ) );

    AppRouter::addRoute( '_/_/form', (
        useRoot(
            'MERIX',
            [ AppPacker::addCSSView( '_form' ) ],
            [ AppPacker::view( 'form' ) ],
            [ 
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.builder' ),
                AppPacker::addJSView( 'page/form' )
            ]
        )
    ) );

    AppRouter::addRoute( 'api/user/registration',  (
        AppPacker::view( 'api/registration' )
    ) );
?>