( ( { tools, shema } ) => {

    const postLabel = {
        wedding: 'Mariage',
        death: 'Décès',
        birth: 'Naissance',
        divorce: 'Divorce',
        other: 'Autre'
    };

    const fx = {
        site() {
            tools.formService( shema.getShema( 'site-update' )() ).then( () => {
                return window.location.reload();
            } );
        },
        addProject() {
            tools.formService( shema.getShema( 'add-project' ) ).then( () => {
                return window.location.reload();
            } );
        },
        addPub() {
            tools.formService( shema.getShema( 'add-pub' ) ).then( () => {
                return window.location.reload();
            } );
        },
        addPlace() {
            tools.formService( shema.getShema( 'add-place' ) ).then( () => {
                return window.location.reload();
            } );
        },
        addPostType() {
            tools.formService( shema.getShema( 'add-post-type' ) ).then( () => {
                return window.location.reload();
            } );
        },
        addPost() {
            tools.request( {
                url: 'api/posttype/get',
                method: 'post',
                data: {
                    site_id: tools.urls().get( 's' )
                }
            } ).send().then( r => {
                const 
                    result = r.json().map( item => ( {
                        id: item.post_type_id,
                        value: postLabel[ item.label ]
                    } ) );
                tools.formService( shema.getShema( 'add-post' )( result ) ).then( () => {
                    return window.location.reload();
                } );
            } ).catch( err => {
                console.log( err.text() )
            } );
        },
        addActivity() {
            tools.formService( shema.getShema( 'add-activity' ) ).then( () => {
                return window.location.reload();
            } );
        },
        addEmployee() {
            tools.request( {
                url: 'api/role/get',
                method: 'post',
                data: {
                    site_id: tools.urls().get( 's' )
                }
            } ).send().then( r => {
                const 
                    result = r.json().map( item => ( {
                        id: item.role_id,
                        value: item.description
                    } ) );
                tools.formService( shema.getShema( 'add-employee' )( result ) ).then( () => {
                    return window.location.reload();
                } );
            } ).catch( err => {
                console.log( err.text() )
            } );
        },
        updatePassword() {
            tools.formService( shema.getShema( 'update-password' ) ).then( () => {
                return window.location.reload();
            } );
        },
        updateAccount() {
            tools.formService( shema.getShema( 'update-account' ) ).then( () => {
                return window.location.reload();
            } );
        },
        addRole() {
            tools.formService( shema.getShema( 'add-role' ) ).then( () => {
                return window.location.reload();
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