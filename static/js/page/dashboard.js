( ( { tools, shema } ) => {
    const fx = {
        site() {
            tools.formService( shema.getShema( 'site-update' )() ).then( () => {
                console.log( 'data' );
            } );
        },
        addProject() {
            tools.formService( shema.getShema( 'add-project' ) ).then( () => {
                console.log( 'data' );
            } );
        },
        addPub() {
            tools.formService( shema.getShema( 'add-pub' ) ).then( () => {
                console.log( 'data' );
            } );
        },
        addPlace() {
            tools.formService( shema.getShema( 'add-place' ) ).then( () => {
                console.log( 'data' );
            } );
        },
        addPostType() {
            tools.formService( shema.getShema( 'add-post-type' ) ).then( () => {
                console.log( 'data' );
            } );
        },
        addPost() {
            tools.formService( shema.getShema( 'add-post' )() ).then( () => {
                console.log( 'data' );
            } );
        },
        addActivity() {
            tools.formService( shema.getShema( 'add-activity' ) ).then( () => {
                console.log( 'data' );
            } );
        },
        addEmployee() {
            tools.formService( shema.getShema( 'add-employee' )() ).then( () => {
                console.log( 'data' );
            } );
        },
        updatePassword() {
            tools.formService( shema.getShema( 'update-password' ) ).then( () => {
                console.log( 'data' );
            } );
        },
        updateAccount() {
            tools.formService( shema.getShema( 'update-account' ) ).then( () => {
                console.log( 'data' );
            } );
        },
        addRole() {
            tools.formService( shema.getShema( 'add-role' ) ).then( () => {
                console.log( 'data' );
            } );
        }
    };

    tools.use( '[data-fx]' ).forEach( item => {
        const 
            name = tools.attr( item, 'data-fx' );
        if ( name in fx ) {
            const callback = fx[ name ];
            if ( typeof callback === 'function' ) {
                item.addEventListener( 'click', callback );
            }
        }
    } );

} )( window );