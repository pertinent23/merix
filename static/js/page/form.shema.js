( wn => {
    'use strict';
    
    const shema = {
        list: {},

        /** 
            *
            * validators if a map of 
            * function which will be used
            * to check a form 
        */
        validators: {
            /**
                * 
                * @param {String} val 
                * @returns { Boolean }
                * * 
                * check if the passed value is an email
            */
            email( val ) {
                return (
                    typeof val === 'string' &&
                    /^[a-z0-9]{1,}[a-z0-9_.\-]*[a-z0-9]{1,}@[a-z0-9]{1,}[a-z0-9_\-]*[a-z0-9]{0,1}\.[a-z][a-z0-9]{1,8}$/i.test( val )
                );
            },

            /**
                * 
                * @param {any} val 
                * @returns {Boolean}
                * *
                * will check if a value have been
                * defined
            */
            required( val ) {
                return (
                    val != null &&
                    val != undefined
                )
            },

            /**
                * 
                * @param {Number} min 
                * @returns {Function}
                * *
                * this function will check if the
                * length of the param is upper
                * or equal than the required len
            */
            minlen( min ) {
                return function ( val ) {
                    return (
                        typeof val === 'string' &&
                        val.length >= min
                    );
                };
            }
        },

        /**
            * 
            * @param {String} item 
            * @returns {Function}
            * * 
            * this function will return 
            * a validator function
        */
        getValidator( item ) {
            if ( item in this.validators ) {
                return this.validators[ item ];
            }
            throw new Error( `${ item } is not a valid validator` );
        },

        /**
            * 
            * @param {String} validator 
            * @param {String} value 
            * @returns {Boolean}
            * *
            * this function will use a 
            * validator function to check a 
            * form field
        */
        useValidator( validator, value ) {
            const 
                fx = this.getValidator( validator );
            return fx( value );
        },

        /**
            * 
            * @param {String|Number} val
            * @param {Array} validators 
            * *
            * will be used to check a text or a number
            * with a list of validator
        */
        validateWith( val, validators ) {
            if ( !Array.isArray( validators ) ) {
                return false;
            }

            for( const vname of validators ) {
                if ( Array.isArray( vname ) ) {
                    const 
                        [ name, data ] = vname,
                        fx = this.getValidator( name )( data );
                    if ( !fx( val ) ) {
                        return false;
                    }
                } else {
                    const 
                        fx = this.getValidator( vname );
                    if ( !fx( val ) ) {
                        return false;
                    }
                }
            }

            return true;
        },

        /**
            * 
            * @param {String} name 
            * @param {Object} data
            * *
            * this function will be use
            * to add shema in the shema 
            * list 
        */
        addShema( name, data = {} ) {
            if ( typeof name === 'string' && ( typeof data === 'object' || typeof data === 'function' ) ) {
                this.list[ name ] = data;
            }
        },

        /**
            * 
            * @param {String} name 
            * @returns {Object}
            * *
            * this function will return
            * a shema using his name
            * if the shema does not exist, the
            * function will return an empty object
        */
        getShema( name ) {
            if ( name in this.list ) {
                return this.list[ name ];
            }
            return {};
        }
    };

    /**
        * 
        * @param {String} action 
        * @param {String} method 
        * *
        * this function will be 
        * use to build form
        * shema
    */
    shema.FormShema = function ( action, method ) {
        const fields = {};
        const utils = {};
        let 
            id = 0,
            submit = undefined,
            cancel = undefined,
            title = 'FORM TITLE',
            subtitle = 'FORM DESCRIPTION TEXT';

            if ( !action || !method || typeof action !== 'string' || typeof method !== 'string' ) {
                throw new Error( 'form entries should be strings' );
            }

        /**
            * 
            * @returns {String}
            * * 
            * this function will
            * generate an unique
            * id for the form
        */
        function getId() {
            return ( id++ ) + '_form_id';
        };

        /**
            * 
            * @param {String} name 
            * @param {Object} data
            * * 
            * this function will be use 
            * to add field in the form 
        */
        function addField( name, data ) {
            fields[ name ] = data;
        };

        /**
            * 
            * @param {String} name 
            * *
            * this function will be use
            * to remove field from a form
        */
        function remove( name ) {
            delete fields[ name ];
        };

        /**
            * 
            * @param {String} type 
            * @returns {String}
            * *
            * this function will verify
            * if the type if valid
            * else the function will return
            * the type text
        */
        function getValidType( type ) {
            const 
                list = [ 'password', 'text', 'email', 'date', 'checkbox', 'radio', 'textarea', 'number' ];
            return list.indexOf( type ) !== -1 ? type : list[ 1 ];
        };

        /**
            * 
            * @param {Array} list 
            * @returns {Array}
            * *
            * this function will
            * filter all field in a option
            * list of a select which have got a 
            * good format
        */
        function getValidOptions( list = [] ) {
            return list.filter( item => (
                typeof item === 'object' &&
                'id' in item &&
                'value' in item
            ) );    
        };

        /**
            * 
            * @param {Array} list 
            * @returns {Array}
            * *
            * this function will return
            * an array of validator
        */
        function getValidators( list = [] ) {
            return list.filter( item => (
                ( typeof item === 'string' && item.trim().length ) || ( 
                    Array.isArray( item ) &&
                    item.length === 2,
                    typeof item[ 0 ] === 'string'
                )
            ) )  
        };

        /**
            * 
            * @param {String} name 
            * @param {String} icon 
            * @returns {Boolean}
        */
        function isValidButtonData( name, icon ) {
            return (
                name && icon &&
                typeof name === 'string' &&
                typeof icon === 'string'
            )  
        };

        /**
            * 
            * @param {String} key 
            * @returns {Array}
            * *
            * this function will return a
            * valid image extension list 
            * using is key
        */
        function getImages( key ) {
            const 
                img = [ 'png', 'jpg', 'jpeg' ];
            if ( key === 'pdf' ) {
                return [ 'pdf' ];
            } else {
                if ( key === 'img-pdf' ) {
                    img.push( 'pdf' );
                    return img;
                }
            }
            return img;
        };

        /**
            * 
            * @param {String} name 
            * @param {String} type 
            * @param {Object} options
            * @returns {shema.FormShema} 
            * *
            * this function will be use
            * to add a input to the form
        */
        this.addInput = function ( name, type, options = {} ) {
            options = typeof options === 'object' ? options : {};
            const validators = Array.isArray( options.validators ) ? options.validators : [];
                if ( typeof name === 'string' ) {
                    addField( name, {
                        type: getValidType( type ),
                        icon: typeof options.icon === 'string' ? options.icon : '123',
                        id: getId(),
                        label: options.label || name,
                        placeholder: options.placeholder || 'Az:',
                        value: options.value || '',
                        validators: getValidators( validators )
                    } );
                }
            return this;
        };

        /**
            * 
            * @param {String} name 
            * @param {Array} values 
            * @param {Object} options 
            * @returns {shema.FormShema}
            * *
            * this function will be use 
            * to add a select element in 
            * the form shema
        */
        this.addSelect = function ( name, values = [], options = {} ) {
            options = typeof options === 'object' ? options : {};
            values = Array.isArray( values ) ? values : [];
            const validators = Array.isArray( options.validators ) ? options.validators : [];
                if ( typeof name === 'string' ) {
                    addField( name, {
                        type: 'select',
                        icon: typeof options.icon === 'string' ? options.icon : '123',
                        id: getId(),
                        label: options.label || name,
                        selected: options.selected || '',
                        options: getValidOptions( values ),
                        validators: getValidators( validators )
                    } );
                }
            return this;
        };

        /**
            * 
            * @param {String} key 
            * @param {String} value 
            * @returns {shema.FormShema}
            * *
            * this function will be use 
            * to set an usefull value 
            * to the manager
        */
        this.addData = function ( key, value ) {
                utils[ key ] = value;
            return this;
        };

        /**
            * 
            * @param {String} name 
            * @param {Boolean} multiple 
            * @param {String} ext 
            * @returns {shema.FormShema}
            * *
            * this function will be
            * use to add image image 
            * field to a form
        */
        this.addImg = function ( name, multiple, ext = 'img' ) {
            if ( typeof name === "string" ) {
                addField( name, {
                    type: 'image',
                    multiple: typeof multiple === 'boolean' ? multiple || false : false,
                    exts: getImages( ext )
                } );
            }
            return this;
        };

        /**
            * 
            * @param {String} key 
            * @returns {shema.FormShema}
            * *
            * this method is used to remove a
            * field from the form
        */
        this.remove = function ( key ) {
                remove( key );
            return this;
        };

        /**
            * 
            * @param {String} val
            * @returns {shema.FormShema} 
            * * 
            * this function will be use
            * to set the title of the form 
        */
        this.setTitle = function ( val = '' ) {
            if ( typeof val === 'string' ) {
                title = val;
            }
            return this;
        };

        /**
            * 
            * @param {String} val
            * @returns {shema.FormShema} 
            * * 
            * this function will be use
            * to set the subtitle of the form 
        */
        this.setSubTitle = function ( val = '' ) {
            if ( typeof val === 'string' ) {
                subtitle = val;
            }
            return this;
        };

        /**
            * 
            * @param {String} label 
            * @param {String} icon 
            * @returns {shema.FormShema}
            * *
            * this function will set the submit 
            * button data
        */
        this.setSubmit = function ( label, icon ) {
            if ( isValidButtonData( label, icon ) ) {
                submit = { label, icon };
            } else if ( label && typeof label === 'string' ) {
                submit = { label };
            }
            return this;
        };

        /**
            * 
            * @param {String} label 
            * @param {String} icon 
            * @returns {shema.FormShema}
            * *
            * this function will set the cancel
            * button data
        */
         this.setCancel = function ( label, icon ) {
            if ( isValidButtonData( label, icon ) ) {
                cancel = { label, icon };
            } else if ( label && typeof label === 'string' ) {
                cancel = { label };
            }
            return this;
        };

        /**
            * 
            * @returns {Object}
            * *
            * this function will return
            * form shema to the json format
        */
        this.toJSON = function () {
            const 
                result = {
                    fields,
                    method,
                    action,
                    title,
                    subtitle,
                    utils
                };

                if ( submit ) {
                    result.submit = submit;
                }

                if ( cancel ) {
                    result.cancel = cancel;
                }
            return result;
        };
    };

    /**
        * 
        * @param {String} action 
        * @param {String} method 
        * @returns {shema.FormShema}
        * *
        * this function will be used to create
        * then return a form shema
    */
    shema.createFormShema = function ( action, method ) {
        return new shema.FormShema( action, method );  
    };

    wn.shema = shema;
} )( window );