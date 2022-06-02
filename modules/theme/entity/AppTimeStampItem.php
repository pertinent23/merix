<?php 
    namespace App\modules\theme\entity\AppTimeStampItem;
        class AppTimeStampItem{
            protected int $createdAt;
            protected int $updatedAt;

            public function getCreatedAt() : int {
                return $this->createdAt;
            }

            public function getUpdatedAt() : int {
                return $this->updatedAt;
            }

            public function setCreatedAt( int $val ) : void {
                $this->createdAt = $val;
            }

            public function setUpdatedAt( int $val ) : void {
                $this->updatedAt = $val;
            }
        }
?>