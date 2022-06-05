<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'all-black', '@root', [
        'title' => 'ANNONCES',
        'body' => [ AppPacker::theme( 'all-black', 'pages/post' ) ],
        'head' => [
            AppTheme::addCSSView( 'all-black', 'global' )
        ]
    ] );
?>