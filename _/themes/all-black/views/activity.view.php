<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'all-black', '@root', [
        'title' => 'ACTIVITE',
        'body' => [ AppPacker::theme( 'all-black', 'pages/activity' ) ],
        'head' => [
            AppTheme::addCSSView( 'all-black', 'global' )
        ]
    ] );
?>