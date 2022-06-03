<?php 
    namespace App\modules\theme\entity\AppUserItem;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppUser\AppUser;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppUserItem extends AppTimeStampItem implements AppUser, AppCRUD{
            protected int $user_id;
            protected string $email;
            protected string $password;
            protected string $name;
            protected string $role;

            public function __construct( string $email, string $password, string $name, string $role ) {
                $this->setEmail( $email );
                $this->setPassword( $password );
                $this->setName( $name );
                $this->setRole( $role );
            }

            protected function setUserId( int $val ) : void {
                $this->user_id = $val;
            }

            protected function setEmail( string $val ) : void {
                $this->email = $val;
            }

            protected function setPassword( string $val ) : void {
                $this->password = $val;
            }

            protected function setName( string $val ) : void {
                $this->name = $val;
            }

            protected function setRole( string $val ) : void {
                $this->role = $val;
            }

            public function getEmail(): string {
                return $this->email;
            }

            public function  getName(): string {
                return $this->name;
            }

            public function getPassword(): string {
                return $this->password;
            }

            public function getRole(): string {
                return $this->role;
            }

            public function getUserId(): int {
                return $this->user_id;
            }

            public function create(): void {
                $req = new AppRequest( 'user.insert', [
                    'email' => $this->getEmail(),
                    'password' => sha1( $this->getPassword() ),
                    'name' => $this->getName(),
                    'role' => $this->getRole(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now()
                ] );
                $req->exec();
            }

            public static function login( string $email, string $password ) : bool {
                $req = new AppRequest( 'user.login', [
                    'email' => $email,
                    'password' => sha1( $password )
                ] );
                $result = $req->exec()->getResult();
                $count = $result->fetchColumn();
                return $count === 1;
            }

            public function update( int $id ): void {
                
            }

            public static function delete( int $id ): bool {
                return false;
            }

            public static function get( int $id ) : mixed {
                return [];
            }

            public static function gets() : array {
                return [];
            }
        }
?>