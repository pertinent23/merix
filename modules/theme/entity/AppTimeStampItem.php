<?php 
    namespace App\modules\theme\entity\AppTimeStampItem;
        use App\modules\theme\types\AppTimeStamp\AppTimeStamp;
        class AppTimeStampItem implements AppTimeStamp{
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

            public function setCreatedDate( string $date ) : void {
                $this->createdAt = strtotime( $date );
            }

            public function setUpdatedAt( int $val ) : void {
                $this->updatedAt = $val;
            }

            public function setUpdatedDate( string $date ) : void {
                $this->updatedAt = strtotime( $date );
            }

            public function getCreatedDate( string $format = 'Y-m-d' ) : string {
                return date( $format, $this->createdAt );
            }

            public function getUpdatedDate( string $format = 'Y-m-d' ) : string {
                return date( $format, $this->updatedAt );
            }

            public function getCreatedTime( string $format = 'H:i:s' ) : string {
                return date( $format, $this->createdAt );
            }

            public function getUpdatedTime( string $format = 'H:i:s' ) : string {
                return date( $format, $this->updatedAt );
            }

            public function getCreatedDateTime() : string {
                return date( 'Y-m-d H:i:s', $this->createdAt );
            }

            public function getUpdatedDateTime() : string {
                return date( 'Y-m-d H:i:s', $this->updatedAt );
            }

            public static function now() : string {
                return date( 'Y-m-d H:i:s' );
            }
        }
?>