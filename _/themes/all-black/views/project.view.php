<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'all-black', '@root', [
        'title' => 'PROJETS',
        'body' => [ AppPacker::theme( 'all-black', 'pages/project', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'all-black', 'global' )
        ]
    ] );
?>