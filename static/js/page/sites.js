( ( tools, shema ) => {
    tools.ready( () => {
        tools.addEvent( '#add-new', 'click', () => {
            tools.formService( shema.getShema( 'sites') ).then( r => {
                console.log( 'finish' );
                console.log( r );
                //tools.redirect( 'account/sites' );
            } );
        } );
    } );
} )( window.tools, window.shema );