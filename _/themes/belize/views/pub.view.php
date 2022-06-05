<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'belize', '@root', [
        'title' => 'PUBLICITE',
        'body' => [ AppPacker::theme( 'belize', 'pages/pub', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'belize', 'global' )
        ]
    ] );
?>