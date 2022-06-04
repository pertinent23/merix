( ( tools, shema ) => {
    tools.ready( () => {
        tools.addEvent( '.inscription', 'click', () => {
            tools.formService( shema.getShema( 'signUp') ).then( r => {
                window.localStorage.setItem( 'user', 
                    JSON.stringify( r ) 
                );
                tools.redirect(
                    tools.urls( 'account/sites' ).add( 'i', r.user_id ).getUrl()
                );
            } );
        } );

        tools.addEvent( '.connection', 'click', () => {
            tools.formService( shema.getShema( 'signIn') ).then( r => {
                window.localStorage.setItem( 'user', 
                    JSON.stringify( r ) 
                );
                tools.redirect(
                    tools.urls( 'account/sites' ).add( 'i', r.user_id ).getUrl()
                );
            } );
        } );
    } );
} )( window.tools, window.shema );