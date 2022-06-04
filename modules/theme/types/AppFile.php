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

        interface AppFileMap extends Iterator{

            public function __construct( array $list = [] );

            /** 
                *
                * will check if there is 
                * enough value in the map 
            */
            public function valid() : bool;

            /** 
                *
                * will restart the key
                * cursor 
            */
            public function rewind() : void;

            /** 
                *
                * will return the current 
                * key 
            */
            public function key() : int;

            /** 
                *
                * will return the current 
                * item 
            */
            public function current() : AppFile;

            /** 
                *
                * will go to the next item 
            */
            public function next() : void;
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