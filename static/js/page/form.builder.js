( wn  => {
    'use strict';
    
    const 
        tools = wn.tools,
        builder = {
            /**
                * 
                * @param {String} title
                * *
                * this function, will be use
                * to set the title of the form
            */
            setTitle( title ) {
                tools.use( '.form-title, title' ).forEach( item => {
                    item.textContent = title;
                } )
            },

            /**
                * 
                * @param {String} title 
                * *
                * this function will be use to set 
                * the description of the form
            */
            setSubTitle( title ) {
                tools.use( '.form-description' ).forEach( item => {
                    item.textContent = title;
                } )
            },

            /**
                * 
                * @param {HTMLElement} field
                * *
                * this function will be use to add
                * form field  
            */
            addField( field ) {
                tools.use( '.form-content-field' ).forEach( item => (
                    item.appendChild( field )
                ) )
            },

            /**
                * 
                * @param {String} name 
                * @param {Object} options 
                * @returns {HTMLInputElement} 
                * *
                * this function will be used
                * to create an input element 
            */
            createInput( options ) {
                const 
                    field = tools.create( 'input' );
                        tools.attr( field, {
                            placeholder: options.placeholder,
                            value: options.value,
                            type: options.type,
                            autocomplete: 'off'
                        } );
                return field;
            },

            /**
                * 
                * @param {String} name 
                * @param {Object} options 
                * @returns {HTMLTextAreaElement} 
                * *
                * this function will be used
                * to create an textarea element 
            */
            createTextarea( options ) {
                const 
                    field = tools.create( 'textarea' );
                        field.textContent = options.value;
                        tools.attr( field, {
                            placeholder: options.placeholder,
                            value: options.value
                        } );
                return field;
            },

            /**
                * 
                * @param {String} name 
                * @param {Object} options 
                * @returns {HTMLSelectElement} 
                * *
                * this function will be used
                * to create an select element 
            */
            createSelect( options ) {
                const 
                    field = tools.create( 'select' );
                        for( const item of options.options ) {
                            const 
                                node = tools.create( 'option' );
                                    node.selected = item.id === options.selected;
                                    tools.attr( node, {
                                        value: item.id       
                                    } ).text( node, item.value );
                            field.appendChild( node );
                        }
                return field;
            },

            /**
                * 
                * @param {String} text 
                * *
                * this function will be use to add 
                * error message in the form
            */
            setError( text ) {
                tools.use( '.form-error' ).forEach( item => {
                    item.textContent = text
                } );
            },

            /**
                * 
                * @param {HTMLInputElement} field 
                * @param {Array} validators 
                * *
                * this function will be used to check
                * a field
            */
            setChecker( field, validators, name ) {
                field.check = () =>  {
                    if ( !wn.shema.validateWith( field.value, validators ) ) {
                            this.setError( `Le champ ${name} est incorrect` );
                        return false;
                    }
                    return true;
                };
            }, 

            /**
                * 
                * @param {*} name 
                * @param {*} options 
                * @returns {HTMLElement}
                * *
                * this function will be use to 
                * create and return maching field
                * with type
            */
            createField( name, options = {} ) {
                if ( typeof name === 'string' && typeof options === 'object' ) {
                    let field = undefined;
                    const 
                        parent = tools.create( 'div' ),
                        i = tools.create( 'i' ),
                        label = tools.create( 'label' );

                        tools.attr( parent, {
                            class: 'field w-100 d-flex'
                        } );

                        tools.attr( i, {
                            class: `bi bi-${options.icon}`
                        } );

                        tools.attr( label, {
                            for: options.id
                        } ).text( label, options.label );

                        if ( options.type === 'select' ) {
                            field = this.createSelect( options );
                        } else if ( options.type === 'textarea' ) {
                            field = this.createTextarea( options );
                        } else {
                            field = this.createInput( options );
                        }

                        this.setChecker( field, options.validators, options.label );
                        tools.attr( field, {
                            class: 'field-control',
                            name: name,
                            id: options.id
                        } );

                        parent.appendChild( field );
                        parent.appendChild( i );
                        parent.appendChild( label );
                    return parent;
                }
            },

            /**
                * 
                * @param {Object} param0 
                * *
                * this function will be use 
                * to update submit button
            */
            setSubmit( { label, icon } ) {
                if ( label ) {
                    tools.use( '.submit-label' ).forEach( item => (
                        item.textContent = label
                    ) )
                }

                if ( icon ) {
                    tools.use( '.submit-icon' ).forEach( item => (
                        tools.attr( item, {
                            class: `bi bi-${icon}`
                        } )
                    ) )
                }
            },

            /**
                * 
                * @param {Object} param0 
                * *
                * this function will be use 
                * to update cancel button
            */
             setCancel( { label, icon } ) {
                if ( label ) {
                    tools.use( '.cancel-label' ).forEach( item => (
                        item.textContent = label
                    ) )
                }

                if ( icon ) {
                    tools.use( '.cancel-icon' ).forEach( item => (
                        tools.attr( item, {
                            class: `bi bi-${icon}`
                        } )
                    ) )
                }
            }
        };

        /**
            * 
            * @param {Object} shema 
            * *
            * this function will be used
            * to build a shema
            * in a form
        */
        builder.build = function ( shema ) {
            if ( typeof shema === 'object' ) {
                if ( shema.title ) {
                    builder.setTitle( shema.title )
                }

                if ( shema.subtitle ) {
                    builder.setSubTitle( shema.subtitle )
                }

                if ( shema.fields && typeof shema.fields === 'object'  ) {
                    for( const name in shema.fields ) {
                        const 
                            field = builder.createField( name, shema.fields[ name ] );
                        builder.addField( field );
                    }
                }

                if( shema.submit && typeof shema.submit === 'object' ) {
                    builder.setSubmit( shema.submit );
                }

                if( shema.cancel && typeof shema.cancel === 'object' ) {
                    builder.setCancel( shema.cancel );
                }
            }  
        };
    wn.builder = builder;
} )( window );