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
            'SITES',
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

    AppRouter::addRoute( 'account/dashboard', (
        useRoot(
            'DASHBOARD',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.shema.list' )
            ], 
            [ AppPacker::view( 'dashboard' ) ],
            [ 
                AppPacker::addJSView( 'page/dashboard' ),
                AppPacker::addJSView( 'start-up' ) 
            ]
        )
    ) );

    AppRouter::addRoute( 'account/settings', (
        useRoot(
            'PARAMETRES',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_settings' ),
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.shema.list' )
            ], 
            [ AppPacker::view( 'settings' ) ],
            [ 
                AppPacker::addJSView( 'page/settings' ),
                AppPacker::addJSView( 'start-up' ) 
            ]
        )
    ) );

    AppRouter::addRoute( 'account/themes', (
        useRoot(
            'THEMES',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_themes' ),
                AppPacker::addJSView( 'page/form.shema' ),
                AppPacker::addJSView( 'page/form.shema.list' )
            ], 
            [ AppPacker::view( 'themes' ) ],
            [ 
                AppPacker::addJSView( 'page/themes' ),
                AppPacker::addJSView( 'start-up' )
            ]
        )
    ) );

    AppRouter::addRoute( 'account/list/projects',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/projects' ) ]
        )
    ) );

    AppRouter::addRoute( 'account/list/pubs',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/pubs' ) ]
        )
    ) );

    AppRouter::addRoute( 'account/list/places',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/places' ) ]
        )
    ) );

    AppRouter::addRoute( 'account/list/posts',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/posts' ) ]
        )
    ) );

    AppRouter::addRoute( 'account/list/activities',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/activities' ) ]
        )
    ) );

    AppRouter::addRoute( 'account/list/employees',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/employees' ) ]
        )
    ) );

    AppRouter::addRoute( 'account/list/infos',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/infos' ) ]
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

    AppRouter::addRoute( 'api/files',  (
        AppPacker::view( 'api/files' )
    ) );

    AppRouter::addRoute( 'api/site',  (
        AppPacker::view( 'api/site' )
    ) );
?>