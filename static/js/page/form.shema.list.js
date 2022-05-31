( shema => {
    shema.addShema( 'signUp', (
        shema
            .createFormShema( 'api/user/registration', 'POST' )
            .setTitle( 'INSCRIPTION' )
            .setSubTitle( 'CREER VOTRE COMPTE POUR CREER UN SITE' )
            .setSubmit( 'JE COMMENCE' )
            .setCancel( 'Annuler' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom',
                icon: 'file-earmark-person'
            } )
            .addInput( 'email', 'email', {
                validators: [ 'required', 'email' ],
                icon: 'envelope-plus',
                label: 'Email'
            } )
            .addInput( 'password', 'password', {
                validators: [ 'required', [ 'minlen', 5 ] ],
                icon: 'fingerprint',
                label: 'Mot de passe'
            } )
            .toJSON()
    ) )
} )( window.shema );