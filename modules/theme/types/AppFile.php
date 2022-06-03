<?php 
    namespace App\modules\theme\types\AppFile;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;
        use Iterator;

        interface AppFile extends AppTimeStamp{
            /** 
                *
                * this method will return the 
                * id of the current record 
            */
            public function getFileId() : int;

            /**
                *
                * this method will return the 
                * url of the current the current
                * record 
                * *
                * the base of files should be
                * the folder upload
            */
            public function getUrl() : string;

            /**
                *
                * this method will return 
                * the title of the current file 
            */
            public function getTitle() : string;

            /**
                *
                * this method will return the 
                * description of the current file 
            */
            public function getDescription() : string;

            /**
                *
                * return the type of the current
                * file 
            */
            public function getType() : string;
        }

        interface AppContentFile{
            /** 
                *
                * return the file of the current
                * record 
            */
            public function getFile() : AppFile;
        }

        class AppFileMap implements Iterator{
            protected array $map = [];
            protected int $id = 1;
            protected AppFile $item;

            public function __construct( array $list = [] ) {
                foreach( $list as $item ) {
                    if ( $item instanceof Iterator ) {
                        array_push( $this->map, $item );
                    }
                }
            }

            public function valid() : bool{
                if ( $this->id === count( $this->map ) ) {
                    return false;
                }
                return true;
            }

            public function rewind() : void {
                $this->id = 1;
                $this->item = $this->map[ 0 ];
            }

            public function key() : int {
                return $this->id - 1;
            }

            public function current() : AppFile {
                return $this->item;
            }

            public function next() : void {
                if ( $this->valid() ) {
                        $this->item = $this->map[ $this->i - 1 ];
                    $this->i++;
                }
            }
        }

        interface AppContentFileList{
            /** 
                *
                * return the file list of 
                * the current record 
            */
            public function getFileList() : AppFileMap;
        }
?>