<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'belize', '@root', [
        'title' => 'ALL BLACK',
        'body' => [ AppPacker::theme( 'belize', 'pages/home', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'belize', 'global' )
        ]
    ] );
?>