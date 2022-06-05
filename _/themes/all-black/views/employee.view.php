<?php 
    use App\modules\AppTheme\AppTheme;
    use App\modules\AppPacker\AppPacker;
    
    AppPacker::renderThemeView( 'all-black', '@root', [
        'title' => 'EMPLOYEE',
        'body' => [ AppPacker::theme( 'all-black', 'pages/employee', [
            's' => isset( $s ) ? $s : 0 
        ] ) ],
        'head' => [
            AppTheme::addCSSView( 'all-black', 'global' )
        ]
    ] );
?>