( ( { shema, tools }  ) => {
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
            .createFormShema( 'api/user/login', 'POST' )
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
            .createFormShema( 'api/site', 'POST' )
            .setTitle( 'SITE' )
            .setSubTitle( 'CREER UN NOUVEAU SITE' )
            .setSubmit( 'CREER', 'cloud-plus-fill' )
            .setCancel( 'ANNULER' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom',
                icon: 'file-earmark-person'
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
            .addInput( 'district', 'text', {
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
            .addData( 'user_id', tools.getStorageData( 'user' ).user_id )
            .toJSON()
    ) );

    shema.addShema( 'site-update', ( data ) =>  {
        return shema
            .createFormShema( 'api/user/registration', 'POST' )
            .setTitle( 'SITE' )
            .setSubTitle( 'INFORMATIONS DE MON SITE' )
            .setSubmit( 'MODIFIER', 'arrow-repeat' )
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
        .toJSON();
    } )

    shema.addShema( 'add-project', (
        shema
            .createFormShema( 'api/project', 'POST' )
            .setTitle( 'PROJETS' )
            .setSubTitle( 'AJOUTER UN NOUVEAU PROJET' )
            .setSubmit( 'AJOUTER', 'patch-plus-fill' )
            .setCancel( 'ANNULER' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom du Project',
                icon: 'cursor-text'
            } )
            .addInput( 'description', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Description',
                icon: 'book-half'
            } )
            .addData( 'site_id', tools.urls().get( 's' ) )
            .addImg( 'picture' )
        .toJSON()
    ) );

    shema.addShema( 'add-pub', (
        shema
            .createFormShema( 'api/pub', 'POST' )
            .setTitle( 'PUBLICITE' )
            .setSubTitle( 'AJOUTER UNE NOUVELLE PUBLICITE' )
            .setSubmit( 'AJOUTER', 'patch-plus-fill' )
            .setCancel( 'ANNULER' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom de la pub',
                icon: 'cursor-text'
            } )
            .addInput( 'description', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Description',
                icon: 'book-half'
            } )
            .addData( 'site_id', tools.urls().get( 's' ) )
            .addImg( 'picture' )
        .toJSON()
    ) );

    shema.addShema( 'add-place', (
        shema
            .createFormShema( 'api/place', 'POST' )
            .setTitle( 'TOURISME' )
            .setSubTitle( 'AJOUTER UN NOUVEAU SITE TOURISTIQUE' )
            .setSubmit( 'AJOUTER', 'patch-plus-fill' )
            .setCancel( 'ANNULER' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom du site',
                icon: 'cursor-text'
            } )
            .addInput( 'description', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Description',
                icon: 'book-half'
            } )
            .addData( 'site_id', tools.urls().get( 's' ) )
            .addImg( 'picture', true )
        .toJSON()
    ) );

    shema.addShema( 'add-post-type', (
        shema
            .createFormShema( 'api/posttype', 'POST' )
            .setTitle( 'ANNONCES' )
            .setSubTitle( 'AJOUTER UN TYPE D\'ANNONCES' )
            .setSubmit( 'AJOUTER', 'patch-plus-fill' )
            .setCancel( 'ANNULER' )
            .addData( 'site_id', tools.urls().get( 's' ) )
            .addSelect( 'label', [
                { id: 'wedding', value: 'Mariage' },
                { id: 'death', value: 'Décès' },
                { id: 'birth', value: 'Naissance' },
                { id: 'divorce', value: 'Divorce' },
                { id: 'other', value: 'Autre' },
            ], {
                validators: [ 'required' ],
                label: 'TYPE D\'ANNONCE',
                icon: 'cursor-text',
                selected: 'birth'
            } )
        .toJSON()
    ) );

    shema.addShema( 'add-post', function ( list ) {
        return shema
            .createFormShema( 'api/post', 'POST' )
            .setTitle( 'ANNONCES' )
            .setSubTitle( 'CREER UNE ANNONCE' )
            .setSubmit( 'CREER', 'patch-plus-fill' )
            .setCancel( 'ANNULER' )
            .addSelect( 'post_type_id', list, {
                validators: [ 'required' ],
                label: 'TYPE D\'ANNONCE',
                icon: 'lightning-charge-fill',
                selected: 'birth'
            } )
            .addInput( 'label', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Titre',
                icon: 'cursor-text'
            } )
            .addInput( 'description', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Description',
                icon: 'book-half'
            } )
            .addImg( 'picture', true )
        .toJSON()
    } );

    shema.addShema( 'add-activity', (
        shema
            .createFormShema( 'api/activity', 'POST' )
            .setTitle( 'ACTIVITES' )
            .setSubTitle( 'AJOUTER UNE NOUVELLE ACTIVITE' )
            .setSubmit( 'AJOUTER', 'tags-fill' )
            .setCancel( 'ANNULER' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom de l\'activité',
                icon: 'cursor-text'
            } )
            .addInput( 'description', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Description',
                icon: 'book-half'
            } )
            .addData( 'site_id', tools.urls().get( 's' ) )
            .addImg( 'picture', true )
        .toJSON()
    ) );

    shema.addShema( 'add-role', (
        shema
            .createFormShema( 'api/role', 'POST' )
            .setTitle( 'TYPES' )
            .setSubTitle( 'AJOUTER UN POSTE' )
            .setSubmit( 'AJOUTER', 'patch-plus-fill' )
            .setCancel( 'ANNULER' )
            .addData( 'site_id', tools.urls().get( 's' ) )
            .addSelect( 'label', [
                { id: 'mayor', value: 'Maire' },
                { id: 'deputy-mayor', value: 'Adjoint du Maire' },
                { id: 'secretary', value: 'Sécrétaire' },
                { id: 'other', value: 'Autre' },
            ], {
                validators: [ 'required' ],
                label: 'TYPE DE POSTE',
                icon: 'cursor-text'
            } )
            .addInput( 'description', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom:',
                icon: 'book-half'
            } )
        .toJSON()
    ) );

    shema.addShema( 'add-employee', function ( list ) {
        return shema
            .createFormShema( 'api/employee', 'POST' )
            .setTitle( 'EMPLOYES' )
            .setSubTitle( 'AJOUTER UN NOUVEL EMPLOYE' )
            .setSubmit( 'AJOUTER', 'person-plus-fill' )
            .setCancel( 'ANNULER' )
            .addSelect( 'role_id', list, {
                validators: [ 'required' ],
                label: 'POSTE OCCUPE',
                icon: 'cursor-text'
            } )
            .addInput( 'first_name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom',
                icon: 'postcard-fill'
            } )
            .addInput( 'last_name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Prénom',
                icon: 'puzzle-fill'
            } )
            .addInput( 'age', 'number', {
                validators: [ 'required' ],
                label: 'Age',
                icon: '123'
            } )
            .addInput( 'background', 'textarea', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Pacours',
                icon: 'book-half'
            } )
            .addImg( 'picture', true )
        .toJSON()
    } );

    shema.addShema( 'update-password', (
        shema
            .createFormShema( 'api/user/registration', 'POST' )
            .setTitle( 'PASSWORD' )
            .setSubTitle( 'MODIFIER LE MOT DE PASSE DE MON COMPTE' )
            .setSubmit( 'MODIFIER', 'fingerprint' )
            .setCancel( 'ANNULER' )
            .addInput( 'password_1', 'password', {
                validators: [ 'required', [ 'minlen', 5 ] ],
                label: 'Mot de passe',
                icon: 'shield-lock-fill'
            } )
            .addInput( 'password_2', 'password', {
                validators: [ 'required', [ 'minlen', 5 ] ],
                label: 'Mot de passe',
                icon: 'shield-fill-check'
            } )
        .toJSON()
    ) );

    shema.addShema( 'update-account', (
        shema
            .createFormShema( 'api/user/registration', 'POST' )
            .setTitle( 'MON COMPTE' )
            .setSubTitle( 'METTRE A JOUR MON COMPTE' )
            .setSubmit( 'MODIFIER', 'arrow-repeat' )
            .setCancel( 'ANNULER' )
            .addInput( 'name', 'text', {
                validators: [ 'required', [ 'minlen', 3 ] ],
                label: 'Nom',
                icon: 'postcard-fill'
            } )
            .addInput( 'email', 'email', {
                validators: [ 'required', 'email' ],
                label: 'Email',
                icon: 'envelope-plus-fill'
            } )
        .toJSON()
    ) );
} )( window );