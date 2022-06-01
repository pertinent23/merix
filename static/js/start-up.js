( tools => {
    tools.use( '#nav-knowledge' ).forEach( item => {
        return tools.use( `#${item.value}` ).forEach( item => {
            return item.classList.add( 'active' );
        } )
    } );
} )( window.tools );