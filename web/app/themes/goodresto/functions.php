<?php
/* Constantas
---------------*/
    
    define('GOODRESTO_ENOVATHEMES_TEMPPATH', get_parent_theme_file_uri());
    define('GOODRESTO_ENOVATHEMES_IMAGES', GOODRESTO_ENOVATHEMES_TEMPPATH. "/images");
    define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

    function goodresto_enovathemes_global_variables(){
        global $goodresto_enovathemes, $woocommerce, $post, $product, $wp_query, $query_string;
    }

/* Includes
---------------*/

    if (!class_exists('TGM_Plugin_Activation') && file_exists( get_parent_theme_file_path('/includes/class-tgm-plugin-activation.php')) ) {
        require_once(get_parent_theme_file_path('/includes/class-tgm-plugin-activation.php'));
    }

    if (defined( 'WPB_VC_VERSION' ) && file_exists( get_parent_theme_file_path('/plugins/js_composer.zip')) ) {
        require_once(get_parent_theme_file_path('/includes/enovathemes_vc.php'));
    }

    require_once(get_parent_theme_file_path('/includes/enovathemes-functions.php'));
    require_once(get_parent_theme_file_path('/includes/menu/custom-menu.php'));
    require_once(get_parent_theme_file_path('/includes/dynamic-styles.php'));

    if (class_exists('OCDI_Plugin')) {

        add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
        add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

        function goodresto_enovathemes_intro_text( $default_text ) {
            $default_text = '<br><br><div class="ocdi__intro-text custom-intro-text">
            <h2 class="about-description">
            '.esc_html__( "Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme.", "goodresto" ).'
            '.esc_html__( "It will allow you to quickly edit everything instead of creating content from scratch.", "goodresto" ).'
            </h2>
            <hr>
            <h3>'.esc_html__( "Important things to know before starting demo import", "goodresto" ).'</h3><br><br>
            <ul>
            <li>'.esc_html__( "No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.", "goodresto" ).'</li>
            <li>'.esc_html__( "Posts, pages, images, widgets, menus and other theme settings will get imported.", "goodresto" ).'</li>
            <li>'.esc_html__( "Please click on the Import button only once and wait, it can take a couple of minutes.", "goodresto" ).'</li>
            <li>'.esc_html__( "If you want to change the homepage version after import, do not import another demo, go to WordPress settings >> Reading and choose different homepage version as your front-page.", "goodresto" ).'</li>
            <li>'.esc_html__( "If you want to import pages/posts/custom post type/menu etc. separately use regular WordPress importer", "goodresto" ).'</li>
            <li>'.esc_html__( "Sometimes not all widgets are displayed after the import, this is known issue, you will need to replace these plugins or re-save one more time", "goodresto" ).'</li>
            </ul>
            <hr>
            <h3>'.esc_html__( "What to do after import", "goodresto" ).'</h3><br><br>
            <ul>
            <li>'.esc_html__( "After import don't forget to import Revolution Slider separately from Revolution Slider settings page", "goodresto" ).'</li>
            <li>'.esc_html__( "All the images will be imported with original sizes without cropping. This way your import process will be quicker and your server will have less work to do. After the import completed go to the WordPress >> Tools and use the Regenerate thumbnails plugin to crop images to theme supported sizes.", "goodresto" ).'</li>
            </ul>
            <hr>
            <h3>'.esc_html__( "Troubleshooting", "goodresto" ).'</h3><br>
            <p>'.esc_html__( "If you will have any issues with the import process, please update these option on your server (edit your php.ini file)", "goodresto" ).' </p>
            <ul class="code">
            <li>upload_max_filesize (256M)</li>
            <li>max_input_time (300)</li>
            <li>memory_limit (256M)</li>
            <li>max_execution_time (300)</li>
            <li>post_max_size (512M)</li>
            </ul>
            <p>'.esc_html__( "These defaults are not perfect and it depends on how large of an import you are making. So the bigger the import, the higher the numbers should be.", "goodresto" ).' </p>
            <hr>
            <h3>'.esc_html__( "Categories are not assigned to posts/custom post types after import", "goodresto" ).'</h3><br>
            <p>'.esc_html__( "This is known issue of the WordPress import, to fix it, find the wp-import-fix.php file in the snippets folder (your download pack) and upload it in the site root, after that navigate in the browser window to the www.yoursite.com/ wp-import-fix.php the script will fix the empty category bug, after that don't forget to remove the file from the site root.", "goodresto" ).' </p>
            <hr>
            <h3>'.esc_html__( "Restaurant menu shows errors after import", "goodresto" ).'</h3><br>
            <p>'.esc_html__( "Don't worry, import is not corrupted, all you have to do is go to appearance >> theme options and just save the options, no other action is needed", "goodresto" ).' </p>
            <hr>
            <h3>'.esc_html__( "After import Shop page shows nothing", "goodresto" ).'</h3><br>
            <p>'.esc_html__( "Don't worry, you forgot to assign shop/cart/checkout/my-account pages from Woocommerce settings", "goodresto" ).' </p>
            </div><br><br>';
            return $default_text;
        }
        add_filter( 'pt-ocdi/plugin_intro_text', 'goodresto_enovathemes_intro_text' );

        function goodresto_enovathemes_import_files() {
            return array(
                array(
                    'import_file_name'             => esc_html__('Main demo (full)', 'goodresto'),
                    'local_import_file'            => get_parent_theme_file_path('/demo/main/all.xml'),
                    'local_import_widget_file'     => get_parent_theme_file_path('/demo/main/widgets.wie'),
                    'local_import_redux'           => array(
                        array(
                            'file_path'   => get_parent_theme_file_path('/demo/main/options.json'),
                            'option_name' => 'goodresto_enovathemes',
                        ),
                    ),
                    'import_preview_image_url'     => GOODRESTO_ENOVATHEMES_TEMPPATH . '/demo/preview/main.jpg',
                    'import_notice'                => esc_html__( 'Import process can take up to 10 minutes, so please be patient and do not interrupt the import process', 'goodresto' ),
                    'preview_url'                  => '//enovathemes.com/goodresto/',
                ),
                array(
                    'import_file_name'             => esc_html__('Italian demo', 'goodresto'),
                    'local_import_file'            => get_parent_theme_file_path('/demo/italian/all.xml'),
                    'local_import_widget_file'     => get_parent_theme_file_path('/demo/italian/widgets.wie'),
                    'local_import_redux'           => array(
                        array(
                            'file_path'   => get_parent_theme_file_path('/demo/italian/options.json'),
                            'option_name' => 'goodresto_enovathemes',
                        ),
                    ),
                    'import_preview_image_url'     => GOODRESTO_ENOVATHEMES_TEMPPATH . '/demo/preview/italian.jpg',
                    'import_notice'                => esc_html__( 'Import process can take up to 10 minutes, so please be patient and do not interrupt the import process', 'goodresto' ),
                    'preview_url'                  => '//enovathemes.com/goodresto/italian/',
                ),
                array(
                    'import_file_name'             => esc_html__('Light demo', 'goodresto'),
                    'local_import_file'            => get_parent_theme_file_path('/demo/light/all.xml'),
                    'local_import_widget_file'     => get_parent_theme_file_path('/demo/light/widgets.wie'),
                    'local_import_redux'           => array(
                        array(
                            'file_path'   => get_parent_theme_file_path('/demo/light/options.json'),
                            'option_name' => 'goodresto_enovathemes',
                        ),
                    ),
                    'import_preview_image_url'     => GOODRESTO_ENOVATHEMES_TEMPPATH . '/demo/preview/light.jpg',
                    'import_notice'                => esc_html__( 'Import process can take up to 10 minutes, so please be patient and do not interrupt the import process', 'goodresto' ),
                    'preview_url'                  => '//enovathemes.com/goodresto/light/',
                ),
                array(
                    'import_file_name'             => esc_html__('Bakery demo', 'goodresto'),
                    'local_import_file'            => get_parent_theme_file_path('/demo/bakery/all.xml'),
                    'local_import_widget_file'     => get_parent_theme_file_path('/demo/bakery/widgets.wie'),
                    'local_import_redux'           => array(
                        array(
                            'file_path'   => get_parent_theme_file_path('/demo/bakery/options.json'),
                            'option_name' => 'goodresto_enovathemes',
                        ),
                    ),
                    'import_preview_image_url'     => GOODRESTO_ENOVATHEMES_TEMPPATH . '/demo/preview/bakery.jpg',
                    'import_notice'                => esc_html__( 'Import process can take up to 10 minutes, so please be patient and do not interrupt the import process', 'goodresto' ),
                    'preview_url'                  => '//enovathemes.com/goodresto/bakery/',
                ),
            );
        }
        add_filter( 'pt-ocdi/import_files', 'goodresto_enovathemes_import_files' );
    
        function goodresto_enovathemes_ocdi_after_import( $selected_import ) {

            if ( 'Main demo (full)' === $selected_import['import_file_name'] ) {

                // Set the homepage and blog page

                $home = get_page_by_title( 'Home main' );
                $blog = get_page_by_title( 'Blog' );
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $home->ID );
                update_option( 'page_for_posts', $blog->ID );

                $footer_settings = get_option( 'footer_settings');
                $footer_settings['footer_id'] = 3408;
                update_option( 'footer_settings', $footer_settings );

                // Set the navigation menus

                $header_menu_left  = get_term_by('name', 'Header menu import left part', 'nav_menu');
                $header_menu_right = get_term_by('name', 'Header menu import right part', 'nav_menu');
                $header_menu       = get_term_by('name', 'Header menu import', 'nav_menu');
                $top_menu          = get_term_by('name', 'Top menu', 'nav_menu');
                $bullets           = get_term_by('name', 'One page', 'nav_menu');
                $footer_menu       = get_term_by('name', 'Footer menu', 'nav_menu');

                $locations = get_theme_mod('nav_menu_locations');

                $locations['header-menu-left']  = $header_menu_left->term_id;
                $locations['header-menu-right'] = $header_menu_right->term_id;
                $locations['header-menu']       = $header_menu->term_id;
                $locations['mobile-menu']       = $header_menu->term_id;
                $locations['top-menu']          = $top_menu->term_id;
                $locations['bullets']           = $bullets->term_id;
                $locations['footer-menu']       = $footer_menu->term_id;
                $locations['sidebar-menu']      = $header_menu->term_id;
                $locations['fullscreen-menu']   = $header_menu->term_id;

                set_theme_mod( 'nav_menu_locations', $locations );

                // Remove unwanted menu

                $header_menu_left_remove  = get_term_by('name', 'Header menu left part', 'nav_menu');
                $header_menu_right_remove = get_term_by('name', 'Header menu right part', 'nav_menu');
                $header_menu_remove       = get_term_by('name', 'Header menu', 'nav_menu');

                wp_delete_nav_menu( $header_menu_left_remove->term_id );
                wp_delete_nav_menu( $header_menu_right_remove->term_id );
                wp_delete_nav_menu( $header_menu_remove->term_id );
                wp_delete_nav_menu( $mobile_menu_remove->term_id );

            } elseif ( 'Italian demo' === $selected_import['import_file_name'] ) {

                // Set the homepage and blog page

                $home = get_page_by_title( 'Home italian' );
                $blog = get_page_by_title( 'Blog' );
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $home->ID );
                update_option( 'page_for_posts', $blog->ID );

                $footer_settings = get_option( 'footer_settings');
                $footer_settings['footer_id'] = 3408;
                update_option( 'footer_settings', $footer_settings );

                // Set the navigation menus

                $header_menu       = get_term_by('name', 'Header menu import', 'nav_menu');

                $locations = get_theme_mod('nav_menu_locations');
    
                $locations['header-menu']       = $header_menu->term_id;
                $locations['mobile-menu']       = $header_menu->term_id;

                set_theme_mod( 'nav_menu_locations', $locations );

            } elseif ( 'Light demo' === $selected_import['import_file_name'] ) {

                // Set the homepage and blog page

                $home = get_page_by_title( 'Home light' );
                $blog = get_page_by_title( 'Blog' );
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $home->ID );
                update_option( 'page_for_posts', $blog->ID );

                $footer_settings = get_option( 'footer_settings');
                $footer_settings['footer_id'] = 3408;
                update_option( 'footer_settings', $footer_settings );

                // Set the navigation menus

                $header_menu_left  = get_term_by('name', 'Header menu import left part', 'nav_menu');
                $header_menu_right = get_term_by('name', 'Header menu import right part', 'nav_menu');

                $locations = get_theme_mod('nav_menu_locations');
    
                $locations['header-menu-left']  = $header_menu_left->term_id;
                $locations['header-menu-right'] = $header_menu_right->term_id;

                set_theme_mod( 'nav_menu_locations', $locations );

            } elseif ( 'Bakery demo' === $selected_import['import_file_name'] ) {

                // Set the homepage and blog page

                $home = get_page_by_title( 'Home bakery' );
                $blog = get_page_by_title( 'Blog' );
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $home->ID );
                update_option( 'page_for_posts', $blog->ID );

                $footer_settings = get_option( 'footer_settings');
                $footer_settings['footer_id'] = 12174;
                update_option( 'footer_settings', $footer_settings );

                // Set the navigation menus

                $header_menu       = get_term_by('name', 'Header menu import', 'nav_menu');

                $locations = get_theme_mod('nav_menu_locations');

                $locations['mobile-menu']       = $header_menu->term_id;
                $locations['fullscreen-menu']   = $header_menu->term_id;

                set_theme_mod( 'nav_menu_locations', $locations );

            }

            global $goodresto_enovathemes;

            if ( function_exists( 'wp_update_custom_css_post' ) ) {

                $wp_custom_css_styles = Redux::get_option('goodresto_enovathemes','custom-css');

                if (!empty($wp_custom_css_styles)) {
                    $core_css = wp_get_custom_css();
                    $return   =  wp_update_custom_css_post( $core_css . $wp_custom_css_styles );
                    if ( ! is_wp_error( $return ) ) {
                        Redux::set_option('goodresto_enovathemes','custom-css','');
                    }
                }
            }

            Redux::set_option('goodresto_enovathemes','disable-defaults',1);

        }
        add_action( 'pt-ocdi/after_import', 'goodresto_enovathemes_ocdi_after_import' );
    }

