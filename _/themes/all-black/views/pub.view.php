<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'all-black', '@root', [
        'title' => 'PUBLICITE',
        'body' => [ AppPacker::theme( 'all-black', 'pages/pub' ) ],
        'head' => [
            AppTheme::addCSSView( 'all-black', 'global' )
        ]
    ] );
?>