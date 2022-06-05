<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'all-black', '@root', [
        'title' => 'TOURISME',
        'body' => [ AppPacker::theme( 'all-black', 'pages/tourism' ) ],
        'head' => [
            AppTheme::addCSSView( 'all-black', 'global' )
        ]
    ] );
?>