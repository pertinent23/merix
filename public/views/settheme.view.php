<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\AppTheme\AppTheme;
    use App\modules\http\AppGlobal\AppGlobal;

    $list = AppTheme::getThemeList();
    $theme_map = [];

    $site_id = AppGlobal::get( 's' );
    $user_id = AppGlobal::get( 'i' );
    $theme = AppGlobal::get( 't' );

    if ( !$site_id OR !$user_id OR !$theme ) {
        AppPacker::redirectTo( 'account/sites' );
    }

    AppTheme::setThemeOfSite( $site_id, $theme );
    AppPacker::redirectTo( "account/dashboard?s=$site_id&i=$user_id" );
?>
