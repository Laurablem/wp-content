<?php

/** add_action sætter i værk således at parent themes stylesheet indlæses, når wordpress loader styles **/
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles' );

/** Her er en funktion som linker til stylesheet **/
function my_child_theme_enqueue_styles() {

    // Her defineres variablen, som bruges til at referere til parent-stylen
    $parenthandle = 'kubio-parent-style';
    $theme        = wp_get_theme();

    wp_enqueue_style( 
        /** parent style sheet - Her linker jeg til mit style.css som er placeret inde i modertemaet (modertema Astra) **/
        $parenthandle,
        get_parent_theme_file_uri( 'style.css' )
    );

    /** child style sheet- Her linker jeg til mit style.css som er placeret inde i child-tema (Astra child) **/
    wp_enqueue_style(
        'kubio-child-style',
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version')
    );
}
