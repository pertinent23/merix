<?php 
    namespace App\modules\theme\entity\AppRoleItem;
        use PDO;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppRole\AppRole;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;
        use App\modules\theme\entity\AppSimpleRecordItem\AppSimpleLabelRecordItem;

        class AppRoleItem extends AppTimeStampItem implements AppRole, AppCRUD{
            use AppSimpleLabelRecordItem;
            protected string $label;
            protected string $description;
            protected int $roleId;

            public function __construct( int $site_id, string $label, string $description ) {
                $this->setSiteId( $site_id );
                $this->setLabel( $label );
                $this->setDescription( $description );
            }

            public function getRoleId(): int {
                return $this->roleId;
            }

            public function setRoleId( int $id ) : void {
                $this->roleId = $id;
            }

            public function create(): void {
                $req = new AppRequest( 'role.insert', [
                    'site_id' => $this->getSiteId(),
                    'label' => $this->getLabel(),
                    'description' => $this->getDescription(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now(),
                ] );

                $req->exec();
                $this->setRoleId( $req->getLastId() );
            }

            public function update(): void {
                
            }

            public static function get(int $id): mixed {
                $req = new AppRequest( 'role.get', [
                    'role_id' => $id,
                ] );
                $req->exec();
                $result = $req->getResult()->fetch( PDO::FETCH_ASSOC );
                if ( $result ) {
                    $data = new AppRoleItem(
                        $result[ 'site_id' ],
                        $result[ 'label' ],
                        $result[ 'description' ]
                    );
                    $data->setRoleId( intval( $result[ 'role_id' ] ) );
                    $data->setCreatedDate( $result[ 'createdAt' ] );
                    $data->setCreatedDate( $result[ 'updatedAt' ] );
                    return $data;
                }
                return false;   
            }

            public static function gets(int $site_id): array {
                $req = new AppRequest( 'role.all', [
                    'site_id' => $site_id,
                ] );
                $req->exec();
                $result = $req->getResult()->fetchAll( PDO::FETCH_ASSOC );
                return array_map( function ( $item ) {
                    $role = new AppRoleItem(
                        $item[ 'site_id' ],
                        $item[ 'label' ],
                        $item[ 'description' ]
                    );
                    $role->setRoleId( intval( $item[ 'role_id' ] ) );
                    $role->setCreatedDate( $item[ 'createdAt' ] );
                    $role->setCreatedDate( $item[ 'updatedAt' ] );
                    return $role;
                }, $result );
            }

            public static function delete(int $id): bool {
                return true;
            }
        }
?>