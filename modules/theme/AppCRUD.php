<?php 
    namespace App\modules\theme\AppCRUD;
        interface AppCRUD{
            /** 
                *
                * this method will be use 
                * to add a new item in the 
                * data base 
            */
            public function create() : void;

            /** 
                *
                * this function will be use to 
                * update an item in the database 
            */
            public function update( int $id ) : void;

            /** 
                *
                * this function will be use to 
                * select a specific items in the data
                * base 
            */
            public static function get( int $id ) : mixed;

            /** 
                *
                * this function will be use to 
                * select all items in the database
            */
            public static function gets( int $user_id ) : array;

            /** 
                *
                * this function will be use to delete an 
                * item from the data bas 
            */
            public static function delete( int $id ) : bool;
        }
?>