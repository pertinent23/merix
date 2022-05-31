( ( tools, shema ) => {
    tools.ready( () => {
        tools.addEvent( '.inscription', 'click', () => {
            tools.formService( shema.getShema( 'signUp') ).then( r => {
                tools.redirect( 'account/sites' );
            } );
        } );

        tools.addEvent( '.connection', 'click', () => {
            tools.formService( shema.getShema( 'signIn') ).then( r => {
                tools.redirect( 'account/sites' );
            } );
        } );
    } );
} )( window.tools, window.shema );