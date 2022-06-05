<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'all-black', '@root', [
        'title' => 'ALL BLACK',
        'body' => [ AppPacker::theme( 'all-black', 'pages/home' ) ],
        'head' => [
            AppTheme::addCSSView( 'all-black', 'global' )
        ]
    ] );
?>