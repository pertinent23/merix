( ( { tools, builder } ) => {
    let meta = {};
    let image = false;
    const 
        service = tools.openService( window );
        service.onData( function ( data ) {
            if ( typeof data === 'object' && typeof data.fields === 'object' ) {
                for( const name in data.fields ) {
                    const item = data.fields[ name ];
                    if ( item.type === 'image' ) {
                        image = {
                            name,
                            ...item
                        };
                        delete data.fields[ name ];
                        break;
                    }
                }
            }
            builder.build( data );
            meta = data;
        } );

        service.onOpen( () => {
            window.focus();
        } );

    tools.addEvent( 'form', 'submit', ( e ) => {
        e.preventDefault();
        const 
            form = e.target,
            result = {};
            items = Array.from( form.elements );
        for ( const id in items ) {
            const 
                field = items[ id ];
            if ( !( field instanceof HTMLButtonElement ) ) {
                if ( !field.check() ) {
                    return;
                }
                result[ field.name ] = field.value;
            }
        }
        builder.setError( '' );
        if ( meta.action ) {
            if ( !image ) {
                return tools.request( {
                    url: meta.action,
                    method: meta.method || 'POST',
                    data: result
                } ).then( result => {
                    return service.send( result.json() );
                } ).catch( err => {
                    return builder.setError( err.text() );
                } ).send();
            } else {
                const 
                    data = {
                        action: meta.action,
                        method: meta.method || 'POST',
                        data: result,
                        needed: image
                    };
                tools.fileService( data ).then( r => (
                    service.send( r )
                ) ).catch( err => {
                    service.throw( err );
                } );
            }
        }
    } )

    tools.addEvent( '.cancel', 'click', () => {
        service.cancel();
    } )
} )( window );