const tools = {
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
    }
};

window.tools = tools;
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
}