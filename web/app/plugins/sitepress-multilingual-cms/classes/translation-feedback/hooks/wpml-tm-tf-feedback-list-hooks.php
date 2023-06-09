<?php

/**
 * Class WPML_TM_TF_Feedback_List_Hooks
 *
 * @author OnTheGoSystems
 */
class WPML_TM_TF_Feedback_List_Hooks implements IWPML_Action {

	public function add_hooks() {
		/**
		 * Set high priority to let other users to override this value later to fulfill the requirements of
		 * https://onthegosystems.myjetbrains.com/youtrack/issue/wpmldev-1161/Create-a-Hook-Api-to-disable-ATE-Editor-per-post
		 */
		add_filter( 'wpml_use_tm_editor', [ $this, 'maybe_force_to_use_translation_editor' ], 1, 1 );
	}

	/**
	 * @param int|bool $use_translation_editor
	 *
	 * @return int|bool
	 */
	public function maybe_force_to_use_translation_editor( $use_translation_editor ) {
		if ( ! current_user_can( 'edit_others_posts' ) ) {
			$use_translation_editor = true;
		}

		return $use_translation_editor;
	}
}
