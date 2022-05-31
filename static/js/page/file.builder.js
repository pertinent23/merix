( tools =>  {
    const files = {
        createImage( path, alt ) {
            const 
                parent = tools.create( 'div' ),
                img = tools.create( 'img' );

                tools.attr( parent, {
                    class: 'w-100 d-flex list-item align-items-center flex-column flex-sm-row'
                } );

                tools.attr( img, {
                    src: path
                } );
            return parent;
        }
    };
} )( window.tools );