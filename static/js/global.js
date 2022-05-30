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
    }
};

window.tools = tools;

/**
    * 
    * @param {String} id,
    * *
    * Loader will be use
    * to manage loadding states 
*/
window.tools.Loader = function ( id = '#app-loader' ) {
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
window.tools.ServiceManager = function ( path ) {
    let frame = undefined;
    let options = {
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
    function setActive() {
        tools.services[ path ] = true;
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
            params = `popup=true,width=${options.width},height=${options.height},left=${pos.x},top=${pos.y}`;
        return frame = window.open(
            path,
            '_blank',
            params
        );
    }

    this.open = function ( openOptions = { } ) {
        setActive();
    };

    this.close = function () {
        if ( this.frame ) {
            this.frame.dispatchEvent(
                tools.getEvent( 'service:close' )
            );
        }
        setUnactive();
    };
};