/* TGM
---------------*/
    
    add_action( 'tgmpa_register', 'goodresto_enovathemes_register_required_plugins' );
    function goodresto_enovathemes_register_required_plugins() {

        $plugins = array(

            array(
                'name'      => esc_html__('Contact Form 7', 'goodresto'),
                'slug'      => 'contact-form-7',
                'required'  => true,
                'dismissable' => true
            ),
            array(
                'name'        => esc_html__('Woocommerce', 'goodresto'),
                'slug'        => 'woocommerce',
                'required'    => false,
                'dismissable' => true
            ),
            array(
                'name'        => esc_html__('YITH WooCommerce Quick View', 'goodresto'),
                'slug'        => 'yith-woocommerce-quick-view',
                'required'    => false,
                'dismissable' => true
            ),
            array(
                'name'        => esc_html__('YITH WooCommerce Wishlist', 'goodresto'),
                'slug'        => 'yith-woocommerce-wishlist',
                'required'    => false,
                'dismissable' => true
            ),
            array(
                'name'      => esc_html__('One Click Demo Import', 'goodresto'),
                'slug'      => 'one-click-demo-import',
                'required'  => true
            ),
            array(
                'name'      => esc_html__('Regenerate Thumbnails', 'goodresto'),
                'slug'      => 'regenerate-thumbnails',
                'required'  => true,
                'dismissable' => true
            ),
            array(
                'name'      => esc_html__('Widgets in Menu for WordPress', 'goodresto'),
                'slug'      => 'widgets-in-menu',
                'required'  => false,
                'dismissable' => true
            ),
            array(
                'name'      => esc_html__('Envato market master', 'goodresto'),
                'slug'      => 'envato-market',
                'source'    => get_parent_theme_file_path('/plugins/envato-market.zip'),
                'required'  => true,
                'dismissable' => true
            ),
            array(
                'name'      => esc_html__('WPBakery Visual Composer', 'goodresto'),
                'slug'      => 'js_composer',
                'source'    => get_parent_theme_file_path('/plugins/js_composer.zip'),
                'required'  => true,
                'version'   => '6.10'
            ),
            array(
                'name'      => esc_html__('Revolution slider', 'goodresto'),
                'slug'      => 'revslider',
                'source'    => get_parent_theme_file_path('/plugins/revslider.zip'),
                'required'  => true,
                'version'   => '6.6.12'
            ),
            array(
                'name'      => esc_html__('Enovathemes add-ons', 'goodresto'),
                'slug'      => 'enovathemes-addons',
                'source'    => get_parent_theme_file_path('/plugins/enovathemes-addons.zip'),
                'required'  => true,
                'version'   => '2.8'
            ),
            
        );

        $config = array(
            'id'                => 'goodresto',
            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
            'parent_slug'       => 'themes.php',                // Default parent menu slug
            'capability'        => 'edit_theme_options',
            'menu'              => 'install-required-plugins',  // Menu slug
            'has_notices'       => true,                        // Show admin notices or not
            'dismissable'       => false,
            'is_automatic'      => false,                       // Automatically activate plugins after installation or not
            'message'           => '',                          // Message to output right before the plugins table
            'strings'           => array(
                'page_title'                                => esc_html__( 'Install Required Plugins', 'goodresto' ),
                'menu_title'                                => esc_html__( 'Install Plugins', 'goodresto' ),
                'installing'                                => esc_html__( 'Installing Plugin: %s', 'goodresto' ), // %1$s = plugin name
                'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'goodresto' ),
                'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'goodresto' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'goodresto' ), // %1$s = plugin name(s)
                'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'goodresto' ), // %1$s = plugin name(s)
                'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'goodresto' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'goodresto' ), // %1$s = plugin name(s)
                'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'goodresto' ), // %1$s = plugin name(s)
                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'goodresto' ), // %1$s = plugin name(s)
                'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'goodresto' ), // %1$s = plugin name(s)
                'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'goodresto' ),
                'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'goodresto' ),
                'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'goodresto' ),
                'plugin_activated'                          => esc_html__( 'Plugin activated successfully.', 'goodresto' ),
                'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'goodresto' ), // %1$s = dashboard link
                'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );

        tgmpa( $plugins, $config );

    }

/* Thumbnails
---------------*/

    if ( function_exists( 'add_theme_support' ) ) {

        add_theme_support( 'post-thumbnails');

        // Blog thumbnails
        add_image_size( 'goodresto_1200X440', 1200, 440, true );
        add_image_size( 'goodresto_870X440', 870, 440, true );
        add_image_size( 'goodresto_870X530', 870, 530, true );
        add_image_size( 'goodresto_588X440', 588, 440, true );
        add_image_size( 'goodresto_384X288', 384, 288, true );
        add_image_size( 'goodresto_282X212', 282, 212, true );

        // Grid based
        add_image_size( 'goodresto_282X282', 282, 282, true );
        add_image_size( 'goodresto_384X384', 384, 384, true );
        add_image_size( 'goodresto_588X588', 588, 588, true );

        // Wide screen
        add_image_size( 'goodresto_960X600', 960, 600, true );
        add_image_size( 'goodresto_640X400', 640, 400, true );
        add_image_size( 'goodresto_480X300', 480, 300, true );

        // Thumbnails
        add_image_size( 'goodresto_60X90', 60, 90, true );
        add_image_size( 'goodresto_144X144', 144, 144, true );

    }

    function goodresto_enovathemes_custom_image_sizes( $sizes ) {
        
        $new_sizes = array();
        
        $added_sizes = get_intermediate_image_sizes();

        foreach( $added_sizes as $key => $value) {
            $new_sizes[$value] = $value;
        }

        $new_sizes = array_merge( $new_sizes, $sizes );
        
        return $new_sizes;
    }
    add_filter('image_size_names_choose', 'goodresto_enovathemes_custom_image_sizes', 11, 1);

/* Theme Config
---------------*/

    add_action('init', 'goodresto_enovathemes_init');
    function goodresto_enovathemes_init() {
        add_theme_support( 'html5', array( 'gallery', 'caption' ) );
        add_theme_support( 'post-formats', array( 'aside', 'audio', 'video', 'gallery', 'link', 'quote', 'status', 'chat') );
        add_theme_support( 'automatic-feed-links' );
        add_post_type_support( 'post', 'post-formats' );
        add_post_type_support( 'page', 'excerpt' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );
    }
    
    if ( ! isset( $content_width ) ) {$content_width = 1200;}

    if(function_exists('vc_set_as_theme')) vc_set_as_theme();

    add_action( 'after_setup_theme', 'goodresto_enovathemes_woocommerce_support' );
    function goodresto_enovathemes_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }

    add_action('init', 'goodresto_enovathemes_page_excerpt');
    function goodresto_enovathemes_page_excerpt() {
        add_post_type_support( 'page', 'excerpt' );
    }

    add_action('after_setup_theme', 'goodresto_enovathemes_language_setup');
    function goodresto_enovathemes_language_setup(){
        load_theme_textdomain('goodresto', get_parent_theme_file_path('/languages'));
    }

    add_action( 'after_setup_theme', 'goodresto_enovathemes_theme_slug_setup' );
    function goodresto_enovathemes_theme_slug_setup() {
        add_theme_support( 'title-tag' );
    }

    function goodresto_enovathemes_remove_redux_news() {
        remove_meta_box( 'redux_dashboard_widget', 'dashboard', 'side' );
    } 
    add_action('wp_dashboard_setup', 'goodresto_enovathemes_remove_redux_news' );

    function goodresto_enovathemes_redux_menu_page_removing() {
        remove_submenu_page( 'tools.php', 'redux-about' );
    }
    add_action( 'admin_menu', 'goodresto_enovathemes_redux_menu_page_removing' );


    add_filter('body_class', 'goodresto_enovathemes_classes');
    function goodresto_enovathemes_classes($classes) {

            global $goodresto_enovathemes, $post;

            $et_img_preloader      = (isset($GLOBALS['goodresto_enovathemes']['img-preload']) && $GLOBALS['goodresto_enovathemes']['img-preload'] == 1) ? 'true' : 'false';
            $et_custom_loading      = (isset($GLOBALS['goodresto_enovathemes']['custom-loading']) && $GLOBALS['goodresto_enovathemes']['custom-loading'] == 1) ? 'true' : 'false';
            $et_sidebar_navigation = (isset($GLOBALS['goodresto_enovathemes']['sidebar-navigation']) && $GLOBALS['goodresto_enovathemes']['sidebar-navigation'] == 1) ? "true" : "false";

            if ($et_sidebar_navigation == "true") {
                $GLOBALS['goodresto_enovathemes']['layout'] = "wide";
            }

            $custom_class = "enovathemes ";

            if ($et_img_preloader == "true") {
                $custom_class .= 'preloader-active ';
            } else {
                $custom_class .= 'preloader-inactive ';
            }

            if ($et_custom_loading == "true") {
                $custom_class .= 'loading-active ';
            }

            $custom_class .= (isset($GLOBALS['goodresto_enovathemes']['custom-scroll']) && $GLOBALS['goodresto_enovathemes']['custom-scroll'] == 1) ? 'custom-scroll-true ' : 'custom-scroll-false ';
            $custom_class .= (isset($GLOBALS['goodresto_enovathemes']['layout']) && !empty($GLOBALS['goodresto_enovathemes']['layout']) ) ? 'layout-'.$GLOBALS['goodresto_enovathemes']['layout'].' ' : 'layout-wide ';
            $custom_class .= (isset($GLOBALS['goodresto_enovathemes']['sidebar-align']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-align']) ) ? 'sidebar-align-'.$GLOBALS['goodresto_enovathemes']['sidebar-align'].' ' : 'sidebar-align-right ';
            $custom_class .= (isset($GLOBALS['goodresto_enovathemes']['form-button-size']) && !empty($GLOBALS['goodresto_enovathemes']['form-button-size'])) ? "button-size-".$GLOBALS['goodresto_enovathemes']['form-button-size'].' ' : "button-size-medium ";

            if (class_exists('Woocommerce')){

                $wishlistpage = "false";
                if (defined('YITH_WCWL')) {
                    $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
                }

                if (is_cart() || is_checkout()) {$custom_class .= " cart-checkout ";}
                if (is_account_page()) {$custom_class .= " my-account ";}
                if ($wishlistpage == "true"){$custom_class .= " wishlist-page ";}

                $woocommerce_shop_page_display = get_option( 'woocommerce_shop_page_display' );

                if ($woocommerce_shop_page_display === '') {
                    $custom_class .= " woocommerce-layout-product ";
                } elseif ($woocommerce_shop_page_display === 'subcategories') {
                    $custom_class .= " woocommerce-layout-category ";
                } elseif($woocommerce_shop_page_display === 'both') {
                    $custom_class .= " woocommerce-layout-both ";
                }

                if (class_exists('YITH_WCQV_Frontend')){

                    if (get_option('yith-wcqv-enable-mobile') == 'no') {
                        $custom_class .= " woocommerce-quick-view-no-mob ";
                    }

                }

            }

            if (is_page()) {
                $values        = get_post_custom( get_the_ID() );
                $blank         = (isset( $values['blank'][0]) && !empty($values['blank'][0])) ? $values["blank"][0] : 'false';
                $custom_class .= " blank-".$blank;
            }

            $classes[] = $custom_class;
            return $classes;
    }

    function goodresto_enovathemes_woocommerce_page_container_before(){
        if (class_exists('Woocommerce')){

            $wishlistpage = "false";
            if (defined('YITH_WCWL')) {
                $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
            }

            if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                echo '<div class="product-layout product-container-boxed">';
            }
            
        }
    }
    add_action('goodresto_enovathemes_before_page_container', 'goodresto_enovathemes_woocommerce_page_container_before');
    
    function goodresto_enovathemes_page_comments(){
        if (class_exists('Woocommerce')){

            $add_comment_template = "true";

            $wishlistpage = "false";
            if (defined('YITH_WCWL')) {
                $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
            }

            if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                $add_comment_template = "false";
            }

            if ($add_comment_template == "true") {
                comments_template();
            }
            
        } else {

            $add_comment_template = "true";

            if ($add_comment_template == "true") {
                comments_template();
            }

        }
    }
    add_action('goodresto_enovathemes_after_page_body', 'goodresto_enovathemes_page_comments');
    

    function goodresto_enovathemes_woocommerce_page_container_after(){
        if (class_exists('Woocommerce')){

            $wishlistpage = "false";
            if (defined('YITH_WCWL')) {
                $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
            }

            if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                echo '</div>';
            }
            
        }
    }
    add_action('goodresto_enovathemes_after_page_container', 'goodresto_enovathemes_woocommerce_page_container_after');

    // Allow shortcodes in Contact Form 7 
    function goodresto_enovathemes_shortcodes_in_cf7( $form ) {
        $form = do_shortcode( $form );
        return $form;
    }
    add_filter( 'wpcf7_form_elements', 'goodresto_enovathemes_shortcodes_in_cf7' );

