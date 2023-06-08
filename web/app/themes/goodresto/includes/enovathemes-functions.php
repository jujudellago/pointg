<?php

/*  Default fonts
/*-------------------*/
    
    function goodresto_enovathemes_fonts_url() {
        $font_url = '';
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'goodresto' ) ) {
            $font_url = add_query_arg( 'family', urlencode( 'Playfair Display|Pinyon Script|Cabin Condensed:400,500,600,700|Raleway:300,400,500,600,700,800,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
        }
        return $font_url;
    }

/*  Enovathemes title
/*-------------------*/

    add_filter( 'wp_title', 'goodresto_enovathemes_filter_wp_title' );
    function goodresto_enovathemes_filter_wp_title( $title ) {
        global $page, $paged;

        if ( is_feed() ){
            return $title;
        }
            
        $site_description = get_bloginfo( 'description' );

        $filtered_title = $title . get_bloginfo( 'name' );
        $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
        $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( esc_html__( 'Page %s', 'goodresto'), max( $paged, $page ) ) : '';

        return $filtered_title;
    }

/*  Post format chat
/*-------------------*/

    function goodresto_enovathemes_post_chat_format($content) {
        global $post;
        if (has_post_format('chat')) {
            $chatoutput = "<ul class=\"chat\">\n";
            $split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);

            foreach($split as $haystack) {
                if (strpos($haystack, ":")) {
                    $string = explode(":", trim($haystack), 2);
                    $who = strip_tags(trim($string[0]));
                    $what = strip_tags(trim($string[1]));
                    $row_class = empty($row_class)? " class=\"chat-highlight\"" : "";
                    $chatoutput = $chatoutput . "<li><span class='name'>$who:</span><p>$what</p></li>\n";
                } else {
                    $chatoutput = $chatoutput . $haystack . "\n";
                }
            }

            $content = $chatoutput . "</ul>\n";
            return $content;
        } else { 
            return $content;
        }
    }
    add_filter( "the_content", "goodresto_enovathemes_post_chat_format", 9);

/*  Get the widget
/*-------------------*/

    if( !function_exists('goodresto_enovathemes_get_the_widget') ){
  
        function goodresto_enovathemes_get_the_widget( $widget, $instance = '', $args = '' ){
            ob_start();
            the_widget($widget, $instance, $args);
            return ob_get_clean();
        }
        
    }

/*  Modify img tags
/*-------------------*/

    function goodresto_enovathemes_modify_product_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
        
        if ('product' == get_post_type($post_id)) {
            $src  = wp_get_attachment_image_src($post_thumbnail_id, $size);
            $html = '<div class="image-container"><div class="image-preloader"></div><img src="' . $src[0] . '" /></div>';
        }

        return $html;

    }
    add_filter('post_thumbnail_html', 'goodresto_enovathemes_modify_product_thumbnail_html', 99, 5);

/*  Post image overlay
/*-------------------*/

    function goodresto_enovathemes_post_image_overlay($post_id){

        $output = '';

        $output .='<div class="post-image-overlay">';
            $output .='<a class="overlay-read-more" href="'.get_the_permalink($post_id).'" title="'.esc_html__("Read more about", 'goodresto').' '.esc_attr(get_the_title($post_id)).'"></a>';
        $output .='</div>';

        return $output;
    }

