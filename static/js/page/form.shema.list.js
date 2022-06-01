( shema => {
    'use strict';
    
    shema.addShema( 'signUp', (
        shema
            .createFormShema( 'api/user/registration', 'POST' )
            .setTitle( 'INSCRIPTION' )
            .setSubTitle( 'CREER VOTRE COMPTE POUR CREER UN SITE' )
            .setSubmit( 'JE COMMENCE', 'person-plus-fill' )
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
    ) );

    shema.addShema( 'signIn', (
        shema
            .createFormShema( 'api/user/registration', 'POST' )
            .setTitle( 'CONNECTION' )
            .setSubTitle( 'CONNECTEZ-VOUS A VOTRE COMPTE POUR ADMINISTRER VOS SITES' )
            .setSubmit( 'JE ME CONNECTE', 'person-circle' )
            .setCancel( 'ANNULER' )
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
    ) );

    shema.addShema( 'sites', (
        shema
            .createFormShema( 'api/user/registration', 'POST' )
            .setTitle( 'SITE' )
            .setSubTitle( 'CREER UN NOUVEAU SITE' )
            .setSubmit( 'CREER', 'cloud-plus-fill' )
            .setCancel( 'ANNULER' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom',
                icon: 'file-earmark-person'
            } )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom',
                icon: 'bookmark-check-fill'
            } )
            .addInput( 'slogan', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Slogan',
                icon: 'journal-text'
            } )
            .addInput( 'country', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Pays',
                icon: 'globe2'
            } )
            .addInput( 'Disctrict', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Commune',
                icon: 'geo-fill'
            } )
            .addInput( 'position', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Quartier',
                icon: 'geo-alt-fill'
            } )
            .addInput( 'history', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Historique',
                icon: 'book-half'
            } )
            .addImg( 'picture' )
            .toJSON()
    ) );
} )( window.shema );