/* Menu
---------------*/

    function goodresto_enovathemes_register_menu() {

        register_nav_menus(
            array(
              'header-menu-left'  => esc_html__( 'Header menu left part', 'goodresto' ),
              'header-menu-right' => esc_html__( 'Header menu right part', 'goodresto' ),
              'header-menu'       => esc_html__( 'Header menu', 'goodresto' ),
              'mobile-menu'       => esc_html__( 'Mobile menu', 'goodresto' ),
              'top-menu'          => esc_html__( 'Top menu', 'goodresto' ),
              'sidebar-menu'      => esc_html__( 'Sidebar menu', 'goodresto' ),
              'fullscreen-menu'   => esc_html__( 'Fullscreen menu', 'goodresto' ),
              'bullets'           => esc_html__( 'Bullets for one page layout navigation', 'goodresto' ),
              'footer-menu'       => esc_html__( 'Footer menu', 'goodresto' ),
            )
        );

    }
    add_action( 'after_setup_theme', 'goodresto_enovathemes_register_menu' );

/* Widget areas
---------------*/

    add_action( 'widgets_init', 'goodresto_enovathemes_register_sidebars' );
    function goodresto_enovathemes_register_sidebars() {

        if ( function_exists( 'register_sidebar' ) ){

            global $goodresto_enovathemes;

            $custom_class = 'widget';

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Blog widgets', 'goodresto'),
                'id'            => 'blog-widgets',
                'description'   => esc_html__('Add your blog widgets here. This is the main blog widget area. It is visible only in blog archive pages.', 'goodresto'),
                'class'         => 'blog-widgets',
                'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Blog single post page widgets', 'goodresto'),
                'id'            => 'blog-single-widgets',
                'description'   => esc_html__('Add your blog single post widgets here. This widget area is only visible in the single post page.', 'goodresto'),
                'class'         => 'blog-single-widgets',
                'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Event widgets', 'goodresto'),
                'id'            => 'event-widgets',
                'description'   => esc_html__('Add your event widgets here. This is the main event widget area. It is visible only in event archive pages.', 'goodresto'),
                'class'         => 'event-widgets',
                'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Event single post page widgets', 'goodresto'),
                'id'            => 'event-single-widgets',
                'description'   => esc_html__('Add your event single post widgets here. This widget area is only visible in the single post page.', 'goodresto'),
                'class'         => 'event-single-widgets',
                'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Restaurant menu widgets', 'goodresto'),
                'id'            => 'restaurant-menu-widgets',
                'description'   => esc_html__('Add your menu widgets here. This is the main menu widget area. It is visible only in menu archive pages.', 'goodresto'),
                'class'         => 'restaurant-menu-widgets',
                'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Shop widgets', 'goodresto'),
                'id'            => 'shop-widgets',
                'description'   => esc_html__('Add your shop widgets here. This widget area is visible in shop arhive pages only.', 'goodresto'),
                'class'         => 'shop-widgets',
                'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Shop single post page widgets', 'goodresto'),
                'id'            => 'shop-single-widgets',
                'description'   => esc_html__('Add your shop single product widgets here. This widget area is only visible in single product page.', 'goodresto'),
                'class'         => 'shop-single-widgets',
                'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            for ($i=1; $i < 7; $i++) { 
                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Page widgets #','goodresto').$i,
                    'id'            => 'page-'.$i,
                    'description'   => esc_html__('Use this widget area to display widgets in regulare pages.', 'goodresto'),
                    'class'         => 'page-widgets',
                    'before_widget' => '<div id="%1$s" class="'.$custom_class.' %2$s"><div class="widget-body">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h5 class="widget_title">',
                    'after_title'   => '</h5>' )
                );
            }

            $sidebar_custom_class = 'widget';

            register_sidebar( 
                array (
                'name'          => esc_html__( 'Sidebar widgets', 'goodresto'),
                'id'            => 'sidebar-widgets',
                'description'   => esc_html__('Add widgets to global site sidebar. It has toggle in header and is visible in all pages', 'goodresto'),
                'class'         => 'sidebar-widgets',
                'before_widget' => '<div id="%1$s" class="'.$sidebar_custom_class.' %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget_title">',
                'after_title'   => '</h5>' )
            );

            if (defined( 'YAWP_WIM_PREFIX' )) {
                unregister_sidebar( YAWP_WIM_PREFIX );

                $header_custom_class = 'widget';

                register_sidebar( array(
                    'name' => esc_html__( 'Menu widgets', 'goodresto' ),
                    'id' => YAWP_WIM_PREFIX,
                    'before_widget' => '<div class="menu-widgets"><div id="%1$s" class="'.$header_custom_class.' %2$s"><div class="widget-body">',
                    'after_widget'  => '</div></div></div>',
                    'before_title'  => '<h5 class="widget_title">',
                    'after_title'   => '</h5>' )
                );
            }

            $footer_custom_class = 'widget';
            $footer_form_styles = (isset($GLOBALS['goodresto_enovathemes']['footer-form-styles']) && $GLOBALS['goodresto_enovathemes']['footer-form-styles'] == 1) ? "true" : "false";

            for ($i=1; $i < 7; $i++) { 
                register_sidebar( 
                    array (
                    'name'          => esc_html__( 'Footer widgets #','goodresto').$i,
                    'id'            => 'footer-'.$i,
                    'description'   => esc_html__('Display widgets in footer area.', 'goodresto'),
                    'class'         => 'footer-widgets',
                    'before_widget' => '<div id="%1$s" class="'.$footer_custom_class.' %2$s"><div class="widget-body">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h5 class="widget_title">',
                    'after_title'   => '</h5>' )
                );
            }
        }   
    }

