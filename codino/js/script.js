// What is classic editor? Image result for classic editor. Classic Editor is an official plugin maintained by the WordPress team that restores the previous (“classic”) WordPress editor and the “Edit Post” screen.
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
