<?php 
    namespace App\public\AppRoute;
        use App\modules\http\AppRouter\AppRouter;
        use App\modules\AppPacker\AppPacker;
        use App\modules\http\AppGlobal\AppGlobal;

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

    AppRouter::addRoute( 'account/preview', (
        useRoot(
            'PREVISUALISATION',
            [ AppPacker::addCSSView( '_preview' ) ], 
            [ AppPacker::view( 'preview' ) ],
            [ AppPacker::addJSView( 'page/preview' ) ]
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
            'MES INFORMATIONS',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/infos' ) ]
        )
    ) );

    AppRouter::addRoute( 'account/list/site',  (
        useRoot(
            'MERIX',
            [ 
                AppPacker::addCSSView( '_account' ),
                AppPacker::addCSSView( '_sites' ), 
                AppPacker::addCSSView( '_list' )
            ],
            [ AppPacker::view( 'list/site' ) ]
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

    AppRouter::addRoute( 'api/user/registration',  AppGlobal::usePost(
        AppPacker::view( 'api/registration' )
    ) );

    AppRouter::addRoute( 'api/user/login',  AppGlobal::usePost(
        AppPacker::view( 'api/login' )
    ) );

    AppRouter::addRoute( 'api/user/registration',  (
        AppPacker::view( 'api/registration' )
    ) );

    AppRouter::addRoute( 'api/files',  (
        AppPacker::view( 'api/files' )
    ) );

    AppRouter::addRoute( 'api/site', AppGlobal::usePost(
        AppPacker::view( 'api/site' )
    ) );

    AppRouter::addRoute( 'api/site/get', AppGlobal::usePost(
        AppPacker::view( 'api/site.get' )
    ) );

    AppRouter::addRoute( 'api/site/update', AppGlobal::usePost(
        AppPacker::view( 'api/site.update' )
    ) );

    AppRouter::addRoute( 'api/project', AppGlobal::usePost(
        AppPacker::view( 'api/project' )
    ) );

    AppRouter::addRoute( 'api/pub', AppGlobal::usePost(
        AppPacker::view( 'api/pub' )
    ) );

    AppRouter::addRoute( 'api/place', AppGlobal::usePost(
        AppPacker::view( 'api/place' )
    ) );

    AppRouter::addRoute( 'api/activity', AppGlobal::usePost(
        AppPacker::view( 'api/activity' )
    ) );

    AppRouter::addRoute( 'api/posttype', AppGlobal::usePost(
        AppPacker::view( 'api/posttype' )
    ) );

    AppRouter::addRoute( 'api/posttype/get', AppGlobal::usePost(
        AppPacker::view( 'api/posttype.get' )
    ) );

    AppRouter::addRoute( 'api/post', AppGlobal::usePost(
        AppPacker::view( 'api/post' )
    ) );

    AppRouter::addRoute( 'api/role', AppGlobal::usePost(
        AppPacker::view( 'api/role' )
    ) );

    AppRouter::addRoute( 'api/role/get', AppGlobal::usePost(
        AppPacker::view( 'api/role.get' )
    ) );

    AppRouter::addRoute( 'api/employee', AppGlobal::usePost(
        AppPacker::view( 'api/employee' )
    ) );

    AppRouter::addRoute( 'account/settheme', AppGlobal::useGet(
        AppPacker::view( 'settheme' )
    ) );
?>