/* Woo Commerce
---------------*/

    if (class_exists('Woocommerce')){

        goodresto_enovathemes_global_variables();

        add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
        if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
            add_action( 'init', 'goodresto_enovathemes_woo_img', 1 );
            function goodresto_enovathemes_woo_img() {
                $catalog = array(
                    'width'     => '588',
                    'height'    => '588',
                    'crop'      => 1
                );
                $single = array(
                    'width'     => '588',
                    'height'    => '588',
                    'crop'      => 1
                );
                $thumbnail = array(
                    'width'     => '144',
                    'height'    => '144',
                    'crop'      => 1 
                );
                update_option( 'shop_catalog_image_size', $catalog );
                update_option( 'shop_single_image_size', $single );
                update_option( 'goodresto_144X144_image_size', $thumbnail );
            }
        }

        add_filter('woocommerce_add_to_cart_fragments', 'goodresto_enovathemes_add_to_cart');
        function goodresto_enovathemes_add_to_cart( $fragments ) {
            
            global $woocommerce;

            ob_start(); ?>
            <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php echo esc_html__('View your shopping cart', 'goodresto'); ?>">
                <span class="cart-title"><?php echo esc_html__('Cart','goodresto'); ?></span>
                <span class="cart-total"><?php echo html_entity_decode($GLOBALS['woocommerce']->cart->get_cart_total()); ?></span>
                <span class="cart-info"><?php echo esc_attr($GLOBALS['woocommerce']->cart->cart_contents_count); ?></span>
            </a>
            <?php

            $fragments['a.cart-contents'] = ob_get_clean();
            return $fragments;

        }

        function goodresto_enovathemes_category_class( $classes, $class, $category= null ){
            $classes[] = 'et-item post';
            return $classes;
        }
        add_filter( 'product_cat_class', 'goodresto_enovathemes_category_class', 10, 3 );

        add_action( 'init', 'goodresto_enovathemes_custom_placeholder' );
        function goodresto_enovathemes_custom_placeholder() {
            add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
            function custom_woocommerce_placeholder_img_src( $src ) {
                $src = GOODRESTO_ENOVATHEMES_IMAGES . '/placeholder.jpg';
                return $src;
            }
        }

        remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
        remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);

        remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
        add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
        if ( ! function_exists( 'woocommerce_subcategory_thumbnail' ) ) {
            function woocommerce_subcategory_thumbnail( $category ) {

                global $goodresto_enovathemes;
                $product_container               = (isset($GLOBALS['goodresto_enovathemes']['product-container']) && $GLOBALS['goodresto_enovathemes']['product-container']) ? $GLOBALS['goodresto_enovathemes']['product-container'] : "boxed";
                $product_sidebar                 = (isset($GLOBALS['goodresto_enovathemes']['product-sidebar']) && $GLOBALS['goodresto_enovathemes']['product-sidebar']) ? $GLOBALS['goodresto_enovathemes']['product-sidebar'] : "none";
                $product_category_post_size      = (isset($GLOBALS['goodresto_enovathemes']['product-category-post-size']) && $GLOBALS['goodresto_enovathemes']['product-category-post-size']) ? $GLOBALS['goodresto_enovathemes']['product-category-post-size'] : "medium";
                $product_post_layout             = (isset($GLOBALS['goodresto_enovathemes']['product-post-layout']) && $GLOBALS['goodresto_enovathemes']['product-post-layout']) ? $GLOBALS['goodresto_enovathemes']['product-post-layout'] : "product-with-details";
                $image                           = false;
                $thumbnail_id                    = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
                
                $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($product_post_layout == "grid") {
                    switch ($product_category_post_size) {
                        case 'small' :
                            $thumb_size            = 'goodresto_588X588';
                            $post_img_default_size = '588px';
                            $post_img_1024_size    = '588px';
                            $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 588px, (max-width: 1023px) 384px, (max-width: 1279px) '.$post_img_1024_size.', '.$post_img_default_size;
                            break;
                        case 'medium':
                            $thumb_size            = ($product_container == "wide") ? 'goodresto_640X640' : 'goodresto_588X588';
                            $post_img_default_size = ($product_container == "wide") ? '640px' : '588px';
                            $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 588px, (max-width: 1023px) 384px, (max-width: 1279px) 384px, '.$post_img_default_size;
                            break;
                        case 'large':
                            $thumb_size            = ($product_sidebar != "none") ? 'goodresto_588X588' : (($product_container == "wide") ? 'goodresto_960X600' : 'goodresto_588X588');
                            $post_img_default_size = ($product_sidebar != "none") ? '588px' : (($product_container == "wide") ? '960px' : '588px');
                            $post_img_1024_size    = ($product_sidebar != "none") ? '384px' : '588px';
                            $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) '.$post_img_1024_size.', '.$post_img_default_size;
                            break;
                    }
                }

                if ($thumbnail_id) {

                    $post_img_attr['alt'] = esc_attr($category->name);

                    $post_img_original = wp_get_attachment_image_src( $thumbnail_id, "full" );
                    $post_img_282  = get_the_post_thumbnail_url($thumbnail_id,'goodresto_282X282');
                    $post_img_384  = get_the_post_thumbnail_url($thumbnail_id,'goodresto_384X384');
                    $post_img_588  = get_the_post_thumbnail_url($thumbnail_id,'goodresto_588X588');
                    $post_img_640  = get_the_post_thumbnail_url($thumbnail_id,'goodresto_640X400');
                    $post_img_960  = get_the_post_thumbnail_url($thumbnail_id,'goodresto_960X600');

                    $post_img_srcset = "";


                    if (strpos($post_img_282[0], '282x')) {
                        $post_img_srcset .= $post_img_282[0].' 282w';
                    }

                    if (strpos($post_img_384[0], '384x')) {
                        $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                    }

                    if (strpos($post_img_588[0], '588x')) {
                        $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                    }

                    if (strpos($post_img_640[0], '640x')) {

                        $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                    }

                    if (strpos($post_img_960[0], '960x')) {
                        $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                    }

                    if (empty($post_img_srcset)) {
                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                    }

                    if ($product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                        $thumb_size = 'full';
                    }

                    if (empty($post_img_srcset) || $product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                    }

                    $post_img_attr['srcset'] = $post_img_srcset;
                    $post_img_attr['sizes']  = $post_img_sizes;

                    $image = wp_get_attachment_image($thumbnail_id,$thumb_size,false,$post_img_attr);
                }

                ?>

                
                    <div class="image-preloader"></div>
                    <div class="post-image-overlay">
                        <a class="overlay-read-more" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" title="<?php echo esc_attr__("View ", 'goodresto').' '.esc_attr( $category->name ); ?>"></a>
                    </div>
                    <div class="image-container">
                        <?php if ($image): ?>
                            <?php echo wp_get_attachment_image($thumbnail_id,$thumb_size,false,$post_img_attr); ?>
                        <?php else: ?>
                            <?php echo wc_placeholder_img($thumb_size); ?>
                        <?php endif ?>
                    </div>
                <?php
            }
        }

        remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
        add_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
        if ( ! function_exists( 'woocommerce_template_loop_category_title' ) ) {
            function woocommerce_template_loop_category_title( $category ) { ?>
                <h4 class="woocommerce-loop-category__title post-title">
                    <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" title="<?php echo esc_attr__("View ", 'goodresto').' '.esc_attr( $category->name ); ?>">
                    <?php
                        echo esc_attr($category->name);
                        if ( $category->count > 0 ){
                            echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
                        }
                    ?>
                    </a>
                </h4>

            <?php }
        }

        function goodresto_enovathemes_before_subcategory(){ ?>
            <div class="post-inner et-item-inner et-clearfix">
                <div class="post-image post-media overlay-hover">
        <?php }
        add_filter( 'woocommerce_before_subcategory', 'goodresto_enovathemes_before_subcategory', 10, 2);

        function goodresto_enovathemes_after_subcategory(){ ?>     
            </div>
        <?php }
        add_filter( 'woocommerce_after_subcategory', 'goodresto_enovathemes_after_subcategory', 10, 2 );
                
        add_filter( 'woocommerce_before_subcategory_title', 'goodresto_enovathemes_before_subcategory_title', 10, 2 );
        function goodresto_enovathemes_before_subcategory_title(){ ?>
                </div>
                <div class="post-body et-clearfix">
                    <div class="post-body-inner-wrap">
                        <div class="post-body-inner">
        <?php }

        add_filter( 'woocommerce_after_subcategory_title', 'goodresto_enovathemes_after_subcategory_title', 10, 2 );
        function goodresto_enovathemes_after_subcategory_title(){ ?>
                        </div>
                    </div>
                </div>

        <?php }

        add_action('init', 'goodresto_enovathemes_single_product');
        function goodresto_enovathemes_single_product(){

            goodresto_enovathemes_global_variables();

            if (defined('THEME_PANEL')) {
                theme_panel_demo_configurations_woocommerce();
            }
            
            $product_single_sidebar          = (isset($GLOBALS['goodresto_enovathemes']['product-single-sidebar']) && $GLOBALS['goodresto_enovathemes']['product-single-sidebar']) ? $GLOBALS['goodresto_enovathemes']['product-single-sidebar'] : "right";
            $product_single_social           = (isset($GLOBALS['goodresto_enovathemes']['product-single-social']) && $GLOBALS['goodresto_enovathemes']['product-single-social'] == 1) ? "true" : "false";
            $product_single_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['product-single-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['product-single-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['product-single-post-layout'] : "single-product-tabs-under";

            // Single product
            remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
            remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
            remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

            if ($product_single_post_layout == 'single-product-tabs-under' || $product_single_post_layout == 'single-product-tabs-inside') {

                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

                add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 5 );
                add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 );
                add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );

                add_action( 'woocommerce_before_single_product_summary', 'goodresto_enovathemes_before_single_product_summary', 5, 2);
                function goodresto_enovathemes_before_single_product_summary(){ ?>
                    <div class="single-product-content et-clearfix">
                        <div class="woocommerce-product-gallery et-clearfix">
                            <div class="woocommerce-product-gallery-inner et-clearfix">
                                <?php

                                    global $product,$post,$goodresto_enovathemes;

                                    $product_single_post_layout = (isset($GLOBALS['goodresto_enovathemes']['product-single-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['product-single-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['product-single-post-layout'] : "single-product-tabs-under";
                                    $product_image_original     = (isset($GLOBALS['goodresto_enovathemes']['product-image-original']) && $GLOBALS['goodresto_enovathemes']['product-image-original'] == 1) ? "true" : "false";

                                    $post_img_attr          = array();
                                    $attachment_ids         = $product->get_gallery_image_ids();
                                    $shop_single_image_size = apply_filters( 'single_product_large_thumbnail_size', 'shop_single' );
                                    $thumb_size             = (!empty($shop_single_image_size)) ? $shop_single_image_size : 'full';
                                    $product_gallery_thumb  = 'goodresto_144X144';
                                
                                    if ($product_single_post_layout == 'single-product-tabs-inside') {
                                        $product_gallery_thumb = 'goodresto_60X90';
                                    }

                                    $product_gallery_attr = 'class="product-image-zoom" data-lightbox-gallery="product-single"';

                                    if ($product_image_original == "true") {
                                        $shop_single_image_size = "full";
                                        $thumb_size             = "full";
                                    }

                                ?>
                                <?php
                                    if (defined('YITH_WCWL')){
                                        echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                                    }
                                ?>
                                <?php $stock_status = $product->get_stock_status(); ?>
                                <?php if ($stock_status == "outofstock"): ?>
                                    <div class="product-status outofstock"><span><?php echo esc_html__( 'Out of stock', 'goodresto' ) ?></span></div>
                                <?php else: ?>
                                    <?php if ( $product->is_on_sale() ) : ?>
                                        <div class="product-status onsale"><span><?php echo esc_html__( 'Sale!', 'goodresto' ) ?></span></div>
                                    <?php endif;?>
                                <?php endif ?>
                                <?php if (!empty($attachment_ids)): ?>
                                    <div id="product-gallery" class="product-gallery post-media product-gallery-<?php echo esc_attr($post->ID); ?>">
                                        <ul id="product-gallery-set" class="slides et-clearfix carousel_thumb">
                                            
                                            <?php
                                                $post_featured_img                = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumb_size);
                                                $post_featured_img_original       = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                                $post_featured_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_featured_img_original[1].'px, '.$post_featured_img[1].'px';
                                                $post_featured_img_srcset         = $post_featured_img_original[0].' '.$post_featured_img_original[1].'w';
                                                $post_featured_img_srcset         .= ', '.$post_featured_img[0].' '.$post_featured_img[1].'w';
                                                $post_featured_img_attr['srcset'] = $post_featured_img_srcset;
                                                $post_featured_img_attr['sizes']  = $post_featured_img_sizes;
                                                $post_featured_img_attr['alt']    = esc_html(get_the_title($post->ID));

                                                if ($product_image_original == "true") {
                                                    $product_gallery_attr = 'class="product-image-zoom photoswip-product" data-size="'.$post_featured_img_original[1].'x'.$post_featured_img_original[2].'"';
                                                }
                                            ?>
                                            <?php if ($post_featured_img[0]): ?>
                                                <li class="product-featured-img">
                                                    <div>
                                                        <a href="<?php echo esc_attr($post_featured_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                                            <?php echo wp_get_attachment_image( get_post_thumbnail_id($post->ID), $thumb_size,false,$post_featured_img_attr); ?>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php endif ?>
                                            <?php foreach ( $attachment_ids as $attachment_id ) { ?>
                                                <li>
                                                    <?php
                                                        $post_img                = wp_get_attachment_image_src($attachment_id, $thumb_size);
                                                        $post_img_original       = wp_get_attachment_image_src($attachment_id, 'full');
                                                        $post_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_img_original[1].'px, '.$post_img[1].'px';
                                                        $post_img_srcset         = $post_img_original[0].' '.$post_img_original[1].'w';
                                                        $post_img_srcset         .= ', '.$post_img[0].' '.$post_img[1].'w';
                                                        $post_img_attr['srcset'] = $post_img_srcset;
                                                        $post_img_attr['sizes']  = $post_img_sizes;
                                                        $post_img_attr['alt']    = esc_html(get_the_title($post->ID));

                                                        if ($product_image_original == "true") {
                                                            $product_gallery_attr = 'class="product-image-zoom photoswip-product" data-size="'.$post_img_original[1].'x'.$post_img_original[2].'"';
                                                        }
                                                    ?>
                                                    <div class="image-container">
                                                        <a href="<?php echo esc_url($post_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                                            <?php echo wp_get_attachment_image( $attachment_id, $thumb_size,false,$post_img_attr); ?>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <div id="product-gallery-navigation" class="product-gallery-navigation gallery-navigation slick-thumbnail-navigation">
                                        <ul id="product-gallery-navigation-set" class="slides et-clearfix">
                                            <li class="product-featured-thumbnail">
                                                <div class="image-container">
                                                    <?php echo wp_get_attachment_image( get_post_thumbnail_id($post->ID), $product_gallery_thumb,false, ''); ?>
                                                </div>
                                            </li>
                                            <?php foreach ( $attachment_ids as $attachment_id ) { ?>
                                                <li>
                                                    <div class="image-container">
                                                        <?php echo wp_get_attachment_image( $attachment_id, $product_gallery_thumb,false, ''); ?>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <?php
                                        $post_img                = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumb_size);
                                        $post_img_original       = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                        $post_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_img_original[1].'px, '.$post_img[1].'px';
                                        $post_img_srcset         = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_srcset         .= ', '.$post_img[0].' '.$post_img[1].'w';
                                        $post_img_attr['srcset'] = $post_img_srcset;
                                        $post_img_attr['sizes']  = $post_img_sizes;
                                        $post_img_attr['alt']    = esc_html(get_the_title($post->ID));
                                    ?>
                                    <?php if ($post_img[0]): ?>
                                        <div id="product-gallery" class="product-gallery post-media">
                                            <a href="<?php echo esc_attr($post_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), $thumb_size,false,$post_img_attr); ?>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <?php echo wc_placeholder_img($thumb_size); ?>  
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                <?php }

                add_filter( 'woocommerce_after_single_product_summary', 'goodresto_enovathemes_after_single_product_summary', 5, 2 );
                function goodresto_enovathemes_after_single_product_summary(){ ?>
                    </div>
                <?php }


            } elseif ($product_single_post_layout == 'single-product-center-mode' && $product_single_sidebar == "none") {

                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

                add_action( 'woocommerce_before_single_product_summary', 'goodresto_enovathemes_before_single_product_summary_center_mode', 5, 2);
                function goodresto_enovathemes_before_single_product_summary_center_mode(){ ?>
                    <div class="single-product-content et-clearfix">
                <?php }

                add_filter( 'woocommerce_after_single_product_summary', 'goodresto_enovathemes_after_single_product_summary_center_mode', 5, 2 );
                function goodresto_enovathemes_after_single_product_summary_center_mode(){ ?>
                    </div>
                <?php }

                add_filter( 'woocommerce_after_single_product_summary', 'goodresto_enovathemes_single_product_image', 3, 2 );
                function goodresto_enovathemes_single_product_image(){ ?>
                    <div class="woocommerce-product-gallery et-clearfix">
                        <div class="woocommerce-product-gallery-inner et-clearfix">
                            <?php

                                global $product,$post,$goodresto_enovathemes;

                                $product_single_post_layout = (isset($GLOBALS['goodresto_enovathemes']['product-single-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['product-single-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['product-single-post-layout'] : "single-product-tabs-under";
                                $product_image_original     = (isset($GLOBALS['goodresto_enovathemes']['product-image-original']) && $GLOBALS['goodresto_enovathemes']['product-image-original'] == 1) ? "true" : "false";

                                $post_img_attr          = array();
                                $attachment_ids         = $product->get_gallery_image_ids();
                                $shop_single_image_size = apply_filters( 'single_product_large_thumbnail_size', 'shop_single' );
                                $thumb_size             = (!empty($shop_single_image_size)) ? $shop_single_image_size : 'full';
                                $product_gallery_thumb  = 'goodresto_144X144';
                            
                                if ($product_single_post_layout == 'single-product-tabs-inside') {
                                    $product_gallery_thumb = 'goodresto_60X90';
                                }

                                $product_gallery_attr = 'class="product-image-zoom" data-lightbox-gallery="product-single"';

                                if ($product_image_original == "true") {
                                    $shop_single_image_size = "full";
                                    $thumb_size             = "full";
                                }

                            ?>
                            <?php
                                if (defined('YITH_WCWL')){
                                    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                                }
                            ?>
                            <?php $stock_status = $product->get_stock_status(); ?>
                            <?php if ($stock_status == "outofstock"): ?>
                                <div class="product-status outofstock"><span><?php echo esc_html__( 'Out of stock', 'goodresto' ) ?></span></div>
                            <?php else: ?>
                                <?php if ( $product->is_on_sale() ) : ?>
                                    <div class="product-status onsale"><span><?php echo esc_html__( 'Sale!', 'goodresto' ) ?></span></div>
                                <?php endif;?>
                            <?php endif ?>
                            <?php if (!empty($attachment_ids)): ?>
                                <div id="product-gallery" class="product-gallery post-media product-gallery-<?php echo esc_attr($post->ID); ?>">
                                    <ul id="product-gallery-set" class="slides et-clearfix carousel_thumb">
                                        
                                        <?php
                                            $post_featured_img                = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumb_size);
                                            $post_featured_img_original       = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                            $post_featured_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_featured_img_original[1].'px, '.$post_featured_img[1].'px';
                                            $post_featured_img_srcset         = $post_featured_img_original[0].' '.$post_featured_img_original[1].'w';
                                            $post_featured_img_srcset         .= ', '.$post_featured_img[0].' '.$post_featured_img[1].'w';
                                            $post_featured_img_attr['srcset'] = $post_featured_img_srcset;
                                            $post_featured_img_attr['sizes']  = $post_featured_img_sizes;
                                            $post_featured_img_attr['alt']    = esc_html(get_the_title($post->ID));

                                            if ($product_image_original == "true") {
                                                $product_gallery_attr = 'class="product-image-zoom photoswip-product" data-size="'.$post_featured_img_original[1].'x'.$post_featured_img_original[2].'"';
                                            }
                                        ?>
                                        <?php if ($post_featured_img[0]): ?>
                                            <li class="product-featured-img">
                                                <div>
                                                    <a href="<?php echo esc_attr($post_featured_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                                        <?php echo wp_get_attachment_image( get_post_thumbnail_id($post->ID), $thumb_size,false,$post_featured_img_attr); ?>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endif ?>
                                        <?php foreach ( $attachment_ids as $attachment_id ) { ?>
                                            <li>
                                                <?php
                                                    $post_img                = wp_get_attachment_image_src($attachment_id, $thumb_size);
                                                    $post_img_original       = wp_get_attachment_image_src($attachment_id, 'full');
                                                    $post_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_img_original[1].'px, '.$post_img[1].'px';
                                                    $post_img_srcset         = $post_img_original[0].' '.$post_img_original[1].'w';
                                                    $post_img_srcset         .= ', '.$post_img[0].' '.$post_img[1].'w';
                                                    $post_img_attr['srcset'] = $post_img_srcset;
                                                    $post_img_attr['sizes']  = $post_img_sizes;
                                                    $post_img_attr['alt']    = esc_html(get_the_title($post->ID));

                                                    if ($product_image_original == "true") {
                                                        $product_gallery_attr = 'class="product-image-zoom photoswip-product" data-size="'.$post_img_original[1].'x'.$post_img_original[2].'"';
                                                    }
                                                ?>
                                                <div class="image-container">
                                                    <a href="<?php echo esc_url($post_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                                        <?php echo wp_get_attachment_image( $attachment_id, $thumb_size,false,$post_img_attr); ?>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <div id="product-gallery-navigation" class="product-gallery-navigation gallery-navigation slick-thumbnail-navigation">
                                    <ul id="product-gallery-navigation-set" class="slides et-clearfix">
                                        <li class="product-featured-thumbnail">
                                            <div class="image-container">
                                                <?php echo wp_get_attachment_image( get_post_thumbnail_id($post->ID), $product_gallery_thumb,false, ''); ?>
                                            </div>
                                        </li>
                                        <?php foreach ( $attachment_ids as $attachment_id ) { ?>
                                            <li>
                                                <div class="image-container">
                                                    <?php echo wp_get_attachment_image( $attachment_id, $product_gallery_thumb,false, ''); ?>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <?php
                                    $post_img                = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumb_size);
                                    $post_img_original       = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                    $post_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_img_original[1].'px, '.$post_img[1].'px';
                                    $post_img_srcset         = $post_img_original[0].' '.$post_img_original[1].'w';
                                    $post_img_srcset         .= ', '.$post_img[0].' '.$post_img[1].'w';
                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                    $post_img_attr['alt']    = esc_html(get_the_title($post->ID));
                                ?>
                                <?php if ($post_img[0]): ?>
                                    <div id="product-gallery" class="product-gallery post-media">
                                        <a href="<?php echo esc_attr($post_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                            <?php echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), $thumb_size,false,$post_img_attr); ?>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <?php echo wc_placeholder_img($thumb_size); ?>  
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                <?php }

                add_filter( 'woocommerce_after_single_product_summary', 'goodresto_enovathemes_single_product_cart_start', 4, 2 );
                function goodresto_enovathemes_single_product_cart_start(){ ?>
                    <div class="woocommerce-single-product-cart summary">
                <?php }

                    add_action('woocommerce_after_single_product_summary', 'woocommerce_template_single_price', 4 );
                    add_action('woocommerce_after_single_product_summary', 'woocommerce_template_single_add_to_cart', 4 );

                add_filter( 'woocommerce_after_single_product_summary', 'goodresto_enovathemes_single_product_cart_end', 5, 2 );
                function goodresto_enovathemes_single_product_cart_end(){ ?>
                    </div>
                <?php }

            }

            if ($product_single_social == "true") {
                add_filter( 'woocommerce_product_meta_end', 'goodresto_enovathemes_woocommerce_product_meta_end', 5, 2 );
                function goodresto_enovathemes_woocommerce_product_meta_end(){ ?>
                    <?php echo enovathemes_addons_post_social_share('post-social-share'); ?>
                <?php }
            }

        }

        add_action('init', 'goodresto_enovathemes_product_data_tabs');
        function goodresto_enovathemes_product_data_tabs(){

            global $goodresto_enovathemes;

            if (defined('THEME_PANEL')) {
                theme_panel_demo_configurations_woocommerce();
            }

            $product_single_post_layout = (isset($GLOBALS['goodresto_enovathemes']['product-single-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['product-single-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['product-single-post-layout'] : "single-product-tabs-under";

            if ($product_single_post_layout == "single-product-tabs-inside") {

                remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
                add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 ); 
            }
        }

        remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
        add_action('woocommerce_after_single_product_summary', 'goodresto_enovathemes_upsell_display', 15 );
        function goodresto_enovathemes_upsell_display (){ ?>

            <?php

                global $post, $goodresto_enovathemes, $product;

                $product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                $product_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['product-post-layout']) && $GLOBALS['goodresto_enovathemes']['product-post-layout']) ? $GLOBALS['goodresto_enovathemes']['product-post-layout'] : "product-with-details";

                $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($product_post_layout == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

                $upsells = $product->get_upsell_ids();

            ?>

            <?php if ($upsells): ?>

                <?php

                    $product_ids = array();

                    foreach($upsells as $product_id => $value) {array_push($product_ids, $value);}

                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page'      => 5000,
                        'ignore_sticky_posts' => 1,
                        'orderby'             => 'date',
                        'post__not_in'    => array($post->ID),
                        'post__in'        => $product_ids,
                    );

                    $upsells_products = new WP_Query($args);

                ?>

                <?php if ($upsells_products->have_posts()): ?>

                    <div class="related-products-wrapper upsells et-clearfix">
                        <h4 class="related-products-title"><?php echo esc_html__("You may also like", 'goodresto'); ?></h4>
                        <div id="related-products" data-columns="3" class="related-products loop-product owl-carousel et-clearfix <?php echo esc_attr($product_image_effect); ?>">
                            <?php while($upsells_products->have_posts()) : $upsells_products->the_post(); ?>
                                <article class="product post et-clearfix" id="post-<?php $post->ID; ?>">
                                    <?php

                                        global $product;

                                        if (has_post_thumbnail()){

                                            if ( '' != the_title_attribute( 'echo=0' ) ){
                                                $post_img_attr['alt'] = the_title_attribute( 'echo=0' );
                                            }

                                            $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                            $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                            $post_img_srcset = "";

                                            if (strpos($post_img_588, '588x')) {
                                                $post_img_srcset .= $post_img_588.' 588w';
                                            } else {
                                                $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                            }

                                            if (empty($post_img_srcset) || $product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                $thumb_size      = 'full';
                                            }

                                            $post_img_attr['srcset'] = $post_img_srcset;
                                            $post_img_attr['sizes']  = $post_img_sizes;
                                        }
                                    ?>
                                    <div class="post-inner et-item-inner et-clearfix">
                                        <?php if (defined('YITH_WCWL')): ?>
                                            <?php  echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                        <?php endif ?>
                                        <?php $stock_status = $product->get_stock_status(); ?>
                                        <?php if ($stock_status == "outofstock"): ?>
                                            <div class="product-status outofstock"><span><?php echo esc_html__( 'Out of stock', 'goodresto' ) ?></span></div>
                                        <?php else: ?>
                                            <?php if ( $product->is_on_sale() ) : ?>
                                                <div class="product-status onsale"><span><?php echo esc_html__( 'Sale!', 'goodresto' ) ?></span></div>
                                            <?php endif;?>
                                        <?php endif ?>
                                        <div class="post-image post-media overlay-hover">

                                            <?php if (class_exists('YITH_WCQV_Frontend')): ?>

                                                <?php if (get_option('yith-wcqv-enable') == 'yes'): ?>

                                                    <?php
                                                        global $product;
                                                        echo '<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'goodresto').'">' . esc_html__("Quick view", 'goodresto') . '</a>';
                                                    ?>
                                                <?php endif ?>
                                            <?php endif ?>

                                            <?php if ($product_image_effect != "overlay-none"): ?>
                                                <?php echo goodresto_enovathemes_product_image_overlay(get_the_ID()); ?>
                                                <div class="image-container visible">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr); ?>
                                                    <?php else: ?>
                                                        <?php echo wc_placeholder_img($thumb_size); ?>
                                                    <?php endif ?>
                                                </div>
                                            <?php else: ?>
                                                <a href="<?php the_permalink(); ?>" >
                                                    <div class="product-image-gallery">
                                                        <div class="image-container visible">
                                                            <div class="image-preloader"></div>
                                                            <?php if (has_post_thumbnail()): ?>
                                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr); ?>
                                                            <?php else: ?>
                                                                <?php echo wc_placeholder_img($thumb_size); ?>
                                                            <?php endif ?>
                                                        </div>
                                                        <?php $product_gallery_ids = $product->get_gallery_image_ids(); ?>
                                                        <?php if (is_array($product_gallery_ids) && !empty($product_gallery_ids)): ?>
                                                            <?php foreach ($product_gallery_ids as $image_id): ?>
                                                                <?php

                                                                    $post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                                    $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                                    $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                                    $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                                    $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                                    $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                                    $post_img_srcset = "";

                                                                    if (strpos($post_img_282[0], '282x')) {
                                                                        $post_img_srcset .= $post_img_282[0].' 282w';
                                                                    }

                                                                    if (strpos($post_img_384[0], '384x')) {
                                                                        $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                                    }

                                                                    if (strpos($post_img_588[0], '588x')) {
                                                                        $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                                    }

                                                                    if (strpos($post_img_640[0], '640x')) {

                                                                        $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                                    }

                                                                    if (strpos($post_img_960[0], '960x')) {
                                                                        $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                                    }

                                                                    if ($product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                                        $thumb_size = 'full';
                                                                    }

                                                                    if (empty($post_img_srcset) || $product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                                    }

                                                                    $post_img_attr['srcset'] = $post_img_srcset;
                                                                    $post_img_attr['sizes']  = $post_img_sizes;
                                                                ?>
                                                                <?php echo wp_get_attachment_image($image_id,$thumb_size,false,$post_img_attr); ?>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </div>
                                                </a>
                                            <?php endif ?>
                                        </div>
                                        <div class="post-body et-clearfix">
                                            <div class="post-body-inner-wrap">
                                                <div class="post-body-inner">
                                                    <h4 class="post-title">
                                                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__("Go to", 'goodresto').' '.the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                    <!-- Rating -->
                                                    <?php 
                                                        if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
                                                            echo wc_get_rating_html( $product->get_average_rating() );
                                                        }
                                                    ?>
                                                    <!-- Price -->
                                                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                                                        <span class="price"><?php echo html_entity_decode($price_html); ?></span>
                                                    <?php endif; ?>
                                                    <!-- Add to cart -->
                                                    <?php
                                                        $product_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                        $product_class = 'button add_to_cart_button product-loop-button';
                                                        if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $product_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                            $product_class .=' ajax_add_to_cart';
                                                        }

                                                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                            sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-product_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                                esc_url( $product->add_to_cart_url() ),
                                                                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                                esc_attr( $product->get_id() ),
                                                                esc_attr( $product->get_sku() ),
                                                                esc_attr( $product_type ),
                                                                esc_attr( $product->get_stock_status() ),
                                                                esc_attr( $product_class ),
                                                                esc_html( $product->add_to_cart_text() ),
                                                                esc_html( $product->add_to_cart_text() )
                                                            ),
                                                        $product );
                                                    ?>
                                                    <?php
                                                        if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                            echo '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                <?php endif ?>
                
            <?php endif ?>

        <?php }

        remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
        add_action('woocommerce_cart_collaterals', 'goodresto_enovathemes_cross_sell_display',1);
        function goodresto_enovathemes_cross_sell_display (){ ?>

            <?php

                if ( is_checkout() ) {
                    return;
                }

                global $goodresto_enovathemes;

                $product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                $product_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['product-post-layout']) && $GLOBALS['goodresto_enovathemes']['product-post-layout']) ? $GLOBALS['goodresto_enovathemes']['product-post-layout'] : "product-with-details";

                $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($product_post_layout == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

                $cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

            ?>

            <?php if ($cross_sells): ?>

                <div class="related-products-wrapper cross_sells et-clearfix">
                    <h4 class="related-products-title"><?php echo esc_html__("You may be interested in...", 'goodresto'); ?></h4>
                    <div id="related-products" data-columns="3" class="related-products loop-product owl-carousel et-clearfix <?php echo esc_attr($product_image_effect); ?>">
                    <?php foreach ( $cross_sells as $cross_sell ) : ?>
                        <?php $post_object = get_post( $cross_sell->get_id() ); ?>
                        <?php setup_postdata( $GLOBALS['post'] =& $post_object ); ?>
                        <?php global $product, $post; ?>
                        <article class="product post et-clearfix" id="post-<?php $post->ID; ?>">
                            <?php

                                global $product;

                                if (has_post_thumbnail()){

                                    if ( '' != the_title_attribute( 'echo=0' ) ){
                                        $post_img_attr['alt'] = the_title_attribute( 'echo=0' );
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }
                            ?>
                            <div class="post-inner et-item-inner et-clearfix">
                                <?php if (defined('YITH_WCWL')): ?>
                                    <?php  echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                <?php endif ?>
                                <?php $stock_status = $product->get_stock_status(); ?>
                                <?php if ($stock_status == "outofstock"): ?>
                                    <div class="product-status outofstock"><span><?php echo esc_html__( 'Out of stock', 'goodresto' ) ?></span></div>
                                <?php else: ?>
                                    <?php if ( $product->is_on_sale() ) : ?>
                                        <div class="product-status onsale"><span><?php echo esc_html__( 'Sale!', 'goodresto' ) ?></span></div>
                                    <?php endif;?>
                                <?php endif ?>
                                <div class="post-image post-media overlay-hover">

                                    <?php if (class_exists('YITH_WCQV_Frontend')): ?>

                                        <?php if (get_option('yith-wcqv-enable') == 'yes'): ?>

                                            <?php
                                                global $product;
                                                echo '<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'goodresto').'">' . esc_html__("Quick view", 'goodresto') . '</a>';
                                            ?>
                                        <?php endif ?>
                                    <?php endif ?>

                                    <?php if ($product_image_effect != "overlay-none"): ?>
                                        <?php echo goodresto_enovathemes_product_image_overlay(get_the_ID()); ?>
                                        <div class="image-container visible">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr); ?>
                                            <?php else: ?>
                                                <?php echo wc_placeholder_img($thumb_size); ?>
                                            <?php endif ?>
                                        </div>
                                    <?php else: ?>
                                        <a href="<?php the_permalink(); ?>" >
                                            <div class="product-image-gallery">
                                                <div class="image-container visible">
                                                    <div class="image-preloader"></div>
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr); ?>
                                                    <?php else: ?>
                                                        <?php echo wc_placeholder_img($thumb_size); ?>
                                                    <?php endif ?>
                                                </div>
                                                <?php $product_gallery_ids = $product->get_gallery_image_ids(); ?>
                                                <?php if (is_array($product_gallery_ids) && !empty($product_gallery_ids)): ?>
                                                    <?php foreach ($product_gallery_ids as $image_id): ?>
                                                        <?php

                                                            $post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;
                                                        ?>
                                                        <?php echo wp_get_attachment_image($image_id,$thumb_size,false,$post_img_attr); ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </div>
                                        </a>
                                    <?php endif ?>
                                </div>
                                <div class="post-body et-clearfix">
                                    <div class="post-body-inner-wrap">
                                        <div class="post-body-inner">
                                            <h4 class="post-title">
                                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__("Go to", 'goodresto').' '.the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <!-- Rating -->
                                            <?php 
                                                if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
                                                    echo wc_get_rating_html( $product->get_average_rating() );
                                                }
                                            ?>
                                            <!-- Price -->
                                            <?php if ( $price_html = $product->get_price_html() ) : ?>
                                                <span class="price"><?php echo html_entity_decode($price_html); ?></span>
                                            <?php endif; ?>
                                            <!-- Add to cart -->
                                            <?php
                                                $product_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $product_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-product_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $product_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );
                                            ?>
                                            <?php
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    echo '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    </div>
                </div>
                
            <?php endif; ?>

        <?php }

        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        add_action('woocommerce_after_single_product_summary', 'goodresto_enovathemes_output_related_products', 20 );
        function goodresto_enovathemes_output_related_products (){ ?>

            <?php

                global $post, $goodresto_enovathemes;

                $product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                $product_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['product-post-layout']) && $GLOBALS['goodresto_enovathemes']['product-post-layout']) ? $GLOBALS['goodresto_enovathemes']['product-post-layout'] : "product-with-details";

                $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($product_post_layout == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

                $terms = get_the_terms( $post->ID , 'product_cat');

            ?>

            <?php if ($terms): ?>

                <?php

                    $categoryids = array();
                    foreach($terms as $category) {$categoryids[] = $category->term_id;}

                    $args = array(
                        'post_type' => 'product',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'id',
                                'terms'    => $categoryids,
                                'operator' => 'IN'
                             )
                        ),
                        'posts_per_page'      => 5000,
                        'ignore_sticky_posts' => 1,
                        'orderby'             => 'date',
                        'post__not_in'        => array($post->ID)
                    );

                    $related_products = new WP_Query($args);

                ?>

                <?php if ($related_products->have_posts()): ?>

                    <div class="related-products-wrapper et-clearfix">
                        <h4 class="related-products-title"><?php echo esc_html__("Related products", 'goodresto'); ?></h4>
                        <div id="related-products" data-columns="3" class="related-products loop-product owl-carousel et-clearfix <?php echo esc_attr($product_image_effect); ?>">
                            <?php while($related_products->have_posts()) : $related_products->the_post(); ?>
                                <article class="product post et-clearfix" id="post-<?php $post->ID; ?>">
                                    <?php

                                        global $product;

                                        if (has_post_thumbnail()){

                                            if ( '' != the_title_attribute( 'echo=0' ) ){
                                                $post_img_attr['alt'] = the_title_attribute( 'echo=0' );
                                            }

                                            $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                            $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                            $post_img_srcset = "";

                                            if (strpos($post_img_588, '588x')) {
                                                $post_img_srcset .= $post_img_588.' 588w';
                                            } else {
                                                $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                            }

                                            if (empty($post_img_srcset) || $product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                $thumb_size      = 'full';
                                            }

                                            $post_img_attr['srcset'] = $post_img_srcset;
                                            $post_img_attr['sizes']  = $post_img_sizes;
                                        }
                                    ?>
                                    <div class="post-inner et-item-inner et-clearfix">
                                        <?php if (defined('YITH_WCWL')): ?>
                                            <?php  echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                        <?php endif ?>
                                        <?php $stock_status = $product->get_stock_status(); ?>
                                        <?php if ($stock_status == "outofstock"): ?>
                                            <div class="product-status outofstock"><span><?php echo esc_html__( 'Out of stock', 'goodresto' ) ?></span></div>
                                        <?php else: ?>
                                            <?php if ( $product->is_on_sale() ) : ?>
                                                <div class="product-status onsale"><span><?php echo esc_html__( 'Sale!', 'goodresto' ) ?></span></div>
                                            <?php endif;?>
                                        <?php endif ?>
                                        <div class="post-image post-media overlay-hover">

                                            <?php if (class_exists('YITH_WCQV_Frontend')): ?>

                                                <?php if (get_option('yith-wcqv-enable') == 'yes'): ?>

                                                    <?php
                                                        global $product;
                                                        echo '<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'goodresto').'">' . esc_html__("Quick view", 'goodresto') . '</a>';
                                                    ?>
                                                <?php endif ?>
                                            <?php endif ?>

                                            <?php if ($product_image_effect != "overlay-none"): ?>
                                                <?php echo goodresto_enovathemes_product_image_overlay(get_the_ID()); ?>
                                                <div class="image-container visible">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr); ?>
                                                    <?php else: ?>
                                                        <?php echo wc_placeholder_img($thumb_size); ?>
                                                    <?php endif ?>
                                                </div>
                                            <?php else: ?>
                                                <a href="<?php the_permalink(); ?>" >
                                                    <div class="product-image-gallery">
                                                        <div class="image-container visible">
                                                            <div class="image-preloader"></div>
                                                            <?php if (has_post_thumbnail()): ?>
                                                                <?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr); ?>
                                                            <?php else: ?>
                                                                <?php echo wc_placeholder_img($thumb_size); ?>
                                                            <?php endif ?>
                                                        </div>
                                                        <?php $product_gallery_ids = $product->get_gallery_image_ids(); ?>
                                                        <?php if (is_array($product_gallery_ids) && !empty($product_gallery_ids)): ?>
                                                            <?php foreach ($product_gallery_ids as $image_id): ?>
                                                                <?php

                                                                    $post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                                    $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                                    $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                                    $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                                    $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                                    $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                                    $post_img_srcset = "";

                                                                    if (strpos($post_img_282[0], '282x')) {
                                                                        $post_img_srcset .= $post_img_282[0].' 282w';
                                                                    }

                                                                    if (strpos($post_img_384[0], '384x')) {
                                                                        $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                                    }

                                                                    if (strpos($post_img_588[0], '588x')) {
                                                                        $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                                    }

                                                                    if (strpos($post_img_640[0], '640x')) {

                                                                        $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                                    }

                                                                    if (strpos($post_img_960[0], '960x')) {
                                                                        $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                                    }

                                                                    if ($product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                                        $thumb_size = 'full';
                                                                    }

                                                                    if (empty($post_img_srcset) || $product_post_layout == "masonry1" || $product_post_layout == "masonry2") {
                                                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                                    }

                                                                    $post_img_attr['srcset'] = $post_img_srcset;
                                                                    $post_img_attr['sizes']  = $post_img_sizes;
                                                                ?>
                                                                <?php echo wp_get_attachment_image($image_id,$thumb_size,false,$post_img_attr); ?>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </div>
                                                </a>
                                            <?php endif ?>
                                        </div>
                                        <div class="post-body et-clearfix">
                                            <div class="post-body-inner-wrap">
                                                <div class="post-body-inner">
                                                    <h4 class="post-title">
                                                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__("Go to", 'goodresto').' '.the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                    <!-- Rating -->
                                                    <?php 
                                                        if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
                                                            echo wc_get_rating_html( $product->get_average_rating() );
                                                        }
                                                    ?>
                                                    <!-- Price -->
                                                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                                                        <span class="price"><?php echo html_entity_decode($price_html); ?></span>
                                                    <?php endif; ?>
                                                    <!-- Add to cart -->
                                                    <?php
                                                        $product_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                        $product_class = 'button add_to_cart_button product-loop-button';
                                                        if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $product_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                            $product_class .=' ajax_add_to_cart';
                                                        }

                                                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                            sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-product_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                                esc_url( $product->add_to_cart_url() ),
                                                                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                                esc_attr( $product->get_id() ),
                                                                esc_attr( $product->get_sku() ),
                                                                esc_attr( $product_type ),
                                                                esc_attr( $product->get_stock_status() ),
                                                                esc_attr( $product_class ),
                                                                esc_html( $product->add_to_cart_text() ),
                                                                esc_html( $product->add_to_cart_text() )
                                                            ),
                                                        $product );
                                                    ?>
                                                    <?php
                                                        if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                            echo '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                <?php endif ?>
                
            <?php endif ?>

        <?php }

        remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
        add_action( 'woocommerce_review_before', 'goodresto_enovathemes_woocommerce_review_display_gravatar', 10 );
        function goodresto_enovathemes_woocommerce_review_display_gravatar( $comment ) {
            echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '72' ), '' );
        }

        if (class_exists('YITH_WCQV')) {
            remove_action( 'yith_wcqv_product_image', 'woocommerce_show_product_sale_flash', 10 );
            remove_action( 'yith_wcqv_product_image', 'woocommerce_show_product_images', 20 );
            add_action( 'yith_wcqv_product_image', 'goodresto_enovathemes_woocommerce_show_product_images', 20 );
            function goodresto_enovathemes_woocommerce_show_product_images(){?>
                <div class="woocommerce-product-gallery et-clearfix">
                    <div class="woocommerce-product-gallery-inner et-clearfix">
                        <?php

                            global $product,$post,$goodresto_enovathemes;

                            $product_single_post_layout = (isset($GLOBALS['goodresto_enovathemes']['product-single-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['product-single-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['product-single-post-layout'] : "single-product-tabs-under";
                            $product_image_original     = (isset($GLOBALS['goodresto_enovathemes']['product-image-original']) && $GLOBALS['goodresto_enovathemes']['product-image-original'] == 1) ? "true" : "false";

                            $post_img_attr          = array();
                            $attachment_ids         = $product->get_gallery_image_ids();
                            $shop_single_image_size = apply_filters( 'single_product_large_thumbnail_size', 'shop_single' );
                            $thumb_size             = (!empty($shop_single_image_size)) ? $shop_single_image_size : 'full';
                            $product_gallery_thumb  = 'goodresto_144X144';
                        
                            if ($product_single_post_layout == 'single-product-tabs-inside') {
                                $product_gallery_thumb = 'goodresto_60X90';
                            }

                            $product_gallery_attr = 'class="product-image-zoom" data-lightbox-gallery="product-single"';

                            if ($product_image_original == "true") {
                                $shop_single_image_size = "full";
                                $thumb_size             = "full";
                            }

                        ?>
                        <?php
                            if (defined('YITH_WCWL')){
                                echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                            }
                        ?>
                        <?php $stock_status = $product->get_stock_status(); ?>
                        <?php if ($stock_status == "outofstock"): ?>
                            <div class="product-status outofstock"><span><?php echo esc_html__( 'Out of stock', 'goodresto' ) ?></span></div>
                        <?php else: ?>
                            <?php if ( $product->is_on_sale() ) : ?>
                                <div class="product-status onsale"><span><?php echo esc_html__( 'Sale!', 'goodresto' ) ?></span></div>
                            <?php endif;?>
                        <?php endif ?>
                        <?php if (!empty($attachment_ids)): ?>
                            <div id="product-gallery" class="product-gallery post-media product-gallery-<?php echo esc_attr($post->ID); ?>">
                                <ul id="product-gallery-set" class="slides et-clearfix carousel_thumb">
                                    
                                    <?php
                                        $post_featured_img                = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumb_size);
                                        $post_featured_img_original       = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                        $post_featured_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_featured_img_original[1].'px, '.$post_featured_img[1].'px';
                                        $post_featured_img_srcset         = $post_featured_img_original[0].' '.$post_featured_img_original[1].'w';
                                        $post_featured_img_srcset         .= ', '.$post_featured_img[0].' '.$post_featured_img[1].'w';
                                        $post_featured_img_attr['srcset'] = $post_featured_img_srcset;
                                        $post_featured_img_attr['sizes']  = $post_featured_img_sizes;
                                        $post_featured_img_attr['alt']    = esc_html(get_the_title($post->ID));

                                        if ($product_image_original == "true") {
                                            $product_gallery_attr = 'class="product-image-zoom photoswip-product" data-size="'.$post_featured_img_original[1].'x'.$post_featured_img_original[2].'"';
                                        }
                                    ?>
                                    <?php if ($post_featured_img[0]): ?>
                                        <li class="product-featured-img">
                                            <div>
                                                <a href="<?php echo esc_attr($post_featured_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                                    <?php echo wp_get_attachment_image( get_post_thumbnail_id($post->ID), $thumb_size,false,$post_featured_img_attr); ?>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endif ?>
                                    <?php foreach ( $attachment_ids as $attachment_id ) { ?>
                                        <li>
                                            <?php
                                                $post_img                = wp_get_attachment_image_src($attachment_id, $thumb_size);
                                                $post_img_original       = wp_get_attachment_image_src($attachment_id, 'full');
                                                $post_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_img_original[1].'px, '.$post_img[1].'px';
                                                $post_img_srcset         = $post_img_original[0].' '.$post_img_original[1].'w';
                                                $post_img_srcset         .= ', '.$post_img[0].' '.$post_img[1].'w';
                                                $post_img_attr['srcset'] = $post_img_srcset;
                                                $post_img_attr['sizes']  = $post_img_sizes;
                                                $post_img_attr['alt']    = esc_html(get_the_title($post->ID));

                                                if ($product_image_original == "true") {
                                                    $product_gallery_attr = 'class="product-image-zoom photoswip-product" data-size="'.$post_img_original[1].'x'.$post_img_original[2].'"';
                                                }
                                            ?>
                                            <div class="image-container">
                                                <a href="<?php echo esc_url($post_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                                    <?php echo wp_get_attachment_image( $attachment_id, $thumb_size,false,$post_img_attr); ?>
                                                </a>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <?php
                                $post_img                = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumb_size);
                                $post_img_original       = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                $post_img_sizes          = '(max-width: 479px) 92vw, (max-width: 1023px) '.$post_img_original[1].'px, '.$post_img[1].'px';
                                $post_img_srcset         = $post_img_original[0].' '.$post_img_original[1].'w';
                                $post_img_srcset         .= ', '.$post_img[0].' '.$post_img[1].'w';
                                $post_img_attr['srcset'] = $post_img_srcset;
                                $post_img_attr['sizes']  = $post_img_sizes;
                                $post_img_attr['alt']    = esc_html(get_the_title($post->ID));
                            ?>
                            <?php if ($post_img[0]): ?>
                                <div id="product-gallery" class="product-gallery post-media">
                                    <a href="<?php echo esc_attr($post_img_original[0]); ?>" <?php echo html_entity_decode($product_gallery_attr); ?>>
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), $thumb_size,false,$post_img_attr); ?>
                                    </a>
                                </div>
                            <?php else: ?>
                                <?php echo wc_placeholder_img($thumb_size); ?>  
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            <?php }
        }
        
    }

