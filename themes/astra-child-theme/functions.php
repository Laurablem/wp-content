<?php
/** add_action sætter i værk således at parent themes stylesheet indlæses, når WordPress loader styles **/
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles', 10 );

/** Her er en funktion som linker til stylesheet **/
function my_child_theme_enqueue_styles() {

    // Her defineres variablen, som bruges til at referere til parent-stylen
    $parenthandle = 'astra-parent-style';
    $theme        = wp_get_theme();

    wp_enqueue_style( 
        /** parent style sheet - Her linker jeg til style.css i modertemaet (Astra) **/
        $parenthandle,
        get_parent_theme_file_uri( 'style.css' )
    );

    /** child style sheet - Her linker jeg til style.css i child-temaet (Astra Child) **/
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version')
    );
}

/** Google Fonts: Goblin One (indlæses tidligt, men uden at ændre din nuværende opsætning) */
add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts_goblinone', 5 );
function enqueue_google_fonts_goblinone() {
    wp_enqueue_style(
        'gf-goblin-one',
        'https://fonts.googleapis.com/css2?family=Goblin+One&display=swap',
        array(),
        null
    );
}

