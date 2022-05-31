( ( { tools, builder, shema } ) => {
    let meta = {};
    const 
        service = tools.openService( window );
        service.onData( function ( data ) {
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
            return tools.request( {
                url: meta.action,
                method: meta.method || 'POST',
                data: result
            } ).then( result => {
                return service.send( result.json() );
            } ).catch( err => {
                return builder.setError( err.text() );
            } ).send();
        }
    } )

    tools.addEvent( '.cancel', 'click', () => {
        service.cancel();
    } )
} )( window );