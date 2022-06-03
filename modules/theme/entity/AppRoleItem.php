<?php 
    namespace App\modules\theme\entity\AppRoleItem;
        use App\modules\theme\types\AppRole\AppRole;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppRoleItem extends AppTimeStampItem implements AppRole{
            protected string $label;
            protected string $description;
            protected int $roleId;

            public function __construct( string $label, string $description ) {
                $this->setLabel( $label );
                $this->setDescription( $description );
            }

            protected function setLabel( string $val ) : void {
                $this->label = $val;
            }

            protected function setDescription( string $val ) : void {
                $this->description = $val;
            }

            public function getDescription(): string {
                return $this->description;
            }

            public function getLabel(): string {
                return $this->label;
            }

            public function getRoleId(): int {
                return $this->roleId;
            }
        }
?>