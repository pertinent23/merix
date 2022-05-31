<?php 
    namespace App\modules\AppView;
        use App\modules\AppFileManager\AppFileManager;

        class AppView{
            /** 
                *
                * this field content the path
                * of the current current view
            */
            protected string $path = '';

            /** 
                *
                * content the list of args
                * of the view 
            */
            protected array $args = [ ];

            public function __construct( string $path, array $args = [] ) {
                $this->setPath( $path );
                $this->setArgs( $args );
            }

            /** 
                *
                * this function will be use to
                * set the path of a view 
            */
            protected function setPath( string $path ) : void {
                $this->path = $path;
            }

            /** 
                *
                * this function will be use to set
                * args of a view 
            */
            protected function setArgs( array $agrs ) : void {
                $this->args = $agrs;
            }

            /** 
                *
                * this function will return
                * list of args of a view 
            */
            public function getAgrs() : array {
                return $this->args;
            }

            /**
                *
                *  
            */
            protected function check() : void {
                if ( !file_exists( $this->open() ) ) {
                    http_response_code( 404 );
                    exit( 1 );
                }
            }

            /** 
                *
                * this function will be use 
                * to render the view in the output
                * tream 
            */
            public function run() : void {
                $this->check();
                extract( $this->getAgrs() );
                ob_start();
                require( $this->open() );
                ob_end_flush();
            }

            /** 
                *
                * this function will be use to 
                * exec the view and return is code 
            */
            public function exec() : string {
                $this->check();
                extract( $this->getAgrs() );
                ob_start();
                require( $this->open() );
                return ob_get_clean();
            }

            /** 
                *
                * this function will be use to add
                * args to the view the render it  
            */
            public function with( array $list = [] ) : void {
                $this->setArgs( array_merge( 
                    $list, 
                    $this->getAgrs() 
                ) );
                $this->run();
            }

            /** 
                *
                * this function will be use
                * to get the view path  
            */
            protected function open() : string {
                return AppFileManager::getViewPath( $this->path );
            }
        }
?>