<?php 
    namespace App\modules\theme\entity\AppEmployeeItem;
        use App\modules\theme\types\AppEmployee\AppEmployee;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\types\AppRole\AppRole;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppRoleItem\AppRoleItem;

        class AppEmployeeItem extends AppTimeStampItem implements AppEmployee{
            use AppContentFileItem;
            protected int $employee_id;
            protected int $role_id;
            protected string $background;
            protected string $description;
            protected string $first_name;
            protected string $last_name;
            protected int $age;

            public function __construct(
                int $role_id,
                int $file_id,
                string $background,
                string $description,
                string $first_name,
                string $last_name,
                int $age   
            ) {
               $this->setRoleId( $role_id ); 
               $this->setFileId( $file_id );
               $this->setDescription( $description );
               $this->setBackground( $background );
               $this->setFirstName( $first_name );
               $this->setLastName( $last_name );
               $this->setAge( $age );
            }

            protected function setRoleId( int $val ) : void {
                $this->role_id = $val;
            }

            protected function setAge( int $val ) : void {
                $this->age = $val;
            }

            protected function setDescription( string $val ) : void {
                $this->description = $val;
            }

            protected function setFirstName( string $val ) : void {
                $this->first_name = $val;
            }

            protected function setLastName( string $val ) : void {
                $this->last_name = $val;
            }

            protected function setBackground( string $val ) : void {
                $this->background = $val;
            }

            public function getBackground(): string {
                return $this->background;   
            }

            public function getAge(): int {
                return $this->age;
            }

            public function getDescription(): string {
                return $this->description;   
            }

            public function getEmployeeId(): int {
                return $this->employee_id;                
            }

            public function getFirstName(): string {
                return $this->first_name;
            }

            public function getLastName(): string {
                return $this->last_name;
            }

            public function getRole(): AppRole {
                return new AppRoleItem( '', '' );
            }

            public function getRoleId(): int {
                return $this->file_id;
            }
        }
?>