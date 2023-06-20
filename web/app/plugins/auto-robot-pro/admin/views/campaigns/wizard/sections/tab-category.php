<?php
$post_types = get_post_types(array('public' => true));
// Select categories arguments
$args = array (
	'orderby' => 'name',
	'order' => 'ASC',
	'hide_empty' => 0
);

$parent_categories = array ();
$child_categories = array ();

// Get all post categories
foreach ( $post_types as $post_type ) {

	// Get categories taxonomies
	$post_taxonomies = get_object_taxonomies ( $post_type );


	if (count ( $post_taxonomies ) > 0) {
		foreach ( $post_taxonomies as $tax ) {

			// check if category list it's items
			if (is_taxonomy_hierarchical ( $tax )) {

				$args = array (
					'hide_empty' => 0,
					'taxonomy' => $tax,
					'type' => $post_type
				);

				$categories = get_categories ( $args );

				// function to display categories

				// Get parent categories
				foreach ( $categories as $category ) {

					if ($category->parent == 0) {
                        $parent_categories [] = $category;
					} else {
                        $child_categories [$category->parent] [] = $category;
					}
				}

			}
		}
	}
}
// Get all post tags
$tags = get_tags(array('get'=>'all'));

// Initial post category
$robot_post_category = isset($settings['robot-post-category']) ? $settings['robot-post-category'] : array();
$robot_post_tag = isset($settings['robot-post-tag']) ? $settings['robot-post-tag'] : array();
?>
<div id="category" class="robot-box-tab" data-nav="category" >

	<div class="robot-box-header">
		<h2 class="robot-box-title"><?php esc_html_e( 'Categories & Tags', Auto_Robot::DOMAIN ); ?></h2>
	</div>

    <div class="robot-box-body">
        <div class="robot-box-settings-row">
            <div class="robot-box-settings-col-1">
                <span class="robot-settings-label"><?php esc_html_e( 'Categories', Auto_Robot::DOMAIN ); ?></span>
                <span class="robot-description"><?php esc_html_e( 'Select post categories.', Auto_Robot::DOMAIN ); ?></span>
            </div>
            <div class="robot-box-settings-col-2">

                <label class="robot-settings-label"><?php esc_html_e( 'Categories', Auto_Robot::DOMAIN ); ?></label>

                <span class="robot-description"><?php esc_html_e( 'Select your campaign post categories.', Auto_Robot::DOMAIN ); ?></span>

                <select class="robot-category-multi-select" multiple="true">
                    <?php
                    foreach ( $parent_categories as $parent_category ) {
                        auto_robot_display_category( $parent_category, $child_categories, $robot_post_category);
                    }
                    ?>
                </select>


            </div>
        </div>

        <div class="robot-box-settings-row">
            <div class="robot-box-settings-col-1">
                <span class="robot-settings-label"><?php esc_html_e( 'Tags', Auto_Robot::DOMAIN ); ?></span>
                <span class="robot-description"><?php esc_html_e( 'Select post tags.', Auto_Robot::DOMAIN ); ?></span>
            </div>
            <div class="robot-box-settings-col-2">

                <label class="robot-settings-label"><?php esc_html_e( 'Tags', Auto_Robot::DOMAIN ); ?></label>

                <span class="robot-description"><?php esc_html_e( 'Select your post tags.', Auto_Robot::DOMAIN ); ?></span>

                <select class="robot-tag-multi-select" multiple="true">
                    <?php
                    foreach ( $tags as $tag ) {
                        auto_robot_display_tag($tag, $robot_post_tag);
                    }
                    ?>
                </select>


            </div>
        </div>
            
   </div>

</div>
