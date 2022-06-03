<?php 
    use App\modules\AppView\AppView; 
    use App\modules\http\AppEnv\AppEnv;
    use App\modules\AppPacker\AppPacker;
    use App\modules\AppFileManager\AppFileManager;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.$_SERVER_URL = "<?= AppEnv::getServerLink() ?>";
        window.$_CREATE_URL = function ( $path ) {
            return this.$_SERVER_URL + $path
        };
    </script>
    <title> <?= $title ?> </title>
    <link rel="icon" href="<?= AppFileManager::getAssetsPath( 'icons/icon.outline.16.png' ) ?>" sizes="16x16" type="image/png">
    <link rel="icon" href="<?= AppFileManager::getAssetsPath( 'icons/icon.outline.32.png' ) ?>" sizes="32x32" type="image/png">
    <link rel="icon" href="<?= AppFileManager::getAssetsPath( 'icons/icon.outline.64.png' ) ?>" sizes="64x64" type="image/png">
    <link rel="icon" href="<?= AppFileManager::getAssetsPath( 'icons/icon.outline.256.png' ) ?>" sizes="256x256" type="image/png">
    <?php 
        AppPacker::addCSS( 'global' );
        AppPacker::addCSS( 'icons' );
        AppPacker::addCSS( '_base' );
        AppPacker::addJS( 'global' );
    ?>
    <?= isset( $head ) AND ( $head instanceof AppView OR is_array( $head ) ) ? AppPacker::showAll( $head ) : '' ?>
</head>
<body>
    <?php AppPacker::render( 'loader' ); ?>
    <?= isset( $body ) AND ( $body instanceof AppView OR is_array( $body ) ) ? AppPacker::showAll( $body ) : '' ?>
    <?= isset( $lazy ) AND ( $lazy instanceof AppView OR is_array( $lazy ) ) ? AppPacker::showAll( $lazy ) : '' ?>
    <?php AppPacker::addJS( 'loader' ); ?>
</body>
</html>