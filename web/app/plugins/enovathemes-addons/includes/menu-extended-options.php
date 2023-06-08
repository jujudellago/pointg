<?php

function enovathemes_addons_menu_layout_context( $post ) {
    
    do_meta_boxes( null, 'enovathemes_addons_menu-pricebox-holder', $post );
}
add_action( 'edit_form_after_title', 'enovathemes_addons_menu_layout_context' ); 

add_action("admin_init", "enovathemes_addons_add_menu_price_box");
function enovathemes_addons_add_menu_price_box(){

    add_meta_box(
        "enovathemes-menu-image-width", 
        esc_html__("Menu custom width", 'enovathemes-addons'),
        "enovathemes_addons_render_menu_width", 
        "menu",
        "side", 
        "low"
    );

    add_meta_box(
        "enovathemes-menu-details", 
        esc_html__("Menu extended options", 'enovathemes-addons'),
        "enovathemes_addons_render_menu_options", 
        "menu",
        "normal", 
        "high"
    );

}

function enovathemes_addons_render_menu_width($post) {

    global $post, $goodresto_enovathemes;

    $values = get_post_custom( $post->ID );

    wp_nonce_field( 'enovathemes_addons_menu_price_nonce', 'enovathemes_addons_menu_price_nonce' );

    $menu_width = isset( $values['menu_width'] ) ? esc_attr( $values['menu_width'][0] ) : "";

    $menu_post_size        = (isset($GLOBALS['goodresto_enovathemes']['menu-post-size']) && $GLOBALS['goodresto_enovathemes']['menu-post-size']) ? $GLOBALS['goodresto_enovathemes']['menu-post-size'] : "medium";
    $menu_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['menu-post-layout']) && $GLOBALS['goodresto_enovathemes']['menu-post-layout']) ? $GLOBALS['goodresto_enovathemes']['menu-post-layout'] : "grid";

    $menu_width_set = array();

    switch ($menu_post_size) {
        case 'small':
            $menu_width_set = array('25','50','75');
            break;
        case 'medium':
            $menu_width_set = array('30','60');
            break;
        case 'large':
            $menu_width_set = array('50','50');
            break;
    }
?>

    <div class="menu-width">
        <?php if ($menu_post_layout == 'masonry2'): ?>
            <p class="post-notice"><?php echo esc_html__('Your menu layout in "Menu archive/loop" page is set to "Masonry". If you want to adjust each menu width individually use "Custom menu width" option below', 'enovathemes-addons'); ?></p>
            <select class="menu_width" id="menu_width" name="menu_width">  
                <?php foreach ($menu_width_set as $width): ?>
                    <option value="<?php echo $width; ?>" <?php selected( $menu_width, $width ); ?>><?php echo $width.'%'; ?></option>
                <?php endforeach ?>
            </select>
        <?php else: ?>
            <p class="post-notice"><?php echo esc_html__('Your menu layout in "Menu archive/loop" page is set to "Grid". If you want to adjust each menu width individually switch to the "Masonry layout"', 'enovathemes-addons'); ?></p>
        <?php endif ?>
    </div>

<?php   
}

