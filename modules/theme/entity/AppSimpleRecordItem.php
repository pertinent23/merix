<?php 
    namespace App\modules\theme\entity\AppSimpleRecordItem;
        trait AppSimpleRecordItem{
            protected string $description;
            protected string $name;
            protected int $site_id;

            protected function setName( string $val ): void {
                $this->name = $val;
            }

            protected function setSiteId( int $val ): void {
                $this->site_id = $val;
            }

            protected function setDescription( string $val ): void {
                $this->description = $val;
            }

            public function getName(): string {
                return $this->name;
            }

            public function getDescription(): string {
                return $this->description;   
            }

            public function getSiteId() : int {
                return $this->site_id;
            }
        }

        trait AppSimpleLabelRecordItem{
            protected string $description;
            protected string $label;
            protected int $site_id;

            protected function setLabel( string $val ): void {
                $this->label = $val;
            }

            protected function setSiteId( int $val ): void {
                $this->site_id = $val;
            }

            protected function setDescription( string $val ): void {
                $this->description = $val;
            }

            public function getLabel(): string {
                return $this->label;
            }

            public function getDescription(): string {
                return $this->description;   
            }

            public function getSiteId() : int {
                return $this->site_id;
            }
        }
?>