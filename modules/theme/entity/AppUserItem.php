<?php 
    namespace App\modules\theme\entity\AppUserItem;
        use App\modules\theme\types\AppUser\AppUser;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppUserItem extends AppTimeStampItem implements AppUser{
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
        }
?>