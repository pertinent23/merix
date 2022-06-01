( tools => {
    let id = 0;
    let list = {};
    let meta = {};
    let needed = {
        exts: [ 'jpg', 'png', 'jpeg' ]
    };
    const 
        service = tools.openService( window );
        button = tools.use( '#add-new' )[ 0 ],
        file = tools.use( '#file' )[ 0 ];

        service.onOpen( () => {
            window.focus();
        } );

        service.onData( data => {
            meta = data;
            needed = data.needed;
            if ( needed.multiple ) {
                file.multiple = true;
            }
        } );
    
    function getId() {
        return (id++) + '_button_id';
    };

    function getListFile() {
        const 
            result = [];
                for ( let id in list )
                    result.push( list[ id ] );
        return result;
    };

    function check() {
        if ( getListFile().length ) {
                button.style.display = 'none';
            return;
        }
        button.style.display = 'flex';
    }
    
    file.addEventListener( 'change', function () {
        const 
            listFiles = Array.from( this.files );
        if ( listFiles.length ) {
            for( const item of listFiles ) {
                const 
                    ext = item.name.split( '.' ).pop().toLowerCase(),
                    id = getId();
                if ( ( needed.exts || [ ] ).indexOf( ext ) === -1 ) {
                        files.setError( `invalid file extension: '${ext}'` );
                    return;
                }
                files.setError( '' );
                list[ id ] = item;
                files.addListItem( {
                    icon:  ext === 'pdf' ? 'file-earmark-pdf-fill' : 'file-earmark-image',
                    title: item.name,
                    id, 
                    remove( container ) {
                        return function () {
                            container.parentNode.removeChild( container );
                            delete list[ id ];
                            check();
                        };
                    }
                } );
            }
            button.style.display = 'none';
        }
    } );

    tools.addEvent( '#finish-service', 'click', () => {
        if ( getListFile().length ) {
            return tools.request( {
                url: 'api/files',
                method: 'POST',
                data: list
            } ).then( result => {
                const 
                    final = {
                        ...meta.data
                    };
                    final[ needed.name ] = result.json();
                return tools.request( {
                    url: meta.action,
                    method: meta.method || 'POST',
                    data: final
                } ).then( result => {
                    return service.send( result.json() );
                } ).catch( err => {
                    return builder.setError( err.text() );
                } ).send();
            } ).catch( err => {
                return files.setError( err.text() );
            } ).send();
        } else {
            files.setError( 'None file selected' );
        }
    } );

    tools.addEvent( '#cancel-service', 'click', () => {
        service.cancel();
    } );
} )( window.tools );