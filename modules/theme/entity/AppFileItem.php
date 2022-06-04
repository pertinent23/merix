<?php 
    namespace App\modules\theme\entity\AppFileItem;
        use App\modules\theme\AppCRUD\AppCRUD;
        use App\modules\db\AppRequest\AppRequest;
        use App\modules\theme\types\AppFile\AppFile;
        use App\modules\theme\types\AppFile\AppFileMap; 
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppFileItem extends AppTimeStampItem implements AppFile, AppCRUD{
            protected string $url;
            protected string $type;
            protected string $title;
            protected string $description;
            protected int $file_id;

            public function __construct( string $url, string $title, string $description, string $type ) {
                $this->setUrl( $url );   
                $this->setTitle( $title );   
                $this->setDescription( $description );   
                $this->setType( $type );   
            }

            private function setUrl( string $url ) : void {
                $this->url = $url;
            }

            private function setType( string $val ) : void {
                $this->type = $val;
            }

            private function setTitle( string $val ) : void {
                $this->title = $val;
            }

            private function setDescription( string $val ) : void {
                $this->description = $val;
            }

            public function getFileId(): int {
                return $this->file_id;
            }

            public function getDescription(): string {
                return $this->description;
            }

            public function getTitle(): string {
                return $this->title;
            }

            public function getUrl(): string {
                return $this->url;
            }

            public function getType(): string {
                return $this->type;
            }

            public function create(): void {
                $req = new AppRequest( 'file.insert', [
                    'title' => $this->getTitle(),
                    'description' => $this->getDescription(),
                    'url' => $this->getUrl(),
                    'type' => $this->getType(),
                    'createdAt' => AppTimeStampItem::now(),
                    'updatedAt' => AppTimeStampItem::now()
                ] );
                $req->exec();
                $this->file_id = $req->getLastId();
            }

            public function update(int $id): void
            {
                
            }

            public static function gets( int $user_id ): array
            {
                return [];
            }

            public static function get(int $id): mixed
            {
                
            }

            public static function delete(int $id): bool
            {
                return true;
            }
        }

        trait AppContentFileItem{
            protected AppFileItem $file;
            protected int $file_id;

            public function setFile( AppFileItem $file ) : void {
                $this->file = $file;
            }

            public function getFile(): AppFile{
                return $this->file;
            }

            public function getFileId(): int{
                return $this->file_id;
            }

            public function setFileId( int $id ): void {
                $this->file_id = $id;
                $req = new AppRequest( 'file.item', [
                    'file_id' => $id
                ] );
                $result = $req->exec()->getResult()->fetch();
                $this->setFile( new AppFileItem(
                    $result[ 'url' ],
                    $result[ 'title' ],
                    $result[ 'description' ],
                    $result[ 'type' ]
                ) );
            }
        }

        trait AppContentFileListItem{
            protected array $list = [];
            protected AppFileMap $map;

            protected function setFiles( array $details ) : void {
                $this->list = $details;
                $this->map = new AppFileMap( $details );
            }

            public function getFileList(): AppFileMap {
                return $this->map;
            }
        }
?>