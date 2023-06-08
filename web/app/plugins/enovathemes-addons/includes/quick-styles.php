<?php

global $page_styles_n,$gallery_styles_n;

add_action( 'admin_menu', 'add_quick_styles_settings' );
function add_quick_styles_settings(){
	add_submenu_page(
		'themes.php',
		esc_html__( 'Quick Styles', 'enovathemes-addons'),
		esc_html__( 'Quick Styles', 'enovathemes-addons'),
		'administrator',
		'quick_styles_settings',
		'render_quick_styles_settings'
	);
}

function render_quick_styles_settings(){	
?>
	<div class="quick-styles-container wrap">
		<?php settings_errors(); ?>

		<?php

		$theme_tabs = array(
			'header_quick_styles'     	  => esc_html__('Header','enovathemes-addons'),
		);

		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'header_quick_styles';

        ?>

        <h2 class="nav-tab-wrapper">
			<?php foreach ($theme_tabs as $tab => $value): ?>
           		<a href="?post_type=qs&page=quick_styles_settings&tab=<?php echo $tab; ?>" class="nav-tab <?php echo $active_tab == $tab ? 'nav-tab-active' : ''; ?>"><?php echo $value; ?></a>
			<?php endforeach; ?>
        </h2>

		<form class="quick-styles-settings" method="post" action="options.php">
			<?php
				if( $active_tab == 'header_quick_styles' ) {
					echo '<div class="header_quick_styles quick_style_section">';
		            	settings_fields( 'header_quick_styles' );
						do_settings_sections( 'header_quick_styles' );
					echo '</div>';
		        }
				submit_button();
			?>
		</form>
	</div>
<?php }

add_action('admin_init', 'quick_styles_settings_sections');
function quick_styles_settings_sections() {

	$quick_styles_group = array(
		array(
			'section_slug' => 'header_quick_styles', 
			'section_title' => esc_html__('Header quick styles', 'enovathemes-addons'), 
			'section_fields' => array(
				array(
					'field-id'          => 'header_style',
					'field-title'       => '',
					'field-description' => esc_html__('Choose header quick styles here and edit header styles from Theme Settings >> "Header & Menu"', 'enovathemes-addons')
				),
			)
		),
		array(
			'section_slug' => 'page_title_quick_styles', 
			'section_title' => esc_html__('Page title section quick styles', 'enovathemes-addons'), 
			'section_fields' => array(
				array(
					'field-id'          => 'page_style',
					'field-title'       => esc_html__('Page title section quick styles:', 'enovathemes-addons'),
					'field-description' => esc_html__('Choose page title section quick styles here and edit page title section styles from Theme Settings >> "Page title section". Also you can adjust styling of each page individually from the page edit screen with page extended options found under the main editor. For Blog, Events, Gallery, Shop you can adjust page title sections from theme options panel >> Blog/Event/Gallery,Woocommerce >> Page title section', 'enovathemes-addons')
				),
			)
		)
	);

	foreach ($quick_styles_group as $option_group){

		add_settings_section( 
	        $option_group['section_slug'],
	        $option_group['section_title'],
	        $option_group['section_slug'].'_callback',
	        $option_group['section_slug']
	    );

	    register_setting(  
	        $option_group['section_slug'],  
	        $option_group['section_slug']  
	    );

	    foreach ($option_group['section_fields'] as $option_field) {

			add_settings_field(	
				$option_field['field-id'],
				$option_field['field-title'],
				$option_field['field-id'].'_callback',
				$option_group['section_slug'],
				$option_group['section_slug'],
				array($option_field['field-description'])
			);
		}
	}
}

function config_quick_styles_callback (){
	echo '<p>'.esc_html__('Check this option and save only once.', 'enovathemes-addons').'</p>';
}

function header_quick_styles_callback (){
	echo "";
}

