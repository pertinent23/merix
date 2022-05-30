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
            [ AppPacker::addJSView( 'page/index' ) ]
        )
    ) );

    AppRouter::addRoute( 'form', (
        useRoot(
            'MERIX',
            [ AppPacker::addCSSView( '_form' ) ],
            [ AppPacker::view( 'form' ) ]
        )
    ) );
?>