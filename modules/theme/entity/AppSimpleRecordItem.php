<?php 
    namespace App\modules\theme\entity\AppSimpleRecorditem;
        trait AppSimpleRecorditem{
            protected string $description;
            protected string $name;

            public function __construct( string $description, string $name ) {
                $this->setName( $name );
                $this->setDescription( $description );
            }

            protected function setName( $val ): void {
                $this->name = $val;
            }

            protected function setDescription( $val ): void {
                $this->description = $val;
            }

            public function getName(): string {
                return $this->name;
            }

            public function getDescription(): string {
                return $this->description;   
            }
        }
?>