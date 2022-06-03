<?php 
    namespace App\modules\db\AppRequest;
        use App\modules\db\AppDataBase\DataBase;
        use App\modules\AppFileManager\AppFileManager;
        use App\modules\AppPacker\AppPacker;
        use App\modules\http\AppEnv\AppEnv;
        use PDO;
        use PDOStatement;

        class AppRequest{
            /** 
                *
                * this field content our
                * DataBase instance
            */
            protected DataBase $db;
            /** 
                *
                * this field content our request
                * file name 
            */
            protected string $request;
            /** 
                *
                * this field content our args list
                * of the request 
            */
            protected array $args = [];
            /** 
                *
                * this field will content the result
                * of the request 
            */
            protected PDOStatement $result;

            public function __construct( string $name, array $args = [ ] ) {
                $this->db = AppEnv::getDB();
                $this->setRequest( $name );
                $this->setArgs( $args );
            }

            /** 
                *
                * this function will return all the
                * sql queries 
            */
            protected function load() : string {
                $result = file_get_contents(
                    AppFileManager::getSQLPath(
                        $this->request
                    )
                );

                if ( !$result ) {
                    http_response_code( 500 );
                        AppPacker::render( 'error', [
                            'message' => "Failed to open the sql file {$this->request}"
                        ] );
                    exit( 1 );  
                } 
                return $result;
            }

            /** 
                *
                * this function will be use
                * to exec our requets 
            */
            public function exec() : AppRequest{
                $sql = $this->load();
                    $db = $this->db->getPDO();
                    $req = $db->prepare( $sql );
                        $req->execute(
                            $this->args
                        );
                    $this->setResult( $req );
                return $this;
            }

            /** 
                *
                * this function will set the 
                * request path value 
            */
            protected function setRequest( string $name ) : void {
                $this->request = $name;
            }

            /** 
                * this function will be set
                * request args 
            */
            protected function setArgs( array $args ) : void {
                $this->args = $args;
            }

            /** 
                *
                * this function will set the
                * pdo result 
            */
            protected function setResult( PDOStatement $st ) : void {
                $this->result = $st;
            }

            /** 
                *
                * this function will be last
                * result of the request 
            */
            public function getResult() : PDOStatement {
                return $this->result;
            }

            /** 
                *
                * return the pdo 
                * instance 
            */
            public function getPDO() : PDO{
                return $this->db->getPDO();
            }

            /** 
                *
                * return the last id 
                * insered in the table 
            */
            public function getLastId() : int {
                return intval( $this->getPDO()->lastInsertId() );
            }
        }
?>