( ( tools, shema ) => {
    tools.ready( () => {
        tools.addEvent( '#add-new', 'click', () => {
            /*tools.formService( shema.getShema( 'sites') ).then( r => {
                //tools.redirect( 'account/sites' );
            } );*/

            tools.fileService( {} ).then( result => {
                console.log( result );
            } )
        } );
    } );
} )( window.tools, window.shema );