/* Scripts
---------------*/

    function goodresto_enovathemes_script()
    {
        if(!is_admin())
        {
            global $goodresto_enovathemes,$wp_query;

            $custom_scroll                    = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll']) && $GLOBALS['goodresto_enovathemes']['custom-scroll'] == 1) ? "true" : "false";
            $custom_scroll_cursorcolor        = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-cursorcolor']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-cursorcolor'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-cursorcolor'] : '#222222';
            $custom_scroll_railcolor          = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-railcolor']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-railcolor'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-railcolor'] : '#666666'; 
            $custom_scroll_cursoropacitymin   = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-cursoropacitymin']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-cursoropacitymin'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-cursoropacitymin'] : '100';
            $custom_scroll_cursoropacitymax   = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-cursoropacitymax']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-cursoropacitymax'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-cursoropacitymax'] : '100';
            $custom_scroll_cursorwidth        = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-cursorwidth']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-cursorwidth'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-cursorwidth'] : '10';
            $custom_scroll_cursorborderradius = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-cursorborderradius']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-cursorborderradius'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-cursorborderradius'] : '5';
            $custom_scroll_scrollspeed        = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-scrollspeed']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-scrollspeed'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-scrollspeed'] : '60';
            $custom_scroll_mousescrollstep    = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-mousescrollstep']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-mousescrollstep'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-mousescrollstep'] : '40';
            $custom_scroll_mousescrollstep    = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-mousescrollstep']) && !empty($GLOBALS['goodresto_enovathemes']['custom-scroll-mousescrollstep'])) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-mousescrollstep'] : '40';

            $sticky_header_height = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-height']) && $GLOBALS['goodresto_enovathemes']['sticky-header-height']) ? $GLOBALS['goodresto_enovathemes']['sticky-header-height'] : "90";

            $post_max   = $wp_query->max_num_pages;
            $post_paged = (get_query_var('page')) ? get_query_var('page') : 1;
            
            $event_max      = (empty($event_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$event_per_page);
            $event_per_page = (isset($GLOBALS['goodresto_enovathemes']['event-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['event-per-page'])) ? $GLOBALS['goodresto_enovathemes']['event-per-page'] : get_option( 'posts_per_page' );

            $menu_max      = (empty($menu_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$menu_per_page);
            $menu_per_page = (isset($GLOBALS['goodresto_enovathemes']['menu-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['menu-per-page'])) ? $GLOBALS['goodresto_enovathemes']['menu-per-page'] : get_option( 'posts_per_page' );

            $product_max      = (empty($product_per_page)) ? $wp_query->max_num_pages : ceil($wp_query->found_posts/$product_per_page);
            $product_per_page = (isset($GLOBALS['goodresto_enovathemes']['product-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['product-per-page'])) ? $GLOBALS['goodresto_enovathemes']['product-per-page'] : get_option( 'posts_per_page' );


            // Woocommerce single product button
            $product_single_button_class = 'product-single-button';

            wp_enqueue_style( 'goodresto-style', get_stylesheet_uri() );
            
            wp_enqueue_style( 'goodresto-default-fonts', goodresto_enovathemes_fonts_url(), array(), '1.0.0' );

            if (isset($GLOBALS['goodresto_enovathemes']['disable-defaults']) && $GLOBALS['goodresto_enovathemes']['disable-defaults'] == 1) {
                wp_dequeue_style( 'cabin-condensed-raleway');
            }

            if ( is_singular() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
            }

            if (isset($GLOBALS['goodresto_enovathemes']['google-map-api']) && !empty($GLOBALS['goodresto_enovathemes']['google-map-api'])) {
                wp_enqueue_script( 'gmap', '//maps.google.com/maps/api/js?key='.esc_attr($GLOBALS['goodresto_enovathemes']['google-map-api']), array(), false);
            } else {
                wp_enqueue_script( 'gmap', '//maps.google.com/maps/api/js', array(), false);
            }
            wp_enqueue_script( 'modernizr', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/modernizr.js', array(), false);
            wp_enqueue_script( 'fontawesome', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/fontawesome-all.min.js', array(), false);
            if (isset($GLOBALS['goodresto_enovathemes']['smooth-scroll']) && $GLOBALS['goodresto_enovathemes']['smooth-scroll'] == 1) {
                wp_enqueue_script( 'smoothpagescroll', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/smoothPageScroll.min.js', array('jquery'), '', true);
            }

            wp_enqueue_script( 'imagesloaded');
            wp_enqueue_script( 'jquery-masonry');
            wp_enqueue_script( 'hoverIntent');

            if (isset($GLOBALS['goodresto_enovathemes']['combine-scripts']) && $GLOBALS['goodresto_enovathemes']['combine-scripts'] == 1) {
                wp_enqueue_script( 'controller', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/controller-combined.js', array('jquery'), '', true);
            } else {
                wp_enqueue_script( 'nice-scroll', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/nice-scroll.js', array('jquery'), '', true);
                wp_enqueue_script( 'classie', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/classie.js', array('jquery'), '', true);
                wp_enqueue_script( 'inview', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/inview.js', array('jquery'), '', true);
                wp_enqueue_script( 'easing', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/easing.js', array('jquery'), '', true);
                wp_enqueue_script( 'mobile-events', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/mobile-events.js', array('jquery'), '', true);
                wp_enqueue_script( 'easy-pie-chart', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/easy-pie-chart.js', array('jquery'), '', true);
                wp_enqueue_script( 'animate-colors', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/animate-colors.js', array('jquery'), '', true);
                wp_enqueue_script( 'flex-slider', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/flex-slider.js', array('jquery'), '', true);
                wp_enqueue_script( 'mousewheel', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/mousewheel.js', array('jquery'), '', true);
                wp_enqueue_script( 'from-to', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/from-to.js', array('jquery'), '', true);
                wp_enqueue_script( 'count-down', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/count-down.js', array('jquery'), '', true);
                wp_enqueue_script( 'tooltip', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/tooltip.js', array('jquery'), '', true);
                wp_enqueue_script( 'overlay-fluid', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/overlay-fluid.js', array('jquery'), '', true);
                wp_enqueue_script( 'nivolightbox', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/nivolightbox.js', array('jquery'), '', true);
                wp_enqueue_script( 'slick-carousel', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/slick-carousel.js', array('jquery'), '', true);
                wp_enqueue_script( 'footer-sticky', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/footer-sticky.js', array('jquery'), '', true);
                wp_enqueue_script( 'zoom-in', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/zoom-in.js', array('jquery'), '', true);
                wp_enqueue_script( 'cookie', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/cookie.js', array('jquery'), '', true);
                wp_enqueue_script( 'typeit', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/typeit.js', array('jquery'), '', true);
                wp_enqueue_script( 'sticky-kit', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/sticky-kit.js', array('jquery'), '', true);
                wp_enqueue_script( 'owl-carousel', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/owl-carousel.js', array('jquery'), '', true);
                wp_enqueue_script( 'multiscroll', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/multiscroll.js', array('jquery'), '', true);
                wp_enqueue_script( 'isotop', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/isotop.js', array('jquery'), '', true);
                wp_enqueue_script( 'photoswip', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/photoswip.js', array('jquery'), '', true);
                wp_enqueue_script( 'controller', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/controller.js', array('jquery'), '', true);
            }

            wp_localize_script( 
                'controller', 
                'controller_opt', 
                array(
                    'customScroll'                   => $custom_scroll, 
                    'customScrollCursorcolor'        => $custom_scroll_cursorcolor,
                    'customScrollRailcolor'          => $custom_scroll_railcolor,
                    'customScrollCursorOpacityMin'   => $custom_scroll_cursoropacitymin,
                    'customScrollCursorOpacityMax'   => $custom_scroll_cursoropacitymax,
                    'customScrollCursorWidth'        => $custom_scroll_cursorwidth,
                    'customScrollCursorBorderRadius' => $custom_scroll_cursorborderradius,
                    'customScrollScrollSpeed'        => $custom_scroll_scrollspeed,
                    'customScrollMouseScrollStep'    => $custom_scroll_mousescrollstep,
                    'postMax'                        => $post_max,
                    'postStartPage'                  => $post_paged,
                    'postNextLink'                   => next_posts($post_max, false),
                    'postNoText'                     => esc_html__("No more posts", 'goodresto'),
                    'stickyHeaderHeight'             => $sticky_header_height,
                    'eventMax'                     => $event_max,
                    'eventNextLink'                => next_posts($event_max, false),
                    'eventNoText'                  => esc_html__("No more events", 'goodresto'),
                    'eventLoadingText'             => esc_html__("Loading events", 'goodresto'),
                    'menuMax'                     => $menu_max,
                    'menuNextLink'                => next_posts($menu_max, false),
                    'menuNoText'                  => esc_html__("No more items", 'goodresto'),
                    'menuLoadingText'             => esc_html__("Loading items", 'goodresto'),
                    'productMax'                     => $product_max,
                    'productNextLink'                => next_posts($product_max, false),
                    'productNoText'                  => esc_html__("No more products", 'goodresto'),
                    'productLoadingText'             => esc_html__("Loading products", 'goodresto'),
                    'productButtonClass'             => $product_single_button_class,
                    'ajaxurl'                        => admin_url( 'admin-ajax.php', 'relative' ),
                )
            );

            if (is_page()) {

                $values          = get_post_custom( get_the_ID() );
                $one_page        = (isset($values["one_page"][0]) && $values["one_page"][0] == "true") ? "true" : "false";

                if ($one_page == "true") {
                   
                    $one_page_speed  = ($GLOBALS['goodresto_enovathemes']['one-page-speed']) ? esc_js($GLOBALS['goodresto_enovathemes']['one-page-speed']) : 750;
                    $one_page_hash   = ($GLOBALS['goodresto_enovathemes']['one-page-hash'] && $GLOBALS['goodresto_enovathemes']['one-page-hash'] == 1) ? 'true' : 'false';
                    $one_page_nav    = ($GLOBALS['goodresto_enovathemes']['one-page-navigation']) ? $GLOBALS['goodresto_enovathemes']['one-page-navigation'] : 'side';
                    $one_page_filter = (isset($GLOBALS['goodresto_enovathemes']['one-page-filter']) && $GLOBALS['goodresto_enovathemes']['one-page-filter']) ? explode(',',esc_attr($GLOBALS['goodresto_enovathemes']['one-page-filter'])) : '';
                    $et_filter_array    = array();

                    $offset = 0;
                    $from   = 0;

                    $sidebar_navigation    = (isset($GLOBALS['goodresto_enovathemes']['sidebar-navigation']) && $GLOBALS['goodresto_enovathemes']['sidebar-navigation'] == 1) ? "true" : "false";
                    $fullscreen_navigation = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-navigation']) && $GLOBALS['goodresto_enovathemes']['fullscreen-navigation'] == 1) ? "true" : "false";

                    $header_nav = ($sidebar_navigation == 'true' || $fullscreen_navigation == 'true') ? 'false' : 'true';

                    $sticky_header       = (isset($GLOBALS['goodresto_enovathemes']['sticky-header']) && $GLOBALS['goodresto_enovathemes']['sticky-header'] == 1) ? "true" : "false";

                    if ($sticky_header == "true" && $header_nav == 'true') {



                        $header_height         = (isset($GLOBALS['goodresto_enovathemes']['header-height']) && !empty($GLOBALS['goodresto_enovathemes']['header-height'])) ? $GLOBALS['goodresto_enovathemes']['header-height'] : "90";
                        $sticky_height         = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-height']) && $GLOBALS['goodresto_enovathemes']['sticky-header-height']) ? $GLOBALS['goodresto_enovathemes']['sticky-header-height'] : "90";
                        $sticky_header         = (isset($GLOBALS['goodresto_enovathemes']['sticky-header']) && $GLOBALS['goodresto_enovathemes']['sticky-header'] == 1) ? "true" : "false";
                        $menu_under_logo       = (isset($GLOBALS['goodresto_enovathemes']['menu-under-logo']) && $GLOBALS['goodresto_enovathemes']['menu-under-logo'] == 1) ? "true" : "false";
                        $menu_under_logo_height = (isset($GLOBALS['goodresto_enovathemes']['menu-height']) && !empty($GLOBALS['goodresto_enovathemes']['menu-height'])) ? $GLOBALS['goodresto_enovathemes']['menu-height'] : "64";
                        
                        $offset = $sticky_height;
                        $from   = $header_height;

                        if ($menu_under_logo == "true") {
                           $offset = $menu_under_logo_height;
                           $from   = $menu_under_logo_height; 
                        }
                    }

                    if ($fullscreen_navigation == 'true') {
                        $fullscreen_height        = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-height']) && $GLOBALS['goodresto_enovathemes']['fullscreen-height']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-height'] : "90";
                        $fullscreen_sticky_height = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-height']) && $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-height']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-height'] : $fullscreen_height;
                        $offset                   = $fullscreen_sticky_height;
                        $from                     = $fullscreen_height;
                    }

                    if (is_array($one_page_filter)) {
                        foreach ($one_page_filter as $filter) {
                            array_push($et_filter_array, '#'.$filter.' > a');
                        }
                    }

                    wp_enqueue_script( 'single-page-nav', GOODRESTO_ENOVATHEMES_TEMPPATH.'/js/single-page-nav.js', array('jquery'), '', true);
                    wp_localize_script( 
                        'single-page-nav', 
                        'single_page_nav_opt', 
                        array(
                            'offset'      => $offset,
                            'from'        => $from,
                        )
                    );
                    wp_enqueue_script( 'one-page', GOODRESTO_ENOVATHEMES_TEMPPATH.'/js/one-page.js', array('jquery'), '', true);
                    wp_localize_script( 
                        'one-page', 
                        'one_page_opt', 
                        array(
                            'navType'     => $one_page_nav, 
                            'speed'       => $one_page_speed,
                            'hash'        => $one_page_hash,
                            'filterArray' => (!empty($et_filter_array)) ? implode(', ', $et_filter_array) : ''
                        )
                    );

                }
            }

            // Deque yithfontaweseom
            wp_dequeue_style( 'yith-wcwl-font-awesome' );
            wp_deregister_style( 'yith-wcwl-font-awesome' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_deregister_style( 'woocommerce_prettyPhoto_css' );
            
        }

    }
    add_action( 'wp_enqueue_scripts', 'goodresto_enovathemes_script');

    function goodresto_admin_scripts_styles() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker-alpha', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/wp-color-picker-alpha.min.js', array('wp-color-picker'), '', true);
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_style( 'adminstyle', GOODRESTO_ENOVATHEMES_TEMPPATH . '/css/admin.css', false, '');
        wp_enqueue_script( 'adminscript', GOODRESTO_ENOVATHEMES_TEMPPATH . '/js/admin.js', array('jquery'), '', true);
        wp_enqueue_media();
        return;
    }
    add_action('admin_enqueue_scripts','goodresto_admin_scripts_styles');

    function goodresto_enovathemes_editor_styles() {
        wp_enqueue_style('goodresto-default-fonts', '//fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700|Raleway:300,400,500,600,700,800,900|Playfair+Display:400,400i,700,700i,900,900i' );
        wp_enqueue_style( 'goodresto-editor-style', GOODRESTO_ENOVATHEMES_TEMPPATH . '/css/editor-style.css' );

    }
    add_action( 'enqueue_block_editor_assets', 'goodresto_enovathemes_editor_styles' );
?>