/*  Event image overlay
/*-------------------*/

    function goodresto_enovathemes_event_image_overlay($post_id, $event_post_layout){

        $values              = get_post_custom( get_the_ID() );
        $event_link        = isset( $values['event_link'][0] ) ? $values["event_link"][0] : "";
        $event_link_active = isset( $values['event_link_active'][0] ) ? $values["event_link_active"][0] : "false";

        $output = '';

        $output .='<div class="post-image-overlay">';
            
            $output .='<div class="post-image-overlay-content">';
                $output .='<a class="overlay-read-more" href="'.get_the_permalink($post_id).'" title="'.esc_attr__("Read more about", "goodresto").' '.esc_attr(get_the_title($post_id)).'"></a>';
                if (has_post_thumbnail()){
                    $event_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), "full" );
                }
                if ( '' != the_title_attribute( 'echo=0' ) && $event_post_layout == "event-with-overlay"){
                     $output .='<h4 class="post-title">';

                        if ($event_link_active == "true") {
                            if (!empty($event_link)){
                                $output .='<a href="'.esc_url($event_link).'" target="_blank" title="'.esc_attr__("Read more about", "goodresto").' '.the_title_attribute( 'echo=0' ).'" rel="bookmark">';
                                    $output .=the_title_attribute( 'echo=0' );
                                $output .='</a>';
                            } else {
                                $output .='<a href="'.get_the_permalink().'" title="'.esc_attr__("Read more about", "goodresto").' '.the_title_attribute( 'echo=0' ).'" rel="bookmark">';
                                     $output .=the_title_attribute( 'echo=0' );
                                $output .='</a>';
                            }
                        } else {
                            $output .='<a href="'.get_the_permalink().'" target="_blank" title="'.esc_attr__("Read more about", "goodresto").' '.the_title_attribute( 'echo=0' ).'" rel="bookmark">';
                                    $output .=the_title_attribute( 'echo=0' );
                            $output .='</a>';  
                        }

                     $output .='</h4>';
                }
            $output .='</div>';

        $output .='</div>';

        return $output;
    }

/*  Product image overlay
/*-------------------*/

    function goodresto_enovathemes_product_image_overlay($post_id){
        global $goodresto_enovathemes;

        $output = '';

        $output .='<div class="post-image-overlay">';
            $output .='<a class="overlay-read-more" href="'.get_the_permalink().'" title="'.esc_attr__("Go to", "goodresto").' '.the_title_attribute( 'echo=0' ).'"></a>';
        $output .='</div>';

        return $output;

    }

