<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\AppTheme\AppTheme;
    use App\modules\http\AppGlobal\AppGlobal;
    use App\modules\AppFileManager\AppFileManager;

    $list = AppTheme::getThemeList();
    $theme_map = [];

    $site_id = AppGlobal::get( 's' );
    $user_id = AppGlobal::get( 'i' );
    $theme = AppGlobal::get( 't' );

    if ( !$site_id OR !$user_id OR !$theme ) {
        AppPacker::redirectTo( 'account/sites' );
    }

    $src = AppFileManager::getConfigsPath( '__routes' );
    $route_data = AppPacker::getConfigs( '__routes' );
    $theme_data = AppTheme::getThemeData( $theme )[ 'routes' ];
    $base = "sites/$site_id";

    foreach( $theme_data as $route ) {
        $route_data[ "$base/$route" ] = [
            'params' => [
                's' => $site_id,
                'i' => $user_id
            ],
            'theme' => $theme,
            'view' =>  $route
        ];
    }

    file_put_contents( $src, json_encode( $route_data, JSON_PRETTY_PRINT ) );
    AppPacker::redirectTo( "$base/index" );
?>
