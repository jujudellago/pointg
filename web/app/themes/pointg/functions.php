<?php
function goodresto_enovathemes_child_enqueue_styles() {
    $parent_style = 'goodresto-enovathemes-parent-style';
    wp_enqueue_style( $parent_style, get_parent_theme_file_uri('/style.css'));
}
add_action( 'wp_enqueue_scripts', 'goodresto_enovathemes_child_enqueue_styles' );
?>