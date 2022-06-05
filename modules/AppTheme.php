<?php 
    namespace App\modules\AppTheme;
        use App\modules\AppView\AppView;
        use App\modules\AppBundle\AppBundle;
        use App\modules\http\AppEnv\AppEnv;
        use App\modules\AppPacker\AppPacker;
        use App\modules\http\AppRouter\AppRouter;
        use App\modules\http\AppGlobal\AppGlobal;
        use App\modules\AppFileManager\AppFileManager;

        class AppTheme extends AppView{
            protected string $theme;
            public function __construct( string $theme, string $view, array $args = [] ){
                parent::__construct( $view, $args );
                $this->setTheme( $theme );
            }

            /** 
                *
                * this function will add 
                * a theme here  
            */
            protected function setTheme( string $theme ) : void {
                $this->theme = $theme;
            }

            /** 
                *
                * this function will return the 
                * current theme 
            */
            public function getTheme() : string {
                return $this->theme;
            }

            /** 
                *
                * this function will be use
                * to open a view of a 
                * specifi theme 
            */
            protected function open() : string {
                return AppFileManager::getThemePath( "{$this->getTheme()}/views/{$this->path}.view.php" );
            }

            /** 
                *
                * return all theme
                * configs 
            */
            public static function getThemeConfigs() : array {
                return AppPacker::getConfigs( '__themes' );
            }

            /*** 
                *
                * this function will return the
                * list of theme 
            */
            public static function getThemeList() : array {
                $themesConfigs = self::getThemeConfigs();
                    $list = array_key_exists( 'list', $themesConfigs ) ? $themesConfigs[ 'list' ] : [];
                return $list; 
            }

            /** 
                *
                * this function will return the 
                * default theme 
            */
            public static function getDefaultTheme() : string {
                return self::getThemeConfigs()[ 'default' ];
            }

            /** 
                *
                * this function will return the 
                * theme data 
            */
            public static function getThemeData( string $theme ) : array {
                $path = AppFileManager::getThemePath( "$theme/configs.json" );
                    $configs = json_decode( file_get_contents( $path ), true );
                return $configs;
            }

            /** 
                * This method will return the theme of 
                * a specific site
            */
            public static function getThemeOfSite( string $id ) : string {
                $conf = self::getThemeConfigs()[ 'sites' ];
                if ( !array_key_exists( $id, $conf ) ) {
                    return self::getDefaultTheme();
                }
                return $conf[ $id ];
            }

            /** 
                * This method will return the theme of 
                * a specific site
            */
            public static function setThemeOfSite( string $id, string $theme ) : void {
                $conf = self::getThemeConfigs();
                    $conf[ 'sites' ][ $id ] = $theme;
                    $path = AppFileManager::getConfigsPath( '__themes' );
                file_put_contents( $path,
                    json_encode( $conf, JSON_PRETTY_PRINT )
                );
            }

            /** 
                *
                * this function will be use
                * to add a theme middle ware 
            */
            public static function addThemeMiddleWare() : void {
                $configs = self::getThemeConfigs();
                AppRouter::addMiddleWare( function( AppGlobal $global ) use ( $configs ) {
                    $list = $configs[ 'list' ];
                    foreach( $list as $theme ) {
                        $themeConfigs = AppTheme::getThemeData( $theme );
                        if ( array_key_exists( 'routes', $themeConfigs ) ) {
                            $routes = $themeConfigs[ 'routes' ];
                            if ( is_array( $routes ) ) {
                                foreach( $routes as $sub_path => $view ) {
                                    if ( is_string( $sub_path ) AND is_string( $view ) ) {
                                        $path = "preview/$theme/$sub_path";
                                        if ( $path === $global->getPath() ) {
                                            AppPacker::renderThemeView( $theme, $view );
                                            $global->send();
                                        }
                                    }
                                }
                            }
                        }
                    }
                } );
            }

            public static function getAssetsPath( string $theme, string $path ) : string {
                return AppEnv::getServerLink().AppFileManager::getThemePath( "$theme/assets/$path" );
            }

            public static function addJSView( string $theme, string $path, array $args = AppPacker::JS_DEFAULT ) : AppBundle {
                return AppPacker::bundle( "js", array_merge(
                    AppPacker::JS_DEFAULT,
                    $args, [
                        'src' => self::getAssetsPath( $theme, "$path.js" )
                    ]
                ) );
            }

            public static function addCSSView( string $theme, string $path, array $args = AppPacker::CSS_DEFAULT ) : AppBundle {
                return AppPacker::bundle( "css", array_merge(
                    AppPacker::CSS_DEFAULT,
                    $args, [
                        'href' => self::getAssetsPath( $theme, "$path.css" )
                    ]
                ) );
            }

            public static function addIMGView( string $theme, string $path, array $args = AppPacker::IMG_DEFAULT ) : AppBundle {
                return AppPacker::bundle( "image", array_merge(
                    AppPacker::IMG_DEFAULT,
                    $args, [
                        'src' => self::getAssetsPath( $theme, "$path" )
                    ]
                ) );
            }

            /** 
                *
                * this function will be use 
                * to add an img to the current 
                * view 
            */
            public static function addIMG( string $theme, string $src, array $args = AppPacker::IMG_DEFAULT ) : void {
                self::addIMGView( $theme, $src, $args )->run();
            }

            /** 
                *
                * this function will be use 
                * to add a css file to the current 
                * view 
            */
            public static function addCSS( string $theme, string $src, array $args = AppPacker::CSS_DEFAULT ) : void {
                self::addCSSView( $theme, $src, $args )->run();
            }

            /** 
                *
                * this function will be use 
                * to add a js file to the current 
                * view 
            */
            public static function addJS( string $theme, string $src, array $args = AppPacker::JS_DEFAULT ) : void {
                self::addJSView( $theme, $src, $args )->run();
            }
        }
?>