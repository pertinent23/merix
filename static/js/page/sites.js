( ( tools, shema ) => {
    tools.ready( () => {
        tools.addEvent( '#add-new', 'click', () => {
            tools.formService( shema.getShema( 'sites') ).then( r => {
                window.location.reload();
            } );
        } );
    } );
} )( window.tools, window.shema );