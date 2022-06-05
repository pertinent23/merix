<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'moo', '@root', [
        'title' => 'EMPLOYEE',
        'body' => [ AppPacker::theme( 'moo', 'pages/employee', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'moo', 'global' )
        ]
    ] );
?>