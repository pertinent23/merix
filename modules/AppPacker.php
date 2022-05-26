<?php 
    namespace App\modules\AppPacker;
        use App\modules\AppView\AppView as AppView;
        use App\modules\AppBundle\AppBundle as AppBundle;
        use App\modules\AppFileManager\AppFileManager as AppFileManager;

        class AppPacker{
            const IMG_DEFAULT = [
                'alt' => '',
                'src' => ''
            ];
            
            const CSS_DEFAULT = [
                'href' => '',
            ];

            const JS_DEFAULT = [
                'src' => '',
            ];

            /** 
                *
                * create a return a new view 
            */
            public static function view( string $name, array $args = [ ] ) : AppView {
                return new AppView( $name, $args );
            }

            /** 
                *
                * get a new view then render it 
            */
            public static function render( string $name, array $args = [ ] ) : void {
                AppPacker::view( $name, $args )->run();
            }

            /** 
                *
                * render a bundle in the ouput stream
            */
            public static function show( AppView $app ) : void{
                $app->run();
            }

            /** 
                *
                * render all bundle  of the list
                * in the output stream 
            */
            public static function showAll( array|AppView $app ) : void{
                if ( $app instanceof AppView ) {
                    AppPacker::show( $app );
                } else if ( is_array( $app ) ) {
                    foreach ( $app as $item ) {
                        if ( $item instanceof AppView ) {
                            AppPacker::show( $item );
                        }
                    }
                }
            } 

            /** 
                *
                * return a bundle object 
            */
            public static function bundle( string $name, array $args = [ ] ) : AppBundle {
                return new AppBundle( $name, $args );
            }

            /**
                *
                * render a bundle in the output stream 
            */
            public static function addRender( string $name, array $args = [ ] ) : void {
                AppPacker::bundle( $name, $args )->run();
            }

            /**
                * add a js file to the current
                * view
            */
            public static function addJSView( string $src, array $args = AppPacker::JS_DEFAULT ) : AppBundle {
                return AppPacker::bundle( "js", array_merge(
                    AppPacker::JS_DEFAULT,
                    $args, [
                        'src' => AppFileManager::getStaticPath( "js/$src.js" )
                    ]
                ) );
            }

            /**
                * add a js file to the current
                * view
            */
            public static function addJS( string $src, array $args = AppPacker::JS_DEFAULT ) : void {
                AppPacker::addJSView( $src, $args )->run();
            }

            /** 
                *
                * this function will be use to
                * add a css file to the current view 
            */
            public static function addCSSView( string $href, array $args = AppPacker::CSS_DEFAULT ) : AppBundle {
                return AppPacker::bundle( "css", array_merge(
                    AppPacker::CSS_DEFAULT,
                    $args, [
                        'href' => AppFileManager::getStaticPath( "css/$href.css" )
                    ]
                ) );
            }

            /** 
                *
                * this function will be use to
                * add a css file to the current view 
            */
            public static function addCSS( string $href, array $args = AppPacker::CSS_DEFAULT ) : void {
                AppPacker::addCSSView( $href, $args )->run();
            }

            /** 
                *
                * this function will be use 
                * to add an img to the current 
                * view 
            */
            public static function addIMGView( string $src, array $args = AppPacker::IMG_DEFAULT ) : AppBundle {
                return AppPacker::bundle( "image", array_merge(
                    AppPacker::IMG_DEFAULT,
                    $args, [
                        'src' => AppFileManager::getAssetsPath( "$src" )
                    ]
                ) );
            }

            /** 
                *
                * this function will be use 
                * to add an img to the current 
                * view 
            */
            public static function addIMG( string $src, array $args = AppPacker::IMG_DEFAULT ) : void {
                AppPacker::addIMGView( $src, $args )->run();
            }

            /** 
                *
                * execute the AppRoute file
                * to add all routes in the routes
                * list
            */
            public static function startRoutes() : void {
                require_once( AppFileManager::getRoutesPath() );
            }
        }
?>