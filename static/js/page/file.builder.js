( tools =>  {
    const files = {
        /**
            * 
            * @param {String} path 
            * @param {String} alt 
            * @returns {HTMLDivElement}
            * *
            * this function will be use 
            * to create the image part of a
            * list item
        */
        createImage( path, alt ) {
            const 
                parent = tools.create( 'div' ),
                img = tools.create( 'img' );

                tools.attr( parent, {
                    class: 'list-item-content-image'
                } );

                tools.attr( img, {
                    src: path,
                    alt: alt
                } );
                parent.appendChild( img );
            return parent;
        },

        /**
            * 
            * @param {String} icon 
            * @returns {HTMLDivElement}
            * *
            * this function will be use
            * to create and return the icon part of
            * a list item
        */
        createIcon( icon ) {
            const 
                container = tools.create( 'div' ),
                subcontainer = tools.create( 'div' ),
                i = tools.create( 'i' ) ;

                tools.attr( container, {
                    class: 'list-item-content-image d-flex justify-content-center align-items-center'
                } );

                tools.attr( subcontainer, {
                    class: 'list-item-icon d-flex justify-content-center align-items-center'
                } );

                tools.attr( i, {
                    class: `bi bi-${ icon }`
                } );

                subcontainer.appendChild( i );
                container.appendChild( subcontainer );
            return container;
        },

        /**
            * 
            * @param {HTMLDivElement} parent 
            * @param {String} path 
            * @param {String} alt 
            * @returns {void}
            * *
            * this function will be use to append
            * an image to is parent
        */
        addImage( parent, path, alt ) {
            return parent.appendChild(
                this.createImage( path, alt )
            );
        },

        /**
            * 
            * @param {HTMLDivElement} parent 
            * @param {String} icon 
            * @returns {void}
            * *
            * this function will be use 
            * to add the created icon to the 
            * list item
        */
        addIcon( parent, icon ) {
            return parent.appendChild(
                this.createIcon( icon )
            );
        },

        /**
            * 
            * @param {HTMLDivElement} parent 
            * @param {String} title 
            * @returns {HTMLSpanElement}
            * *
            * this function will be use to 
            * add a title to a list item 
            * component
        */
        addTitle( parent, title ) {
            const 
                el = tools.create( 'span' );
                el.textContent = title;
                parent.appendChild( el );
            return el;
        },

        /**
            * 
            * @param {HTMLDivElement} parent 
            * @param {String} text 
            * @returns {HTMLParagraphElement}
            * *
            * this function will be use to 
            * add a text to a list item 
            * component
        */
        addText( parent, text ) {
            const 
                el = tools.create( 'p' );
                el.textContent = text;
                parent.appendChild( el );
            return el;
        },

        /**
            * 
            * @param {HTMLDivElement} parent 
            * @param {String} title 
            * @param {String} icon 
            * @returns {Object}
            * *
            * this function is used to create a button
            * container and a button, append them to
            * the parent container
        */
        addButton( parent, title = 'SUPPRIMER', icon = 'x-octagon-fill', callback ) {
            const 
                container = tools.create( 'div' ),
                button = tools.create( 'button' ),
                span = tools.create( 'span' ),
                i = tools.create( 'i' );
                    tools.attr( container, {
                        class: 'list-item-button-container d-flex align-items-center'
                    } );

                    tools.attr( i, {
                        class: `bi bi-${ icon }`
                    } );

                    span.textContent = title;

                    button.appendChild( i );
                    button.appendChild( span );
                    button.onclick = callback;
                    container.appendChild( button );
                parent.appendChild( container );
            return {
                container,
                button
            };
        },

        /**
            * 
            * @returns {Object}
            * * 
            * this function will create loader
            * parts then return them
        */
        createLoader() {
            const 
                loaderContainer = tools.create( 'div' ),
                loaderElement = tools.create( 'div' );

                tools.attr( loaderContainer, {
                    class: 'list-loader d-flex align-items-center'
                } );

                tools.attr( loaderElement, {
                    class: 'list-loader-item'
                } );
            return {
                loaderContainer,
                loaderElement
            };
        },

        /**
            * 
            * @param {Object} data 
            * @returns {HTMLDivElement}
            * *
            * this function will be used to 
            * create a list item element with
            * image file
        */
        createListItemWithImage( data = {} ) {
            const 
                container = tools.create( 'div' ),
                body = tools.create( 'div' );
                this.addImage( container, data.img.path, data.img.alt );

                tools.attr( body, {
                    class: 'list-item-content-data d-flex flex-column justify-content-center">'
                } );

                tools.attr( container, {
                    class: 'w-100 d-flex list-item align-items-center flex-column flex-sm-row fit'
                } );
                container.appendChild( body );
            return container;
        },

        /**
            * 
            * @param {Object} data 
            * @returns {HTMLDivElement}
            * *
            * this function will be used to 
            * create a list item element with icon
        */
        createListItemWithIcon( data = {} ) {
            const 
                container = tools.create( 'div' ),
                body = tools.create( 'div' );
                this.addIcon( container, data.icon );

                tools.attr( body, {
                    class: 'list-item-content-data d-flex flex-column justify-content-center'
                } );

                tools.attr( container, {
                    class: 'w-100 d-flex list-item align-items-center flex-column flex-sm-row fit'
                } );

                this.addTitle( body, data.title );
                this.addButton( body, data.buttonText, data.buttonIcon, typeof data.remove === 'function' ? data.remove( container ) : '' );
                container.appendChild( body );
            return container;
        },

        /**
            * 
            * @param {Object} data
            * *
            * this function will be use to 
            * add list item in the page 
        */
        addListItem( data ) {
            const 
                sibling = tools.use( '#insert-before' );
            sibling.forEach( item => {
                if ( data.icon ) {
                    item.parentElement.insertBefore(
                        this.createListItemWithIcon( data ), 
                        item
                    );
                } else {
                    item.parentElement.insertBefore(
                        this.createListItemWithImage( data ), 
                        item
                    );
                }
            } )
        },

        /**
            * 
            * @param {String} text
            * *
            * this function will be use
            * to show error in the list 
        */
        setError( text ) {
            tools.use( '.list-error' )[ 0 ].textContent = text;
        }
    };
    window.files = files;
} )( window.tools );