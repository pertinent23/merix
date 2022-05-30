( tools => {
    tools.ready( () => {
        tools.addEvent( '.inscription', 'click', () => {
            console.log( 'ici' );
        } );
    } )
} )( window.tools );