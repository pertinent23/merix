<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'moo', '@root', [
        'title' => 'PROJETS',
        'body' => [ AppPacker::theme( 'moo', 'pages/project', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'moo', 'global' )
        ]
    ] );
?>