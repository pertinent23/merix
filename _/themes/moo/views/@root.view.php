<?php 
    use App\modules\AppView\AppView; 
    use App\modules\AppPacker\AppPacker;
    use App\modules\AppFileManager\AppFileManager;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= isset( $title ) ? $title : 'MERIX' ?> </title>
    <link rel="icon" href="<?= AppFileManager::getAssetsPath( 'icons/icon.outline.64.png' ) ?>" sizes="64x64" type="image/png">
    <?php 
        AppPacker::addCSS( 'global' );
        AppPacker::addCSS( 'icons' );
        AppPacker::addJS( 'global' );
    ?>
    <?= isset( $head ) AND ( $head instanceof AppView OR is_array( $head ) ) ? AppPacker::showAll( $head ) : '' ?>
</head>
<body>
    <?= isset( $body ) AND ( $body instanceof AppView OR is_array( $body ) ) ? AppPacker::showAll( $body ) : '' ?>
    <?= isset( $lazy ) AND ( $lazy instanceof AppView OR is_array( $lazy ) ) ? AppPacker::showAll( $lazy ) : '' ?>
    <?php 
        AppPacker::addJS( 'page/themes.tools' );
    ?>
</body>
</html>