<?php 
    namespace App\modules\db\AppDataBase;
        use App\modules\AppFileManager\AppFileManager;
        use App\modules\AppPacker\AppPacker;
        use PDO;
        use PDOException;

        global $configs;
        $configs = include(
            AppFileManager::getConfigsPath()
        );

        class DataBase{
            /** 
                *
                * this field will content the
                * name of the data base 
            */
            protected string $dbname;

            /** 
                *
                * this field will content the
                * host name 
            */
            protected string $host;

            /** 
                *
                * this field will content the 
                * database user 
            */
            protected string $user;

            /** 
                *
                * this field will content the password
                * of the database user 
            */
            protected string $password;

            /** 
                *
                * this field will content the port 
                * of the database server 
            */
            protected int $port;

            /** 
                *
                * this field will content the 
                * PDO instance of the server 
            */
            protected PDO $statement;

            /** 
                *
                * In the constructor we have to verify
                * if configs of the data base have been 
                * passed and if these configs are not null
            */
            public function __construct( array|null $_ = null ) {
                global $configs;
                if ( !$_ ) {
                    $_ = $configs;
                } else {
                    $_ = array_merge( $configs, $_ );
                }
                $this->build(
                    $configs
                );
            }

            /** 
                *
                * add db name to the
                * db manager 
            */
            protected function setDBName( string $name ) : void {
                $this->dbname = $name;
            }

            /** 
                *
                * add host to the database
                * manager 
            */
            protected function setHost( string $host ) : void {
                $this->host = $host;
            }

            /** 
                *
                * add the user of the 
                * data base 
            */
            protected function setUser( string $user ) : void {
                $this->user = $user;
            }

            /** 
                *
                * set ths password of the
                * database 
            */
            protected function setPassword( string $password ) : void {
                $this->password = $password;
            }

            /** 
                *
                * set the port of the
                * database 
            */
            protected function setPort( int $port ) : void {
                $this->port = $port;
            }

            /** 
                *
                * this function will extract
                * information in the config map
                * and put them in the database 
                * object
            */
            protected function build( array $data ) : void {
                $this->setDBName( $data[ 'dbname' ] );
                $this->setHost( $data[ 'host' ] );
                $this->setPassword( $data[ 'password' ] );
                $this->setUser( $data[ 'user' ] );
                $this->setPort( $data[ 'port' ] );
                $this->connect();
            }

            /** 
                *
                * this function will connect to 
                * the data base 
            */
            protected function connect() : void {
                try{
                    $this->setStatement(
                        new PDO(
                            "mysql:host={$this->host};dbname={$this->dbname}",
                            $this->user,
                            $this->password
                        )
                    );
                } catch( PDOException $e ) {
                    http_response_code( 500 );
                        AppPacker::render( 'error', [
                            'message' => $e->getMessage()
                        ] );
                    exit( 1 );
                }
            }

            /** 
                *
                * set the PDO 
                * statement 
            */
            protected function setStatement( PDO $st ) : void {
                $this->statement = $st;
            }

            /** 
                *
                * return the current pdo
                * instance object 
            */
            public function getPDO() : PDO {
                return $this->statement;
            }
        }  
?>