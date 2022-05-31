( wn => {
    'use strict';
    
    String.prototype.json = function () {
        return JSON.parse( this );
    };

    const tools = {
        /** 
            *
            * this object contains list
            * of active service in the web page 
        */
        services: {},
    
        /**
            * 
            * @param {String|Array} selector 
            * @returns {Array}
            * *
            * This function will selectet elements
            * and return its in an array
        */
        getElements( selector = '*' ) {
            if ( Array.isArray( selector ) ) {
                return selector;
            }
            let 
                result = [];
                    try{
                        result = document.querySelectorAll( selector );
                    } catch( e ) {}
            return result;
        },

        /**
            * 
            * @param {String} selector 
            * @returns {Array}
            * *
            * Alias of getELements by 
            * of the same object
        */
        use( selector ) {
            return this.getElements( selector );
        },

        /**
            * 
            * @param {String} el 
            * @returns {HTMLElement}
        */
        create( el = 'div' ) {
            if ( el instanceof Element )
                return el;
            return document.createElement( el );
        },

        /**
            * 
            * @param {HTMLElement} el 
            * @param {Object|String} map 
            * @param {String|null} value 
            * @returns {String}
            * *
            * this function will be used to
            * manage attributes of an HTMLElement 
        */
        attr( el, map = {}, value = '' ) {
            if ( el instanceof Element ) {
                if ( map && typeof map === 'string' && value != null && value != undefined ) {
                    el.setAttribute( map, value );
                } else {
                    if ( typeof map ==='object' && !Array.isArray( map ) ) {
                        for( const key in map ) {
                            el.setAttribute( key, map[ key ] );
                        }
                    } else {
                        if ( typeof map === 'string' ) {
                            return el.getAttribute( map );
                        }
                    }
                }
            }
            return this;
        },

        /**
            * 
            * @param {HTMLElement} el 
            * @param {String} text
            * *
            * this function will be use
            * to add text to an html element 
        */
        text( el, text ) {
            if ( el instanceof HTMLElement && typeof text === 'string' ) {
                el.textContent = text;
            }
            return this;
        },
    
        /**
            * 
            * @param {String|Array} selector 
            * @param {Boolean} phase 
            * @param {String} event 
            * @param {Function} callback 
        */
        addEvent( selector, event, callback, phase = false ) {
            const 
                els = tools.getElements( selector );
            els.forEach( item => {
                if ( item instanceof HTMLElement ) {
                    if ( item.nodeType === 1 ) 
                        item.addEventListener( event, callback, phase );
                } 
            } );
        },
    
        /**
            * 
            * @param {String} $path 
            * @returns {String}
            * * 
            * this function will return
            * a path of a service
        */
        getService( $path ) {
            return $_CREATE_URL(  $path )
        },
    
        /**
            * 
            * @param {String} path
            * * 
            * this function will be use
            * to redirect another page
        */
        redirect( path ) {
            window.location.href = this.getService( path );
        },
    
        /**
            * 
            * @param {Function} callback
            * *
            * this function will run the passed function
            * when the document is ready 
        */
        ready( callback ) {
            if ( typeof callback === 'function' ) {
                if ( document.readyState === 'complete' ) {
                    callback.call( tools, tools );
                } else {
                    document.addEventListener( 'readystatechange', () => {
                        if ( document.readyState === 'complete' ) {
                            callback.call( tools, tools );
                        }
                    } );
                }
            }
        },
    
        /**
            * 
            * @param {String} type 
            * @param {Object} detail 
            * @returns 
            * *
            * this function will be use
            * to create an return an object 
            * event
        */
        getEvent( type, detail ) {
            return new CustomEvent( type, {
                detail
            } );
        },
    
        /**
            * 
            * @returns {function}
            * *
            * this function will return 
            * a an empty function
        */
        getFn() {
            return () => {}
        }
    };
    
    /**
        * 
        * @param {String} id,
        * *
        * Loader will be use
        * to manage loadding states 
    */
    tools.Loader = function ( id = '#app-loader' ) {
        this.id = id;
        this.els = tools.getElements( id );
    
        /**
            *
            * this function will be call
            * to hide the loade 
        */
        this.hide = function () {
            this.els.forEach( item => {
                if ( item instanceof HTMLElement ) {
                    item.style.display = 'none';
                }
            } )  
        };
    
        /** 
            *
            * this function will be call
            * to show the loader 
        */
        this.show = function () {
            if ( item instanceof HTMLElement ) {
                item.style.display = 'flex';
            }
        };
    
        /**
            * 
            * this function will be call
            * to end the loader when possible
        */
        this.run = function () {
            if ( document.readyState == 'complete' ) {
                setTimeout( () => this.hide(), 1000 );
            } else {
                document.addEventListener( 'readystatechange', () => {
                    if ( document.readyState === 'complete' ) {
                        setTimeout( () => this.hide(), 1000 );
                    }
                } )
            }
        };
    };
    
    /**
        * 
        * @param {String} path
        * *
        * this Object will be use
        * to manage service in a  
        * web page
    */
    tools.ServiceManager = function ( path, type ) {
        const context = this;
        let 
            frame = undefined,
            onError = tools.getFn(),
            onResult = tools.getFn(),
            onOpen = tools.getFn(),
            onClose = tools.getFn(),
            onCancel = tools.getFn(),
            options = {
                width: 450,
                height: 600
            };
        this.path = path;
    
        /**
            *
            * this function will be call
            * to mark the service like
            * active 
        */
        function setActive( frame ) {
            tools.services[ path ] = frame;
        }
    
        /**
            *
            * this function will be call
            * to mark the service like 
            * unactive in the web page 
        */
        function setUnactive() {
            delete tools.services[ path ];
        }
    
        /**
            * 
            * @returns {Object}
            * * 
            * this function will be use
            * to return the options of the 
            * frame on the screen 
        */
        function getPosition() {
            const 
                w = window.screen.width - options.width,  
                h = window.screen.height - options.height; 
            return {
                x: w / 2,
                y: h / 2
            } 
        };
    
        /**
            * 
            * @returns {Window}
            * *
            * this function will be call
            * to return the service window
        */
        function letsOpen() {
            const 
                pos = getPosition(),
                params = `popup=true,width=${options.width},height=${options.height},left=${pos.x},top=${pos.y},noopener=false`;
            return frame = window.open(
                path,
                type || '_blank',
                params
            );
        }
    
        /**
            * 
            * @param {Window} wn 
            * *
            * this function is used to 
            * apply events to the frame
        */
        function useEvents( wn ) {
            wn.addEventListener( 'load', () => {
                onOpen.call( wn, context );
                wn.focus();
            } );
            
            wn.addEventListener( 'service:cancel', () => {
                onCancel.call( wn, context );
                context.close();
            } );
    
            wn.addEventListener( 'service:result', ( response ) => {
                onResult.call( wn, response.detail, context );
                context.close();
            } );
    
            wn.addEventListener( 'service:error', ( err ) => {
                onError.call( wn, err.detail, context );
                context.close();
            } );
    
            const timer = setInterval( () => {
                if ( wn.closed ) {
                    onClose.call( wn, context );
                    context.close();
                    clearInterval( timer );
                }
            }, 1000 )
        };
    
        this.setOptions = function ( data = {} ) {
            if ( data instanceof Object ) {
                options = {
                    ...options,
                    ...data
                };
            }
        }
    
        this.open = function ( openOptions = { } ) {
            this.setOptions( openOptions );
            const 
                wn = letsOpen();
                    setActive( wn );
            useEvents( wn );
        };
    
        this.close = function () {
            if ( frame ) {
                frame.dispatchEvent(
                    tools.getEvent( 'service:close' )
                );
            }
            setUnactive();
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this function is used to manage 
            * cancel events
        */
        this.onCancel = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onCancel = callback;
            }
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this function is used to manage 
            * error events
        */
        this.onError = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onError = callback;
            }
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this function is used to manage 
            * open events
        */
        this.onOpen = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onOpen = callback;
            }
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this function is used to manage 
            * close events
        */
         this.onClose = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onClose = callback;
            }
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this function is used to manage 
            * result events
        */
        this.onResult = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onResult = callback;
            }
        };
    
        /**
            * 
            * @param {Object|Array} data 
            * *
            * this function will be use
            * to send message to the service
        */
        this.post = function ( data ) {
            if ( typeof data === 'object' && frame ) {
                frame.dispatchEvent(
                    tools.getEvent( 'service:data', data )
                );
            }
        };
    };
    
    /**
        * 
        * @param {Window} wn 
        * *
        * this object will be use 
        * to provide service 
        * between two windows
    */
    tools.Service = function ( wn ) {
        const context = this;
        let 
            onClose = tools.getFn(),
            onData = tools.getFn(),
            onOpen = tools.getFn();
        this.global = wn;
        this.data = {};
    
        function useEvents( global ) {
            global.addEventListener( 'service:close', () => {
                context.getGlobal().close()
                onClose.call( global, context )
            } );
    
            global.addEventListener( 'service:data', e => {
                context.data = e.detail;
                onData.call( global, context.data, context );
            } );
    
            global.addEventListener( 'load', e => {
                onOpen.call( global, context );
            } );
        };
    
        /**
            * 
            * @returns {Window}
            * *
            * this function will return the window object
            * of the service
        */
        this.getGlobal = function () {
            return this.global;
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this method will set the 
            * on open function event
        */
        this.onOpen = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onOpen = callback;
            }
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this method will set the 
            * on close function event
        */
        this.onClose = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onClose = callback;
            }
        };
    
        /**
            * 
            * @param {Function} callback 
            * *
            * this method will set theparams 
            * on result function event
        */
        this.onData = function ( callback ) {
            if ( typeof callback === 'function' ) {
                onData = callback;
            }
        };
    
        /**
            * 
            * @param {Array|Object} data 
            * *
            * this function will be use
            * to send data to the request frame
        */
        this.send = function ( data ) {
            if ( typeof data === 'object' ) {
                this.global.dispatchEvent(
                    tools.getEvent( 'service:result', data )
                );
            } 
        };
    
        /**
            * 
            * @param {Array|Object} data 
            * *
            * this function will be use
            * to send errors to the request frame
        */
        this.throw = function ( data ) {
            if ( typeof data === 'object' ) {
                this.global.dispatchEvent(
                    tools.getEvent( 'service:error', data )
                );
            } 
        };
    
        /**
            *
            * *
            * this function will be use
            * to cancel request to a frame
        */
        this.cancel = function () {
            this.global.dispatchEvent(
                tools.getEvent( 'service:cancel' )
            );
        };
    
        useEvents( wn );
    };
    
    /**
        * 
        * @param {String} path 
        * @param {Object} data 
        * @param {Object} details 
        * @returns {Promise<Object>}
        * * 
        * this function will provide service manager promise
    */
    tools.subscribeService = function ( path, data = {}, details = {} ) {
        return new Promise( ( resolve, reject ) => {
            if ( path in tools.services ) {
                if ( tools.services[ path ] ) {
                    return tools.services[ path ].focus();
                }
                return reject( {
                    msg: 'This service is already open'
                } );
            }
            const 
                params = typeof details.params === 'object' ? details.params : {},
                type = typeof details.type === 'string' ? details.type : '_blank',
                service = new tools.ServiceManager( path, type );
                    service.onError( err => reject( err ) );
                    service.onResult( data => resolve( data ) );
                    service.onCancel( () => reject( {
                        msg: 'Service canceled'
                    } ) );
                    service.onClose( () => reject( {
                        msg: 'Service canceled'
                    } ) );
                    service.onOpen( () => (
                        service.post( data )
                    ) )
            return service.open();
        } );
    };
    
    /**
        * 
        * @param {Window} global 
        * @returns {tools.Service}
        * *
        * this function will return a Service
        * listerner to manage service event
    */
    tools.openService = function ( global ) {
        return new tools.Service( global );
    };

    /**
        * 
        * @param {Object} data 
        * @returns {Object} 
        * * 
        * this function will be use to provide requets
        * between the client and the server
    */
    tools.request = function ( data ) {
        if ( typeof data !== 'object' || Array.isArray( data ) ) {
            throw new Error( 'tools.request invalid entry' );
        }

        const 
            form = new FormData(),
            entries = typeof data.data === 'object' ? data.data : {},
            headers = typeof data.headers === 'object' ? data.headers : {},
            xhr = new XMLHttpRequest();
            xhr.open( data.method, tools.getService( data.url ) );

            for( const name in entries ) {
                form.append( name, entries[ name ] );
            }

            for( const hn in headers ) {
                xhr.setRequestHeader( hn, headers[ hn ] );
            }

            function getErrorObject() {
                return {
                    code: xhr.status,
                    message: xhr.statusText,
                    text() {
                        return xhr.responseText;
                    },
                    json() {
                        return this.text().json();
                    }
                };
            };

        return {
            __then: tools.getFn(),
            __catch: tools.getFn(),
            /**
                * 
                * @returns {Object}
                * *
                * this function will be use to abort
                * a request
            */
            abort() {
                if ( xhr.readyState !== 4 ) 
                    xhr.abort();
                return this;
            },

            /**
                * 
                * @param {String} event 
                * @param {Function} callback 
                * @returns {Object}
                * *
                * this function will be use 
                * to add an event listener to 
                * the request
            */
            addEventListener( event, callback ) {
                    xhr.addEventListener( event, callback );
                return this;
            },

            /**
                * @returns {Object} 
                * *
                * this function will be use to send
                * the request
            */
            send() {
                    xhr.send( form );
                return this;
            },

            /**
                * 
                * @param {Function} callback 
                * * 
                * this function will be use 
                * to provide the end of the request
            */
            then( callback ) {
                if ( typeof callback === 'function' ) {
                    this.__then = callback;
                    xhr.addEventListener( 'load', e => {
                        if ( xhr.status === 200 || xhr.status === 201 ) {
                            callback.call( xhr, xhr.responseText );
                        } else {
                            if ( typeof this.__catch === 'function' ) {
                                this.__catch.call( xhr, getErrorObject() );
                            }
                        }
                    } );
                }
                return this;
            },

            /**
                * 
                * @param {Function} callback 
                * *
                * this function will be use to 
                * provide an error in then request
            */
            catch( callback ) {
                if ( typeof callback === 'function' ) {
                    this.__catch = callback;
                    xhr.addEventListener( 'abort', () => {
                        callback.call( xhr, getErrorObject() );
                    } );

                    xhr.addEventListener( 'error', () => {
                        callback.call( xhr, getErrorObject() );
                    } );
                }
                return this;
            }
        };
    };
    
    
    /**
        * 
        * @param {Object} data 
        * @param {Object} detail
        * @returns {Promise}
        * *
        * this function will be use to manage
        * form service
    */
    tools.formService = function ( data = {}, detail = {} ) {
        if ( typeof data !== 'object' || typeof detail !== 'object' )
            throw new Error( 'formService params should be objects' );
        return tools.subscribeService( tools.getService( '_/_/form' ), data, detail );
    };

    /**
        * 
        * @param {Object} data 
        * @param {Object} detail
        * @returns {Promise}
        * *
        * this function will be use to manage
        * file service
    */
     tools.fileService = function ( data = {}, detail = {} ) {
        if ( typeof data !== 'object' || typeof detail !== 'object' )
            throw new Error( 'fileService params should be objects' );
        return tools.subscribeService( tools.getService( '_/_/file' ), data, detail );
    };
    
    wn.tools = tools;
} )( window );