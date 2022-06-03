<?php 
    namespace App\modules\theme\entity\AppSiteItem;
        use App\modules\theme\types\AppSite\AppSite;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppSiteItem extends AppTimeStampItem implements AppSite{
            use AppContentFileItem;
            private string $name;
            private string $slogan;
            private string $district;
            private string $history;
            private string $country;
            private string $position;
            private int $user_id;
            private int $file_id;
            private int $site_id;

            public function __construct( 
                string $name, 
                string $slogan, 
                string $district,
                string $history,
                string $country,
                string $position
            ) {
                $this->setName( $name );
                $this->setSlogan( $slogan );
                $this->setCountry( $country );
                $this->setHistory( $history );
                $this->setPosition( $position );
                $this->setDistrict( $district );
            }

            private function setName( string $val ) : void {
                $this->name = $val;
            }

            private function setSlogan( string $val ) : void {
                $this->slogan = $val;
            }

            private function setDistrict( string $val ) : void {
                $this->district = $val;
            }

            private function setCountry( string $val ) : void {
                $this->country = $val;
            }

            private function setHistory( string $val ) : void {
                $this->history = $val;
            }

            private function setPosition( string $val ) : void {
                $this->position = $val;
            }

            public function getName(): string{
                return $this->name;
            }

            public function getSlogan(): string{
                return $this->slogan;
            }

            public function getDistrict(): string{
                return $this->district;
            }

            public function getHistory(): string {
                return $this->history;
            }

            public function getCountry(): string {
                return $this->country;
            }

            public function getPosition(): string{
                return $this->position;
            }

            public function getUserId(): int {
                return $this->user_id;
            }

            public function getFileId(): int{
                return $this->file_id;
            }

            public function getSiteId(): int {
                return $this->site_id;
            }
        }
?>