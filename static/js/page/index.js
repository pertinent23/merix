( ( tools, shema ) => {
    tools.ready( () => {
        tools.addEvent( '.inscription', 'click', () => {
            tools.formService( shema.getShema( 'signUp') ).then( r => {
                tools.redirect( 'account/home' );
            } );
        } );

        tools.addEvent( '.connection', 'click', () => {
            tools.formService( shema.getShema( 'signIn') ).then( r => {
                tools.redirect( 'account/home' );
            } );
        } );
    } );
} )( window.tools, window.shema );