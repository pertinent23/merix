<?php 
    namespace App\modules\theme\entity\AppSiteItem;
        use PDO;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppSite\AppSite;
        use App\modules\theme\entity\AppFileItem\AppContentFileItem;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppSiteItem extends AppTimeStampItem implements AppSite, AppCRUD{
            use AppContentFileItem;
            private string $name;
            private string $slogan;
            private string $district;
            private string $history;
            private string $country;
            private string $position;
            private int $user_id;
            private int $site_id;

            public function __construct( 
                int $user_id,
                int $file_id,
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
                $this->setUserId( $user_id );
                if ( $file_id  ) {
                    $this->setFileId( $file_id );
                } 
            }

            private function setUserId( int $val ) : void {
                $this->user_id = $val;
            }

            public function setSiteId( int $val ) : void {
                $this->site_id = $val;
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

            public function getSiteId(): int {
                return $this->site_id;
            }

            public function create(): void {
                $req = new AppRequest( 'site.update', [
                    'user_id' => $this->getUserId(),
                    'file_id' => $this->getFileId(),
                    'name' => $this->getName(),
                    'slogan' => $this->getSlogan(),
                    'history' => $this->getHistory(),
                    'position' => $this->getPosition(),
                    'district' => $this->getDistrict(),
                    'country' => $this->getCountry(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now()
                ] );
                $req->exec();
                $this->setSiteId( $req->getLastId() );
            }

            public function update(): void {
                $req = new AppRequest( 'site.update', [
                    'site_id' => $this->getSiteId(),
                    'name' => $this->getName(),
                    'slogan' => $this->getSlogan(),
                    'history' => $this->getHistory(),
                    'position' => $this->getPosition(),
                    'district' => $this->getDistrict(),
                    'country' => $this->getCountry(),
                    'updatedAt' => AppTimeStampItem::now()
                ] );
                $req->exec();
            }

            public static function gets( int $user_id ): array {
                $req = new AppRequest( 'site.all', [
                    'user_id' => $user_id
                ] );
                $req->exec();
                $result = $req->getResult()->fetchAll( PDO::FETCH_ASSOC );
                return array_map( function ( $item ) {
                    $site = new AppSiteItem(
                        $item[ 'user_id' ],
                        $item[ 'file_id' ],
                        $item[ 'name' ],
                        $item[ 'slogan' ],
                        $item[ 'district' ],
                        $item[ 'history' ],
                        $item[ 'country' ],
                        $item[ 'position' ]
                    );
                    $site->setSiteId( intval( $item[ 'site_id' ] ) );
                    $site->setCreatedDate( $item[ 'createdAt' ] );
                    $site->setUpdatedDate( $item[ 'updatedAt' ] );
                    return $site;
                }, $result );
            }

            public static function get(int $id): mixed {
                $req = new AppRequest( 'site.get', [
                    'site_id' => $id,
                ] );
                $req->exec();
                $result = $req->getResult()->fetch( PDO::FETCH_ASSOC );
                if ( $result ) {
                    $data = new AppSiteItem(
                        $result[ 'user_id' ],
                        $result[ 'file_id' ],
                        $result[ 'name' ],
                        $result[ 'slogan' ],
                        $result[ 'district' ],
                        $result[ 'history' ],
                        $result[ 'country' ],
                        $result[ 'position' ],
                    );
                    $data->setSiteId( intval( $result[ 'site_id' ] ) );
                    $data->setCreatedDate( $result[ 'createdAt' ] );
                    $data->setCreatedDate( $result[ 'updatedAt' ] );
                    return $data;
                }
                return false;
            }

            public static function delete(int $id): bool {
                return true;
            }
        }
?>