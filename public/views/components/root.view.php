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
    <style type="text/css">
        @font-face {
            font-family: ubuntu;
            src: url( "<?= AppFileManager::getAssetsPath( 'fonts/Ubuntu-Light.ttf' ) ?>" ) format( 'tff' );
        }

        @font-face {
            font-family: plento;
            src: url( "<?= AppFileManager::getAssetsPath( 'fonts/PLENTO.ttf' ) ?>" ) format( 'tff' );
        }

        @font-face {
            font-family: north;
            src: url( "<?= AppFileManager::getAssetsPath( 'fonts/PLENTO.ttf' ) ?>" ) format( 'tff' );
        }
    </style>
    <script>
        window.$_SERVER_URL = "<?= AppEnv::getServerLink() ?>";
        window.$_CREATE_URL = function ( $path ) {
            return this.$_SERVER_URL + $path
        };
    </script>
    <title> <?= $title ?> </title>
    <?= isset( $head ) AND ( $head instanceof AppView OR is_array( $head ) ) ? AppPacker::showAll( $head ) : '' ?>
</head>
<body>
    <?= isset( $body ) AND ( $body instanceof AppView OR is_array( $body ) ) ? AppPacker::showAll( $body ) : '' ?>
</body>
</html>