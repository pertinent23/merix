<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'belize', '@root', [
        'title' => 'ANNONCES',
        'body' => [ AppPacker::theme( 'belize', 'pages/post', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'belize', 'global' )
        ]
    ] );
?>