/*	Header quick styles fields
-------------------------------*/

	function header_style_callback($args) {

		$settings = get_option('header_quick_styles');

		if(!isset($settings['header_style'])) {
			$settings['header_style'] = '1';
		}

		$output = "";

		$header_styles = array(

			'1'  => array('Static header logo left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header1.png'),
			'2'  => array('Static header logo right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header2.png'),
			'3'  => array('Static header logo center',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header3.png'),
			'4'  => array('Static header with top bar',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header4.png'),

			'5'  => array('Transparent header logo left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header5.png'),
			'6'  => array('Transparent header logo right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header6.png'),
			'7'  => array('Transparent header logo center',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header7.png'),
			'8'  => array('Transparent header no logo  menu left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header8.png'),
			'9'  => array('Transparent header no logo  menu right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header9.png'),
			'10' => array('Transparent header no logo  menu center',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header10.png'),
			'11' => array('Transparent header with top bar',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header11.png'),

			'12'  => array('Menu under logo and logo left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header12.png'),
			'13'  => array('Menu under logo and logo right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header13.png'),
			'14'  => array('Menu under logo and logo center',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header14.png'),
			'15'  => array('Menu under logo with top bar',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header15.png'),
			'16'  => array('Boxed Menu under logo',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header16.png'),

			'17'  => array('Header under slider logo left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header17.png'),
			'18'  => array('Header under slider logo right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header18.png'),
			'19'  => array('Header under slider logo center',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header19.png'),
			'20'  => array('Header under slider no logo',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header20.png'),

			'21' => array('Fullscreen menu logo left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header21.png'),
			'22' => array('Fullscreen menu logo right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header22.png'),
			'23' => array('Fullscreen menu logo center',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header23.png'),
			'24' => array('Fullscreen menu no logo',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header24.png'),

			'25' => array('Sidebar menu from left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header25.png'),
			'26' => array('Sidebar menu from right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header26.png'),
			'27' => array('Sidebar menu dark',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header27.png'),
			'28' => array('Sidebar menu colorful',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header28.png'),

			'29'  => array('Boxed header logo left',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header29.png'),
			'30'  => array('Boxed header logo right',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header30.png'),
			'31'  => array('Boxed header logo center',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header31.png'),
			'32'  => array('Boxed header top bar',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header32.png'),
			'33'  => array('Boxed header menu under logo',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header33.png'),
			'34'  => array('Dark Static header',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header34.png'),
			'35'  => array('Colorful Static header',ENOVATHEMES_ADDONS_IMG.'quick_styles/header/header35.png'),
		);

		$output .= '<div class="quick-styles-option-group" id="header_style">';
			foreach ($header_styles as $style_n => $style_value) {
				$output .= '<div id="header_style_'.$style_n.'" class="quick-styles-option" >';
					$output .= '<label>';
						$output .= '<div class="img-wrapper">';
							$output .= '<img src="'.$style_value[1].'">';
						$output .= '</div>';
						$output .= '<div class="quick-styles-option-body">';
							$output .= '<input type="radio" value="'.$style_n.'" '.checked( $settings['header_style'], $style_n, false) . ' id="header_quick_styles[header_style]" name="header_quick_styles[header_style]" >';
							$output .= '<h3 class="quick-style-option-title">'.$style_value[0].'</h3>';
						$output .= '</div>';
					$output .= '</label>';
				$output .= '</div>';
			}
		$output .= '</div>';
		$output .= '<p class="post-notice">'.$args[0].'</p>';
		echo $output;
	     
	}

/*	Header quick styles on save hook
-------------------------------*/

	function enovathemes_addons_header_quick_styles_pre_update( $new_value, $old_value ) {
		
		if ( ! class_exists( 'Redux' ) ) {
		    return;
		}

		global $goodresto_enovathemes;

		switch ($new_value['header_style']) {

			// Static header logo left

				case '1':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Static header logo right

				case '2':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','right');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','left');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Static header logo center

				case '3':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','center');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',0);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Static header with top bar

				case '4':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',1);

						Redux::set_option('goodresto_enovathemes','header-top-height','48');
						Redux::set_option('goodresto_enovathemes','header-top-back-color',array(
							'color'=>'#212121',
							'alpha'=>1
						));
						Redux::set_option('goodresto_enovathemes','header-top-border-color',array(
							'color'=>'#212121',
							'alpha'=>0
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));

						Redux::set_option('goodresto_enovathemes','header-top-submenu-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));
						Redux::set_option('goodresto_enovathemes','header-top-submenu-back',array(
							'regular'  => '#212121',
					        'hover'    => '#d3a471',
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-typo',array(
							'font-weight' 	 => '400', 
					        'font-family' 	 => 'Cabin Condensed', 
					        'font-size'   	 => '16px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'none'
						));
						Redux::set_option('goodresto_enovathemes', 'header-top-social-links',1);
						Redux::set_option('goodresto_enovathemes','header-top-social-links-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));

						Redux::set_option('goodresto_enovathemes','header-top-button-url','//enovathemes.com/goodresto');
						Redux::set_option('goodresto_enovathemes','header-top-button-text','Purchase now');

						Redux::set_option('goodresto_enovathemes','header-top-button-text-color',array(
							'regular'=>'#212121',
							'hover'=>'#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-top-button-back-color',array(
							'regular' => '#ffffff',
							'hover'   => '#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','header-top-slogan','<div style="font-family: Cabin Condensed;letter-spacing: 1px;color:#ffffff">Tel: 423.266.1121<span class="et-gap-inline et-clearfix " style="width:16px">&nbsp;</span>Email: sales@goodresto.com</div>');

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Transparent header logo left

				case '5':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',1);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','40');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','underline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Transparent header logo right

				case '6':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',1);
						Redux::set_option('goodresto_enovathemes','logo-position','right');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','40');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','underline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Transparent header logo center

				case '7':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',1);
						Redux::set_option('goodresto_enovathemes','logo-position','center');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',0);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','40');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','underline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Transparent header no logo menu left

				case '8':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',1);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','40');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','underline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Transparent header no logo menu right

				case '9':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',1);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-position','right');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','40');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','underline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Transparent header no logo menu center

				case '10':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',1);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-position','center');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','40');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','underline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Transparent header with top bar

				case '11':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',1);

						Redux::set_option('goodresto_enovathemes','header-top-height','48');
						Redux::set_option('goodresto_enovathemes','header-top-back-color',array(
							'color'=>'#ffffff',
							'alpha'=>1
						));
						Redux::set_option('goodresto_enovathemes','header-top-border-color',array(
							'color'=>'#ffffff',
							'alpha'=>0
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-color',array(
							'regular'  => '#757575',
					        'hover'    => '#d3a471',
						));

						Redux::set_option('goodresto_enovathemes','header-top-submenu-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));
						Redux::set_option('goodresto_enovathemes','header-top-submenu-back',array(
							'regular'  => '#212121',
					        'hover'    => '#d3a471',
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-typo',array(
							'font-weight' 	 => '400', 
					        'font-family' 	 => 'Cabin Condensed', 
					        'font-size'   	 => '16px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'none'
						));
						Redux::set_option('goodresto_enovathemes', 'header-top-social-links',1);
						Redux::set_option('goodresto_enovathemes','header-top-social-links-color',array(
							'regular'  => '#757575',
					        'hover'    => '#d3a471',
						));

						Redux::set_option('goodresto_enovathemes','header-top-button-url','//enovathemes.com/goodresto');
						Redux::set_option('goodresto_enovathemes','header-top-button-text','Purchase now');

						Redux::set_option('goodresto_enovathemes','header-top-button-text-color',array(
							'regular'=>'#ffffff',
							'hover'=>'#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-top-button-back-color',array(
							'regular' => '#212121',
							'hover'   => '#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','header-top-slogan','<div style="font-family: Cabin Condensed;letter-spacing: 1px;color:#757575">Tel: 423.266.1121<span class="et-gap-inline et-clearfix " style="width:16px">&nbsp;</span>Email: sales@goodresto.com</div>');

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',1);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','40');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','underline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Menu under logo and logo left

				case '12':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',1);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','1');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','48');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','0');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','0');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','fill');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Menu under logo and logo right

				case '13':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','right');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',1);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','1');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','48');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','0');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','0');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','fill');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Menu under logo and logo center

				case '14':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','center');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#212121');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#6c1812',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','1');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','48');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','56');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','56');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#212121',
						        'hover'    => '#6c1812',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','dottes');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#6c1812',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',1);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#757575',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','fill');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#6c1812',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#6c1812',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#6c1812',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#6c1812',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#212121'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#e0e0e0');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#757575',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#212121');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Menu under logo with top bar

				case '15':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',1);

						Redux::set_option('goodresto_enovathemes','header-top-height','48');
						Redux::set_option('goodresto_enovathemes','header-top-back-color',array(
							'color'=>'#f5f5f5',
							'alpha'=>1
						));
						Redux::set_option('goodresto_enovathemes','header-top-border-color',array(
							'color'=>'#f5f5f5',
							'alpha'=>0
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-color',array(
							'regular'  => '#757575',
					        'hover'    => '#d3a471',
						));

						Redux::set_option('goodresto_enovathemes','header-top-submenu-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));
						Redux::set_option('goodresto_enovathemes','header-top-submenu-back',array(
							'regular'  => '#212121',
					        'hover'    => '#d3a471',
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-typo',array(
							'font-weight' 	 => '400', 
					        'font-family' 	 => 'Cabin Condensed', 
					        'font-size'   	 => '16px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'none'
						));
						Redux::set_option('goodresto_enovathemes', 'header-top-social-links',1);
						Redux::set_option('goodresto_enovathemes','header-top-social-links-color',array(
							'regular'  => '#757575',
					        'hover'    => '#d3a471',
						));

						Redux::set_option('goodresto_enovathemes','header-top-button-url','//enovathemes.com/goodresto');
						Redux::set_option('goodresto_enovathemes','header-top-button-text','Purchase now');

						Redux::set_option('goodresto_enovathemes','header-top-button-text-color',array(
							'regular'=>'#ffffff',
							'hover'=>'#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-top-button-back-color',array(
							'regular' => '#212121',
							'hover'   => '#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','header-top-slogan','<div style="font-family: Cabin Condensed;letter-spacing: 1px;color:#757575">Tel: 423.266.1121<span class="et-gap-inline et-clearfix " style="width:16px">&nbsp;</span>Email: sales@goodresto.com</div>');

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',1);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','1');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','48');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#212121',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','16');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','outline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','outline');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#ffffff',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#212121',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#ffffff');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#757575',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '#212121',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Boxed Menu under logo

				case '16':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',1);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','center');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',1);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','1');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','48');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#212121',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#ffffff',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','16');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','box');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',1);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#757575',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','fill');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#ffffff');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#212121',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#d3a471',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#212121'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#e0e0e0');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#757575',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#212121');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','transparent');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Header under slider logo left

				case '17':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',1);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Header under slider logo right

				case '18':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','right');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',1);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','left');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Header under slider logo center

				case '19':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-dark.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina-dark.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','center');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',1);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',0);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Header under slider no logo

				case '20':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

						
					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-position','center');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',1);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',1);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Fullscreen menu logo left

				case '21':

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',0);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color', 'transparent');

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',0);

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-transparent',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-full-header',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-position','left');
						Redux::set_option('goodresto_enovathemes','fullscreen-height','100');
						Redux::set_option('goodresto_enovathemes','fullscreen-search',0);
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-size','small');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-language-switcher',0);

						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-color',array(
					        'regular'  => '#ffffff',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-width','');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-radius','');
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-color','#ffffff');

						Redux::set_option('goodresto_enovathemes','fullscreen-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-color',array(
					        'regular'  => '#212121',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '32px',
					        'text-transform' => 'uppercase',
					        'letter-spacing' => '2px'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-effect-color',array(
							'color' => '#212121',
							'alpha'   => '1', 
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-back','#ffffff');
						Redux::set_option('goodresto_enovathemes','fullscreen-opacity','9');

						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-height','72');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);

				break;

			// Fullscreen menu logo right

				case '22':

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',0);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color', 'transparent');

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',0);

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-transparent',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-full-header',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-position','right');
						Redux::set_option('goodresto_enovathemes','fullscreen-height','100');
						Redux::set_option('goodresto_enovathemes','fullscreen-search',0);
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-size','small');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-language-switcher',0);

						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-color',array(
					        'regular'  => '#ffffff',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-width','');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-radius','');
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-color','#ffffff');

						Redux::set_option('goodresto_enovathemes','fullscreen-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-color',array(
					        'regular'  => '#212121',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '32px',
					        'text-transform' => 'uppercase',
					        'letter-spacing' => '2px'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-effect-color',array(
							'color' => '#212121',
							'alpha'   => '1', 
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-back','#ffffff');
						Redux::set_option('goodresto_enovathemes','fullscreen-opacity','9');

						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-height','72');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);

				break;

			// Fullscreen menu logo center

				case '23':

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-retina.png',
							'width' => '400',
							'height'=> '400'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color', 'transparent');

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',0);

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-transparent',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-full-header',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-position','center');
						Redux::set_option('goodresto_enovathemes','fullscreen-height','100');
						Redux::set_option('goodresto_enovathemes','fullscreen-search',0);
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-size','small');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-language-switcher',0);

						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-color',array(
					        'regular'  => '#ffffff',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-width','');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-radius','');
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-color','#ffffff');

						Redux::set_option('goodresto_enovathemes','fullscreen-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-color',array(
					        'regular'  => '#212121',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '32px',
					        'text-transform' => 'uppercase',
					        'letter-spacing' => '2px'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-effect-color',array(
							'color' => '#212121',
							'alpha'   => '1', 
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-back','#ffffff');
						Redux::set_option('goodresto_enovathemes','fullscreen-opacity','9');

						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-height','72');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);

				break;

			// Fullscreen menu no logo

				case '24':

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => '',
							'width' => '',
							'height'=> ''
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color', 'transparent');

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',0);

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-transparent',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-full-header',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-position','left');
						Redux::set_option('goodresto_enovathemes','fullscreen-height','100');
						Redux::set_option('goodresto_enovathemes','fullscreen-search',0);
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-size','large');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links',1);
						Redux::set_option('goodresto_enovathemes','fullscreen-language-switcher',0);

						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-color',array(
					        'regular'  => '#ffffff',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-width','');
						Redux::set_option('goodresto_enovathemes','fullscreen-social-links-border-radius','');
						Redux::set_option('goodresto_enovathemes','fullscreen-header-icons-color','#ffffff');

						Redux::set_option('goodresto_enovathemes','fullscreen-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-color',array(
					        'regular'  => '#212121',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '32px',
					        'text-transform' => 'uppercase',
					        'letter-spacing' => '2px'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-menu-effect-color',array(
							'color' => '#212121',
							'alpha'   => '1', 
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','fullscreen-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','fullscreen-back','#ffffff');
						Redux::set_option('goodresto_enovathemes','fullscreen-opacity','9');

						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-height','72');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-border-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-social-links-back-color',array(
					        'regular'  => '',
					        'hover'    => '',
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','fullscreen-sticky-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
					    ));

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);

				break;

			// Sidebar menu from left

				case '25':

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',1);

						Redux::set_option('goodresto_enovathemes','sidebar-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','sidebar-logo-margin',array(
					        'margin-top'     => '0', 
					        'margin-bottom'  => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-position','left');
						Redux::set_option('goodresto_enovathemes','sidebar-alignment','center');
						Redux::set_option('goodresto_enovathemes','sidebar-back','#ffffff');
						Redux::set_option('goodresto_enovathemes','sidebar-back-img',array(
							'background-image' => '',
							'background-repeat' => 'no-repeat',
							'background-size' => 'inherit',
							'background-attachment' => 'inherit',
							'background-position' => 'left top',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-vertical',1);
						Redux::set_option('goodresto_enovathemes','sidebar-menu-margin',array(
							'margin-top'     => '0', 
					        'margin-bottom'  => '0px'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-color',array(
					        'regular'  => '#757575',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed',
					        'font-size'      => '18px',
					        'letter-spacing' => '1px',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-border-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-copyright','<div style="text-align:center"><div id="et-social-links-sidebar" class="et-social-links social-links et-clearfix  styling-original-false"><a class="et-icon-tripadvisor" href="https://tripadvisor.com" target="_self"></a><a class="et-icon-facebook" href="https://facebook.com" target="_self"></a><a class="et-icon-instagram" href="https://instagram.com" target="_self"></a><a class="et-icon-twitter" href="https://twitter.com" target="_self"></a></div><span class="et-gap et-clearfix " style="height:8px">&nbsp;</span><p class="text767-align-center" style="color: #757575">Created with love by <span class="et-highlight " style="color:#757575;border-bottom-color:#757575">EnovaThemes</span></p></div>');
						Redux::set_option('goodresto_enovathemes','sidebar-submenu-effect','ghost');

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Sidebar menu from right

				case '26':

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',1);

						Redux::set_option('goodresto_enovathemes','sidebar-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-dark-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','sidebar-logo-margin',array(
					        'margin-top'     => '0', 
					        'margin-bottom'  => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-position','right');
						Redux::set_option('goodresto_enovathemes','sidebar-alignment','center');
						Redux::set_option('goodresto_enovathemes','sidebar-back','#ffffff');
						Redux::set_option('goodresto_enovathemes','sidebar-back-img',array(
							'background-image' => '',
							'background-repeat' => 'no-repeat',
							'background-size' => 'inherit',
							'background-attachment' => 'inherit',
							'background-position' => 'left top',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-vertical',1);
						Redux::set_option('goodresto_enovathemes','sidebar-menu-margin',array(
							'margin-top'     => '0', 
					        'margin-bottom'  => '0px'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-color',array(
					        'regular'  => '#757575',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed',
					        'font-size'      => '18px',
					        'letter-spacing' => '1px',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-border-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-copyright','<div style="text-align:center"><div id="et-social-links-sidebar" class="et-social-links social-links et-clearfix  styling-original-false"><a class="et-icon-tripadvisor" href="https://tripadvisor.com" target="_self"></a><a class="et-icon-facebook" href="https://facebook.com" target="_self"></a><a class="et-icon-instagram" href="https://instagram.com" target="_self"></a><a class="et-icon-twitter" href="https://twitter.com" target="_self"></a></div><span class="et-gap et-clearfix " style="height:8px">&nbsp;</span><p class="text767-align-center" style="color: #757575">Created with love by <span class="et-highlight " style="color:#757575;border-bottom-color:#757575">EnovaThemes</span></p></div>');
						Redux::set_option('goodresto_enovathemes','sidebar-submenu-effect','ghost');

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Sidebar menu dark

				case '27':

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',1);

						Redux::set_option('goodresto_enovathemes','sidebar-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','sidebar-logo-margin',array(
					        'margin-top'     => '0', 
					        'margin-bottom'  => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-position','left');
						Redux::set_option('goodresto_enovathemes','sidebar-alignment','center');
						Redux::set_option('goodresto_enovathemes','sidebar-back','#212121');
						Redux::set_option('goodresto_enovathemes','sidebar-back-img',array(
							'background-image' => 'https://enovathemes.com/goodresto/wp-content/uploads/slider_pattern-1.png',
							'background-repeat' => 'repeat',
							'background-size' => 'inherit',
							'background-attachment' => 'inherit',
							'background-position' => 'left top',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-vertical',1);
						Redux::set_option('goodresto_enovathemes','sidebar-menu-margin',array(
							'margin-top'     => '0', 
					        'margin-bottom'  => '0px'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-color',array(
					        'regular'  => '#ffffff',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed',
					        'font-size'      => '18px',
					        'letter-spacing' => '1px',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-border-color',array(
					        'color'     => '#424242',
					        'alpha'     => 0
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-copyright','<div class="light" style="text-align:center"><div id="et-social-links-sidebar" class="et-social-links social-links et-clearfix  styling-original-false"><a class="et-icon-tripadvisor" href="https://tripadvisor.com" target="_self"></a><a class="et-icon-facebook" href="https://facebook.com" target="_self"></a><a class="et-icon-instagram" href="https://instagram.com" target="_self"></a><a class="et-icon-twitter" href="https://twitter.com" target="_self"></a></div><span class="et-gap et-clearfix " style="height:8px">&nbsp;</span><p class="text767-align-center" style="color: #ffffff">Created with love by <span class="et-highlight " style="color:#ffffff;border-bottom-color:#ffffff">EnovaThemes</span></p></div>');
						Redux::set_option('goodresto_enovathemes','sidebar-submenu-effect','ghost');

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Sidebar menu colorful

				case '28':

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',1);

						Redux::set_option('goodresto_enovathemes','sidebar-logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center.png',
							'width' => '200',
							'height'=> '200'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-center-retina.png',
							'width' => '400',
							'height'=> '400'
						));

						Redux::set_option('goodresto_enovathemes','sidebar-logo-margin',array(
					        'margin-top'     => '0', 
					        'margin-bottom'  => '0'
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-position','left');
						Redux::set_option('goodresto_enovathemes','sidebar-alignment','center');
						Redux::set_option('goodresto_enovathemes','sidebar-back','#6c1812');
						Redux::set_option('goodresto_enovathemes','sidebar-back-img',array(
							'background-image' => 'https://enovathemes.com/goodresto/wp-content/uploads/slider_pattern-1.png',
							'background-repeat' => 'repeat',
							'background-size' => 'inherit',
							'background-attachment' => 'inherit',
							'background-position' => 'left top',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-vertical',1);
						Redux::set_option('goodresto_enovathemes','sidebar-menu-margin',array(
							'margin-top'     => '0', 
					        'margin-bottom'  => '0px'
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-color',array(
					        'regular'  => '#ffffff',
					        'hover'    => '#d3a471',
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-typo',array(
							'font-weight'    => '400', 
					        'font-family'    => 'Cabin Condensed',
					        'font-size'      => '18px',
					        'letter-spacing' => '1px',
						));
						Redux::set_option('goodresto_enovathemes','sidebar-menu-border-color',array(
					        'color'     => '#424242',
					        'alpha'     => 0
					    ));
						Redux::set_option('goodresto_enovathemes','sidebar-copyright','<div class="light" style="text-align:center"><div id="et-social-links-sidebar" class="et-social-links social-links et-clearfix  styling-original-false"><a class="et-icon-tripadvisor" href="https://tripadvisor.com" target="_self"></a><a class="et-icon-facebook" href="https://facebook.com" target="_self"></a><a class="et-icon-instagram" href="https://instagram.com" target="_self"></a><a class="et-icon-twitter" href="https://twitter.com" target="_self"></a></div><span class="et-gap et-clearfix " style="height:8px">&nbsp;</span><p class="text767-align-center" style="color: #ffffff">Created with love by <span class="et-highlight " style="color:#ffffff;border-bottom-color:#ffffff">EnovaThemes</span></p></div>');
						Redux::set_option('goodresto_enovathemes','sidebar-submenu-effect','ghost');

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Boxed header logo left

				case '29':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',1);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','72');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#6c1812',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#6c1812',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#6c1812',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Boxed header logo right

				case '30':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',1);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','right');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','72');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#6c1812',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#6c1812',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#6c1812',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Boxed header logo center

				case '31':

					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',1);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','center');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','72');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',0);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

					/*	Sidebar
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar',0);
						Redux::set_option('goodresto_enovathemes','sidebar-padding',array(
					        'padding-top'     => '48px', 
					        'padding-bottom'  => '48px',
					        'padding-left'    => '32px',
					        'padding-right'   => '32px',
					        'units'           => 'px', 
					    ));

						Redux::set_option('goodresto_enovathemes','sidebar-width','320');
						Redux::set_option('goodresto_enovathemes','sidebar-align','right');
						Redux::set_option('goodresto_enovathemes','sidebar-background-color','#212121');

				break;

			// Boxed header top bar

				case '32':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',1);

						Redux::set_option('goodresto_enovathemes','header-top-height','48');
						Redux::set_option('goodresto_enovathemes','header-top-back-color',array(
							'color'=>'#212121',
							'alpha'=>1
						));
						Redux::set_option('goodresto_enovathemes','header-top-border-color',array(
							'color'=>'#212121',
							'alpha'=>0
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));

						Redux::set_option('goodresto_enovathemes','header-top-submenu-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));
						Redux::set_option('goodresto_enovathemes','header-top-submenu-back',array(
							'regular'  => '#212121',
					        'hover'    => '#d3a471',
						));
						Redux::set_option('goodresto_enovathemes','header-top-menu-typo',array(
							'font-weight' 	 => '400', 
					        'font-family' 	 => 'Cabin Condensed', 
					        'font-size'   	 => '16px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'none'
						));
						Redux::set_option('goodresto_enovathemes', 'header-top-social-links',1);
						Redux::set_option('goodresto_enovathemes','header-top-social-links-color',array(
							'regular'  => '#BDBDBD',
					        'hover'    => '#ffffff',
						));

						Redux::set_option('goodresto_enovathemes','header-top-button-url','//enovathemes.com/goodresto');
						Redux::set_option('goodresto_enovathemes','header-top-button-text','Purchase now');

						Redux::set_option('goodresto_enovathemes','header-top-button-text-color',array(
							'regular'=>'#212121',
							'hover'=>'#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-top-button-back-color',array(
							'regular' => '#ffffff',
							'hover'   => '#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','header-top-slogan','<div style="font-family: Cabin Condensed;letter-spacing: 1px;color:#ffffff">Tel: 423.266.1121<span class="et-gap-inline et-clearfix " style="width:16px">&nbsp;</span>Email: sales@goodresto.com</div>');

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',1);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','72');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#424242',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Boxed header menu under logo

				case '33':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-dark-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',1);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',1);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','72');
						Redux::set_option('goodresto_enovathemes','menu-height','48');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#b6b6b6');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '#d3a471',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#d3a471',
								'hover'   => '#212121'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#212121',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','56');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','56');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','none');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#ffffff',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#b6b6b6');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#b6b6b6',
						        'hover'    => '#212121',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#d3a471',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '#212121',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#d3a471',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#d3a471',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#b6b6b6');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#ffffff',
					        'hover'     => '#f5f5f5',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#212121',
							'hover'=>'#d3a471'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Dark Static header

				case '34':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#212121',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#212121',
								'hover'   => '#212121'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#212121',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#ffffff');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#212121');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#424242',
					        'hover'     => '#424242',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#ffffff',
							'hover'=>'#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

			// Colorful Static header

				case '35':
				
					/*	Header top
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-top',0);

					/*	Logo upload
					---------------------*/

						Redux::set_option('goodresto_enovathemes','logo-pos-hor','0');
						Redux::set_option('goodresto_enovathemes','logo-pos-ver','0');

						Redux::set_option('goodresto_enovathemes','logo',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk.png',
							'width' => '250',
							'height'=> '60'
						));
						Redux::set_option('goodresto_enovathemes','logo-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-desk-retina.png',
							'width' => '500',
							'height'=> '120'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-fixed-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile.png',
							'width' => '167',
							'height'=> '40'
						));
						Redux::set_option('goodresto_enovathemes','logo-mobile-retina',array(
							'url'   => 'https://enovathemes.com/goodresto/wp-content/uploads/logo-mobile-retina.png',
							'width' => '334',
							'height'=> '80'
						));

					/*	Standard header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','transparent-header',0);
						Redux::set_option('goodresto_enovathemes','boxed-header',0);
						Redux::set_option('goodresto_enovathemes','sticky-header',1);
						Redux::set_option('goodresto_enovathemes','full-header',0);
						Redux::set_option('goodresto_enovathemes','logo-position','left');
						Redux::set_option('goodresto_enovathemes','no-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-position','left');
						Redux::set_option('goodresto_enovathemes','menu-under-logo',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-boxed-radius',0);
						Redux::set_option('goodresto_enovathemes','menu-under-logo-icons',0);
						Redux::set_option('goodresto_enovathemes','header-under-slider',0);
						Redux::set_option('goodresto_enovathemes','border-box',0);

						Redux::set_option('goodresto_enovathemes','header-height','120');
						Redux::set_option('goodresto_enovathemes','menu-height','64');
						Redux::set_option('goodresto_enovathemes','header-back-color',array(
					        'color'     => '#6c1812',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','header-border-color',array(
					        'color'     => '',
					        'alpha'     => ''
						));
						Redux::set_option('goodresto_enovathemes','header-icons-color','#ffffff');

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Search
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-search',1);
							Redux::set_option('goodresto_enovathemes','header-search-back-default',array(
						        'color'     => '#ffffff',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-border-default',array(
						        'color'     => '#e0e0e0',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','header-search-text-default','#757575');
							Redux::set_option('goodresto_enovathemes','header-search-back','#d3a471');
							Redux::set_option('goodresto_enovathemes','header-search-color','#ffffff');
							Redux::set_option('goodresto_enovathemes','header-search-back-opacity','7');

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-social-links',0);
							Redux::set_option('goodresto_enovathemes','header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','header-social-links-border-width','0');
							Redux::set_option('goodresto_enovathemes','header-social-links-border-radius','0');

						/*	Header button
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-button-url','');
							Redux::set_option('goodresto_enovathemes','header-button-text','');
							Redux::set_option('goodresto_enovathemes','header-button-icon','');
							Redux::set_option('goodresto_enovathemes','header-button-text-color',array(
								'regular' => '#212121',
								'hover'   => '#212121'
							));
							Redux::set_option('goodresto_enovathemes','header-button-back-color',array(
								'regular' => '#ffffff',
								'hover'   => '#ffffff'
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','menu-back-color',array(
						        'color'     => '#ffffff',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-m','32');
							Redux::set_option('goodresto_enovathemes','header-menu-m-1600','32');
							Redux::set_option('goodresto_enovathemes','header-menu-separator',0);
							Redux::set_option('goodresto_enovathemes','header-menu-separator-height','16');
							Redux::set_option('goodresto_enovathemes','header-menu-separator-color',array(
						        'color'  => '#e0e0e0',
						        'alpha'  => '1',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-typo',array(
						        'font-weight'    => '700', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '14px',
								'letter-spacing' => '1px',
								'text-transform' => 'uppercase',
						    ));
							Redux::set_option('goodresto_enovathemes','header-menu-effect','overline');
							Redux::set_option('goodresto_enovathemes','header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

						/*	Header submenu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','header-submenu-shadow',0);
							Redux::set_option('goodresto_enovathemes','header-submenu-back-color','#212121');
							Redux::set_option('goodresto_enovathemes','header-submenu-color',array(
						        'regular'  => '#BDBDBD',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-typo',array(
						        'font-weight'    => '400', 
						        'font-family'    => 'Cabin Condensed', 
						        'font-size'      => '16px', 
						        'line-height'    => '24px'
						    ));
							Redux::set_option('goodresto_enovathemes','header-submenu-hover-effect','none');
							Redux::set_option('goodresto_enovathemes','header-submenu-effect-color',array(
								'color' => '#d3a471',
								'alpha' => '1'
							));
							Redux::set_option('goodresto_enovathemes','header-submenu-effect','ghost');

					/*	Sticky header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sticky-header-height','72');
						Redux::set_option('goodresto_enovathemes','sticky-header-back-color',array(
					        'color'     => '#6c1812',
					        'alpha'     => 1
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-border-color',array(
					        'color'     => '',
					        'alpha'     => 0
						));
						Redux::set_option('goodresto_enovathemes','sticky-header-icons-color','#ffffff');

						/*	Language switcher
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-color',array(
						        'color'     => '#f5f5f5',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-back-hov-color',array(
						        'color'     => '#d3a471',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-language-switcher-text-color',array(
						        'regular'  => '#616161',
						        'hover'    => '#ffffff',
						    ));

						/*	Social links
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-border-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-social-links-back-color',array(
						        'regular'  => '',
						        'hover'    => '',
						    ));

						/*	Shopping cart
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-text-color',array(
						        'color'     => '#212121',
						        'alpha'     => '1'
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-cart-bubble-back-color',array(
								'color' => '#ffffff',
								'alpha'   => '1' 
							));

						/*	Header menu
						---------------------*/

							Redux::set_option('goodresto_enovathemes','sticky-menu-back-color',array(
						        'color'     => '',
						        'alpha'     => 1
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-menu-border-color',array(
						        'color'     => '',
						        'alpha'     => 0
						    ));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-separator-color',array(
							    'color'  => '',
							    'alpha'  => '',
							));
						    Redux::set_option('goodresto_enovathemes','sticky-header-menu-color',array(
						        'regular'  => '#ffffff',
						        'hover'    => '#ffffff',
						    ));
							Redux::set_option('goodresto_enovathemes','sticky-header-menu-effect-color',array(
								'color' => '#ffffff',
								'alpha'   => '1', 
							));

					/*	Shopping cart
					---------------------*/

						Redux::set_option('goodresto_enovathemes','header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','mob-header-shop-cart',1);
						Redux::set_option('goodresto_enovathemes','header-shop-cart-back-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-text-color','#757575');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-title-color','#212121');
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-back',array(
							'regular' => '#212121',
							'hover'   => '#d3a471', 
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-color',array(
							'regular'  => '#ffffff',
							'hover'    => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','header-shop-cart-button-border-color',array(
							'regular'  => '',
							'hover'    => ''
						));

					/*	Megamenu
					---------------------*/

						Redux::set_option('goodresto_enovathemes','megamenu-top-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px', 
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
					        'color'          => '#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','megamenu-top-border','#424242');

						Redux::set_option('goodresto_enovathemes','megamenu_links',array(
							'regular' => '#bdbdbd',
					        'hover'   => '#ffffff',
						));

					/*	Mobile header
					---------------------*/

						Redux::set_option('goodresto_enovathemes','mob-header-height','80');
						Redux::set_option('goodresto_enovathemes','mob-header-search',1);
						Redux::set_option('goodresto_enovathemes','mob-header-sidebar',0);
						Redux::set_option('goodresto_enovathemes','mob-header-icons-color','#ffffff');
						Redux::set_option('goodresto_enovathemes','mob-header-logo-back-color','#6c1812');
						Redux::set_option('goodresto_enovathemes','mob-header-back-color',array(
					        'regular'   => '#6c1812',
					        'hover'     => '#6c1812',
					    ));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-color',array(
							'regular'=>'#ffffff',
							'hover'=>'#ffffff'
						));
						Redux::set_option('goodresto_enovathemes','mob-header-menu-typo',array(
							'font-weight'    => '700', 
					        'font-family'    => 'Cabin Condensed', 
					        'font-size'      => '14px',
					        'letter-spacing' => '1px',
					        'text-transform' => 'uppercase',
						));

					/*	Language switcher
					---------------------*/

						Redux::set_option('goodresto_enovathemes','language-switcher',0);
						Redux::set_option('goodresto_enovathemes','mob-language-switcher',0);
						Redux::set_option('goodresto_enovathemes','language-switcher-width','164px');
						Redux::set_option('goodresto_enovathemes','language-switcher-back-color',array(
					        'color'     => '#f5f5f5',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-back-hov-color',array(
					        'color'     => '#d3a471',
					        'alpha'     => 1
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-text-color',array(
					        'regular'  => '#616161',
					        'hover'    => '#ffffff',
					    ));
						Redux::set_option('goodresto_enovathemes','language-switcher-typo',array('font-size'=>''));

					/*	Sidebar navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','sidebar-navigation',0);

					/*	Fullscreen navigation
					---------------------*/

						Redux::set_option('goodresto_enovathemes','fullscreen-navigation',0);

				break;

		}

		return $new_value;
	}

	function enovathemes_addons_header_quick_styles_init() {
		add_filter( 'pre_update_option_header_quick_styles', 'enovathemes_addons_header_quick_styles_pre_update', 10, 2 );
	}

	add_action( 'init', 'enovathemes_addons_header_quick_styles_init' );
?>