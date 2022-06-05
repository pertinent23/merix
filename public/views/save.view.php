<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\AppFileManager\AppFileManager;

    $path = AppFileManager::getConfigsPath();
    $configs = [
        'dbname' => $dbname,
        'password' => $password,
        'user' => $user,
        'port' => intval( $port ),
        'host' => $host
    ];

    try{
        new PDO(
            "mysql:host={$host};dbname={$dbname}",
            $user,
            $password
        );
    } catch( PDOException $e ) {
        AppPacker::redirectTo( 'install' );
        exit( 1 );
    }

    file_put_contents( $path, json_encode( $configs, JSON_PRETTY_PRINT ) );
    AppPacker::redirectTo( 'create' );
?>