<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'moo', '@root', [
        'title' => 'ALL BLACK',
        'body' => [ AppPacker::theme( 'moo', 'pages/home', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'moo', 'global' )
        ]
    ] );
?>