<?php 
    namespace App\modules\theme\entity\AppFileItem;
        use App\modules\theme\types\AppFile\AppFile;
        use App\modules\theme\types\AppFile\AppFileMap; 
        use App\modules\theme\types\AppFile\AppContentFile;
        use App\modules\theme\types\AppFile\AppContentFileList;
        use App\modules\theme\entity\AppTimeStampItem\AppTimeStampItem;

        class AppFileItem extends AppTimeStampItem implements AppFile{
            protected string $url;
            protected string $type;
            protected string $title;
            protected string $description;
            protected int $file_id;

            public function __construct( string $url, string $title, string $description, string $type )
            {
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

            public function getFileId(): int
            {
                return $this->file_id;
            }

            public function getDescription(): string
            {
                return $this->description;
            }

            public function getTitle(): string
            {
                return $this->title;
            }

            public function getUrl(): string
            {
                return $this->url;
            }

            public function getType(): string
            {
                return $this->type;
            }
        }

        class AppContentFileItem extends AppTimeStampItem implements AppContentFile{
            protected AppFileItem $file;

            public function getFile(): AppFile
            {
                return $this->file;
            }
        }

        class AppContentFileListItem extends AppTimeStampItem implements AppContentFileList {
            protected array $list = [];
            protected AppFileMap $map;

            public function __construct( array $details )
            {
                $this->list = $details;
                $this->map = new AppFileMap( $details );
            }

            public function getFileList(): AppFileMap
            {
                return $this->map;
            }
        }
?>