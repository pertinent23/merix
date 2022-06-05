<?php 
    use App\modules\AppPacker\AppPacker;
    use App\modules\db\AppRequest\AppRequest;

    $req = new AppRequest( 'install' );
    $req->exec();

    AppPacker::redirectTo();
?>