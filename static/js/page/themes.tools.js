tools.addEvent( 'a', 'click', function ( e ) {
    e.preventDefault();
    const 
        moveUrl = tools.urls( this.href ).addParams( tools.urls().params );
    window.location = moveUrl.getUrl();
} );