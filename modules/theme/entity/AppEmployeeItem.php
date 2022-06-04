<?php 
    namespace App\modules\theme\entity\AppEmployeeItem;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppEmployee\AppEmployee;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\types\AppRole\AppRole;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppRoleItem\AppRoleItem;

        class AppEmployeeItem extends AppTimeStampItem implements AppEmployee, AppCRUD{
            use AppContentFileItem;
            protected int $employee_id;
            protected int $role_id;
            protected string $background;
            protected string $first_name;
            protected string $last_name;
            protected int $age;

            public function __construct(
                int $role_id,
                int $file_id,
                string $background,
                string $first_name,
                string $last_name,
                int $age   
            ) {
               $this->setRoleId( $role_id ); 
               $this->setFileId( $file_id );
               $this->setBackground( $background );
               $this->setFirstName( $first_name );
               $this->setLastName( $last_name );
               $this->setAge( $age );
            }

            protected function setEmployeeId( int $val ) : void {
                $this->employee_id = $val;
            }

            protected function setRoleId( int $val ) : void {
                $this->role_id = $val;
            }

            protected function setAge( int $val ) : void {
                $this->age = $val;
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
                return new AppRoleItem( 1, '', '' );
            }

            public function getRoleId(): int {
                return $this->role_id;
            }

            public function create(): void {
                $req = new AppRequest( 'employee.insert', [
                    'role_id' => $this->getRoleId(),
                    'file_id' => $this->getFileId(),
                    'first_name' => $this->getFirstName(),
                    'last_name' => $this->getLastName(),
                    'background' => $this->getBackground(),
                    'age' => $this->getAge(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setEmployeeId( $req->getLastId() );
            }

            public function update(int $id): void {
                
            }

            public static function get(int $id): mixed {
                
            }

            public static function gets(int $user_id): array {
                return [];
            }

            public static function delete(int $id): bool {
                return true;
            }
        }
?>