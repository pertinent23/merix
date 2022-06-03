<?php 
    namespace App\modules\AppBundle;
        use App\modules\AppView\AppView;
        use App\modules\AppFileManager\AppFileManager;

        class AppBundle extends AppView{
            /** 
                *
                * this function will be use
                * to open a bundle file 
            */
            protected function open() : string {
                return AppFileManager::getBunglePath( $this->path );
            }
        }
?>