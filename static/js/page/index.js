( ( tools, shema ) => {
    tools.ready( () => {
        tools.addEvent( '.inscription', 'click', () => {
            tools.formService( shema.getShema( 'signUp') ).then( r => {
                window.localStorage.setItem( 'user', 
                    JSON.stringify( r ) 
                );
                tools.redirect( 'account/sites' );
            } );
        } );

        tools.addEvent( '.connection', 'click', () => {
            tools.formService( shema.getShema( 'signIn') ).then( r => {
                window.localStorage.setItem( 'user', 
                    JSON.stringify( r ) 
                );
                tools.redirect( 'account/sites' );
            } );
        } );
    } );
} )( window.tools, window.shema );