function enovathemes_addons_render_menu_options($post) {

    global $post;

    $values              = get_post_custom( $post->ID );
    $menu_ingredients    = isset( $values['menu_ingredients'] ) ? esc_html( $values["menu_ingredients"][0] ) : "";
    $menu_price          = isset( $values['menu_price'] ) ? esc_attr( $values["menu_price"][0] ) : "";
    $menu_label          = isset( $values['menu_label'] ) ? esc_attr( $values["menu_label"][0] ) : "";
    $menu_highlight      = isset( $values['menu_highlight'] ) ? esc_attr( $values["menu_highlight"][0] ) : "false";

    $menu_spicy      = isset( $values['menu_spicy'] ) ? esc_attr( $values["menu_spicy"][0] ) : "false";
    $menu_vegetarian = isset( $values['menu_vegetarian'] ) ? esc_attr( $values["menu_vegetarian"][0] ) : "false";
    $menu_gluten     = isset( $values['menu_gluten'] ) ? esc_attr( $values["menu_gluten"][0] ) : "false";

?>

    <div class="post-section" id="post-section-menu-details">
        <h3 class="post-section-title"><?php echo esc_html__("Menu item details", 'enovathemes-addons'); ?></h3>
        <div class="post-sub-section nz-clearfix">

            <div id="menu-price-option" class="post-option">
                <label for="menu_price"><?php echo esc_html__('Enter menu item price:', 'enovathemes-addons'); ?></label>
                <div>
                    <input name="menu_price" id="menu_price" value="<?php echo $menu_price;?>" />
                </div>
            </div>
            <div id="menu-ingredients-option" class="post-option">
                <label for="menu_ingredients"><?php echo esc_html__('Enter comma-separated menu item ingredients:', 'enovathemes-addons'); ?></label>
                <textarea name="menu_ingredients" id="menu_ingredients" ><?php echo $menu_ingredients;?></textarea>
            </div>
            <div class="nz-clearfix"></div>
            <div class="post-option">
                <label for="menu_label"><?php echo esc_html__('Enter menu custom label:', 'enovathemes-addons'); ?></label>
                <div class="custom-inner-styles">
                    <input type="text" name="menu_label" id="menu_label" value="<?php echo $menu_label;?>">
                    <input type="checkbox" id="menu_highlight" name="menu_highlight" value="true" <?php checked( $menu_highlight, "true" ); ?> />
                    <label for="menu_highlight"><?php echo esc_html__(' - Highlight menu item?', 'enovathemes-addons'); ?></label>
                </div>
            </div>
        </div>

        <div class="post-sub-section nz-clearfix">
                <input type="checkbox" id="menu_spicy" name="menu_spicy" value="true" <?php checked( $menu_spicy, "true" ); ?> />
                <label for="menu_spicy"><?php echo esc_html__(' - Spicy?', 'enovathemes-addons'); ?></label><br>
                <input type="checkbox" id="menu_vegetarian" name="menu_vegetarian" value="true" <?php checked( $menu_vegetarian, "true" ); ?> />
                <label for="menu_vegetarian"><?php echo esc_html__(' - Vegetarian?', 'enovathemes-addons'); ?></label><br>
                <input type="checkbox" id="menu_gluten" name="menu_gluten" value="true" <?php checked( $menu_gluten, "true" ); ?> />
                <label for="menu_gluten"><?php echo esc_html__(' - Includes gluten?', 'enovathemes-addons'); ?></label>
        </div>

    </div>

<?php

}

add_action( 'save_post', 'enovathemes_addons_save_enovathemes_menu_options' );  
function enovathemes_addons_save_enovathemes_menu_options( $post_id )  
{  
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['enovathemes_addons_menu_price_nonce'] ) || !wp_verify_nonce( $_POST['enovathemes_addons_menu_price_nonce'], 'enovathemes_addons_menu_price_nonce' ) ) return;  
    if ( ! current_user_can( 'edit_page', $post_id ) ) return;
    
    if( isset( $_POST['menu_ingredients'] ) ){update_post_meta($post_id, "menu_ingredients",$_POST["menu_ingredients"]);}
    if( isset( $_POST['menu_price'] ) ){update_post_meta($post_id, "menu_price",$_POST["menu_price"]);}
    if( isset( $_POST['menu_label'] ) ){update_post_meta($post_id, "menu_label",$_POST["menu_label"]);}
    
    $menu_highlight_checked = ( isset( $_POST['menu_highlight'] ) ) ? "true" : "false";
    update_post_meta($post_id, "menu_highlight", $menu_highlight_checked);

    $menu_spicy_checked = ( isset( $_POST['menu_spicy'] ) ) ? "true" : "false";
    update_post_meta($post_id, "menu_spicy", $menu_spicy_checked);

    $menu_vegetarian_checked = ( isset( $_POST['menu_vegetarian'] ) ) ? "true" : "false";
    update_post_meta($post_id, "menu_vegetarian", $menu_vegetarian_checked);

    $menu_gluten_checked = ( isset( $_POST['menu_gluten'] ) ) ? "true" : "false";
    update_post_meta($post_id, "menu_gluten", $menu_gluten_checked);

    if( isset( $_POST['menu_width'] ) ){update_post_meta($post_id, 'menu_width',$_POST['menu_width']);}
    
}
?>