/*  Pagination
/*-------------------*/

    function goodresto_enovathemes_post_nav_num($class, $alignment){
        if( is_singular() ){
            return;
        }

        global $wp_query;
        $big = 999999;

        ?>

        <?php if ($class == 'event'): ?>
            <?php

                $class = 'event-navigation';

                $events_per_page   = (isset($GLOBALS['goodresto_enovathemes']['event-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['event-per-page'])) ? $GLOBALS['goodresto_enovathemes']['event-per-page'] : get_option( 'posts_per_page' );
                $total = (empty($events_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$events_per_page);
            
                if (is_tax()) {
                    $class .= ' tax';
                }
            ?>
            <?php if ($events_per_page < $wp_query->found_posts): ?>
                <nav class="enovathemes-navigation <?php echo esc_attr($class); ?> <?php echo esc_attr($alignment); ?>"><?php echo paginate_links(array(
                    'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format'    => '?paged=%#%',
                    'total'     => $total,
                    'current'   => max(1, get_query_var('paged')),
                    'show_all'  => false,
                    'end_size'  => 2,
                    'mid_size'  => 3,
                    'prev_next' => true,
                    'prev_text' => '',
                    'next_text' => '',
                    'type'      => 'list'));?></nav>
            <?php endif; ?> 
        <?php elseif ($class == 'product'): ?>
            <?php

                $class = 'product-navigation';

                $products_per_page   = (isset($GLOBALS['goodresto_enovathemes']['product-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['product-per-page'])) ? $GLOBALS['goodresto_enovathemes']['product-per-page'] : get_option( 'posts_per_page' );
                $total = (empty($products_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$products_per_page);
            
                if (is_tax()) {
                    $class .= ' tax';
                }
            ?>
            <?php if ($products_per_page < $wp_query->found_posts): ?>
                <nav class="enovathemes-navigation <?php echo esc_attr($class); ?> <?php echo esc_attr($alignment); ?>"><?php echo paginate_links(array(
                    'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format'    => '?paged=%#%',
                    'total'     => $total,
                    'current'   => max(1, get_query_var('paged')),
                    'show_all'  => false,
                    'end_size'  => 2,
                    'mid_size'  => 3,
                    'prev_next' => true,
                    'prev_text' => '',
                    'next_text' => '',
                    'type'      => 'list'));?></nav>
            <?php endif; ?> 
        <?php else: ?>

            <?php $class = 'post-navigation'; ?>

            <nav class="enovathemes-navigation <?php echo esc_attr($class); ?> <?php echo esc_attr($alignment); ?>"><?php echo paginate_links(array(
                'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
                'format'    => '?paged=%#%',
                'total'     => $wp_query->max_num_pages,
                'current'   => max(1, get_query_var('paged')),
                'show_all'  => false,
                'end_size'  => 2,
                'mid_size'  => 3,
                'prev_next' => true,
                'prev_text' => '',
                'next_text' => '',
                'type'      => 'list'));?></nav> 
        <?php endif; ?>
        
    <?php }

/*  Simple pagination
/*-------------------*/
    
    function goodresto_enovathemes_post_nav($post_type,$post_id){

            global $goodresto_enovathemes;

            $single_nav_mob = "false";

            if ($post_type == "post") {
                $post_prev_text = esc_html__('Previous post', 'goodresto');
                $post_next_text = esc_html__('Next post', 'goodresto');
            } elseif ($post_type == "product") {
                $post_prev_text = esc_html__('Previous product', 'goodresto');
                $post_next_text = esc_html__('Next product', 'goodresto');
            }

            $prev_post = get_adjacent_post(false, '', true);
            $next_post = get_adjacent_post(false, '', false);

            
        ?>
        <nav class="post-single-navigation <?php echo esc_attr($post_type) ?> mob-hide-false et-clearfix">  
          <?php if(!empty($next_post)) {echo '<a rel="prev" href="' . get_permalink($next_post->ID) . '" title="' .esc_attr__('Go to', 'goodresto').' '.$next_post->post_title . '">'.$post_prev_text.'</a>'; } ?>
          <div class="navigation-separator sep-wrap center  et-clearfix">
            <?php $icon_decorative = (isset($GLOBALS['goodresto_enovathemes']['icon-decorative']) && !empty($GLOBALS['goodresto_enovathemes']['icon-decorative'])) ? $GLOBALS['goodresto_enovathemes']['icon-decorative'] : 'icon-sep-sep5'; ?>
            <div class="et-separator-decorative small <?php echo esc_attr($icon_decorative); ?>"></div>
          </div>
          <?php if(!empty($prev_post)) {echo '<a rel="next" href="' . get_permalink($prev_post->ID) . '" title="' .esc_attr__('Go to', 'goodresto').' '.$prev_post->post_title . '">'.$post_next_text.'</a>'; } ?>
        </nav>
        <?php 
    }

/*  Excerpt
/*-------------------*/

    function goodresto_enovathemes_excerpt($limit) {
        
        $excerpt = get_the_excerpt();
        $limit++;

        $output = "";

        if ( mb_strlen( $excerpt ) > $limit ) {
            $subex = mb_substr( $excerpt, 0, $limit - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

            if ( $excut < 0 ) {
                $output .= mb_substr( $subex, 0, $excut );
            } else {
                $output .= $subex;
            }

            $output .= '[...]';

        } else {
            $output .= $excerpt;
        }

        return $output;
    }

/*  Not found
/*-------------------*/

    function goodresto_enovathemes_not_found($post_type){

        $output = '';

        $output .= '<p class="enovathemes-not-found">';

        switch ($post_type) {

            case 'menu':
                $output .= esc_html__('No menu items found.', 'goodresto');
                break;

            case 'event':
                $output .= esc_html__('No event found.', 'goodresto');
                break;

            case 'products':
                $output .= esc_html__('No products found.', 'goodresto');
                break;

            case 'general':
                $output .= esc_html__('No search results found. Try a different search', 'goodresto');
                break;
            
            default:
                $output .= esc_html__('No posts found.', 'goodresto');
                break;
        }

        $output .= '</p>';

        return $output;
    }

/*  Hex to rgba
/*-------------------*/

    function goodresto_enovathemes_hex_to_rgba($hex, $o) {
        $hex = (string) $hex;
        $hex = str_replace("#", "", $hex);
        $hex = array_map('hexdec', str_split($hex, 2));
        return 'rgba('.implode(",", $hex).','.$o.')';
    }

/*  Hex to rgb shade
/*-------------------*/

    function goodresto_enovathemes_hex_to_rgb_shade($hex, $o) {
        $hex = (string) $hex;
        $hex = str_replace("#", "", $hex);
        $hex = array_map('hexdec', str_split($hex, 2));
        $hex[0] -= $o;
        $hex[1] -= $o;
        $hex[2] -= $o;
        return 'rgb('.implode(",", $hex).')';
    }
?>