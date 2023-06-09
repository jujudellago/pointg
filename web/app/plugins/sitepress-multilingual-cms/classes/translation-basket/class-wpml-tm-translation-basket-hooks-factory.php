<?php

class WPML_TM_Translation_Basket_Hooks_Factory implements IWPML_Backend_Action_Loader {

	public function create() {
		global $sitepress;

		$hooks = array();
		if ( $sitepress->get_wp_api()->is_tm_page( 'basket' ) ) {
			$template_service_loader = new WPML_Twig_Template_Loader( array( WPML_TM_PATH . '/templates/translation-basket' ) );
			$template_service        = $template_service_loader->get_template();

			$dialog_view     = new WPML_TM_Translation_Basket_Dialog_View( $template_service, $sitepress->get_wp_api() );
			$hooks['dialog'] = new WPML_TM_Translation_Basket_Dialog_Hooks( $dialog_view, $sitepress->get_wp_api() );
		}

		return $hooks;
	}
}
