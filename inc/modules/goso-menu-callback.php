<?php

/**
 * Class goso_nav_menu_edit_walker
 * Callback of goso_nav_menu_edit_walker function in goso-walker.php
 * Use to filter to wp_edit_nav_menu_walker
 *
 * @since 1.0
 */
class goso_nav_menu_edit_walker extends Walker_Nav_Menu_Edit {
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$menu_return  = '';
		$menu_control = '';
		$style        = "font-family: 'Open Sans', sans-serif;";

		// Menu setting
		$goso_cat_mega_menu    = get_post_meta( $item->ID, 'goso_cat_mega_menu', true );
		$goso_number_mega_menu = get_post_meta( $item->ID, 'goso_number_mega_menu', true );
		$goso_menu_pos         = get_post_meta( $item->ID, 'goso_menu_pos', true );
		$goso_menu_type        = get_post_meta( $item->ID, 'goso_menu_type', true );
		$goso_menu_load        = get_post_meta( $item->ID, 'goso_menu_load', true );
		$goso_menu_bgimg       = get_post_meta( $item->ID, 'goso_menu_bgimg', true );
		$goso_menu_block       = get_post_meta( $item->ID, 'goso_menu_block', true );
		$goso_menu_mw          = get_post_meta( $item->ID, 'goso_menu_mw', true );
		$goso_menu_mh          = get_post_meta( $item->ID, 'goso_menu_mh', true );
		$goso_menu_bgcl        = get_post_meta( $item->ID, 'goso_menu_bgcl', true );
		$goso_menu_lbtxt       = get_post_meta( $item->ID, 'goso_menu_lbtxt', true );
		$goso_menu_lbs         = get_post_meta( $item->ID, 'goso_menu_lbs', true );
		$goso_menu_lbbg        = get_post_meta( $item->ID, 'goso_menu_lbbg', true );
		$goso_menu_lbcl        = get_post_meta( $item->ID, 'goso_menu_lbcl', true );
		// Add option choose mega menu
		$td_category_tree = array_merge( array(
			'- Not Mega Menu -' => '',
		), goso_list_categories() );

		$goso_block_list = goso_builder_block_list();

		$menu_control .= '<p class="description description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Mega Menu Type</label>';
		$menu_control .= '<select style="' . $style . '" name="goso_menu_type[' . $item->ID . ']" id="" class="widefat code edit-menu-item-mgstyle">';
		$menu_control .= '<option value=""' . selected( $goso_menu_type, '', false ) . '>Default</option>';
		$menu_control .= '<option value="mega-menu"' . selected( $goso_menu_type, 'mega-menu', false ) . '>Mega Menu Builder</option>';
		$menu_control .= ' </select>';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings mega-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Select Goso Block</label>';
		$menu_control .= '<select style="' . $style . '" name="goso_menu_block[' . $item->ID . ']" id="" class="pcblock-select widefat code edit-menu-item-url">';
		unset( $goso_block_list[''] );
		$menu_control .= '<option data-id="" value="">' . __( 'None', 'authow' ) . '</option>';
		foreach ( $goso_block_list as $block_slug => $block_name ) {
			$block_id     = get_page_by_path( $block_slug, OBJECT, 'goso-block' );
			$block_id     = isset( $block_id->ID ) && $block_id->ID ? $block_id->ID : '';
			$menu_control .= '<option data-id="' . $block_id . '" value="' . $block_slug . '"' . selected( $block_slug, $goso_menu_block, false ) . '>' . $block_name . ' (ID: ' . $block_id . ')</option>';
		}
		$menu_control .= ' </select>';

		$goso_menu_block_id = 'blockid';
		if ( $goso_menu_block ) {
			$goso_menu_block_id = get_page_by_path( $goso_menu_block, OBJECT, 'goso-block' );
			$goso_menu_block_id = isset( $goso_menu_block_id->ID ) && $goso_menu_block_id->ID ? $goso_menu_block_id->ID : '';
		}
		$menu_control .= '<span class="description pcajax-change"><a target="_blank" class="gosoblock-edit-link" data-url="' . esc_url( admin_url( 'post.php?action=edit&post=' ) ) . '" href="' . esc_url( admin_url( 'post.php?action=edit&post=' . $goso_menu_block_id . '' ) ) . '">Edit This Block</a> | <a target="_blank" href="' . esc_url( admin_url( 'edit.php?post_type=goso-block' ) ) . '">' . __( 'Add New Block', 'authow' ) . '</a></span>';
		$menu_control .= '<span class="description pcajax-none">' . __( 'You can add new a Goso Block on <a target="_blank" href="' . esc_url( admin_url( 'edit.php?post_type=goso-block' ) ) . '">this page</a>', 'authow' ) . '</span>';


		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings mega-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Mega Menu Position</label>';
		$menu_control .= '<select style="' . $style . '" name="goso_menu_pos[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '<option value="flexible"' . selected( $goso_menu_pos, 'flexible', false ) . '>Flexible</option>';
		$menu_control .= '<option value="center"' . selected( $goso_menu_pos, 'center', false ) . '>Center</option>';
		$menu_control .= ' </select>';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings mega-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Maxium Width: (Eg: 100% or 100px)</label>';
		$menu_control .= '<input value="' . $goso_menu_mw . '" type="text" style="' . $style . '" name="goso_menu_mw[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings mega-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Min Height: (Eg: 100% or 300px)</label>';
		$menu_control .= '<input value="' . $goso_menu_mh . '" type="text" style="' . $style . '" name="goso_menu_mh[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings mega-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Load Goso Block Dropdown with AJAX?</label>';
		$menu_control .= '<select style="' . $style . '" name="goso_menu_load[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '<option value="yes"' . selected( $goso_menu_load, 'yes', false ) . '>Yes</option>';
		$menu_control .= '<option value="no"' . selected( $goso_menu_load, 'no', false ) . '>No</option>';
		$menu_control .= ' </select>';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings mega-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label style="display:block">Mega Menu Background Color</label>';
		$menu_control .= '<input value="' . $goso_menu_bgcl . '" type="text" style="' . $style . '" name="goso_menu_bgcl[' . $item->ID . ']" id="goso_menu_bgcl_' . $item->ID . '" class="widefat code color-picker edit-menu-item-url">';
		$menu_control .= '</p>';

		$img_wrap_class = $data_img = '';
		$img_label      = esc_attr__( 'Upload Background Image', 'authow' );
		if ( $goso_menu_bgimg ) {
			$data_img       = wp_get_attachment_image_src( $goso_menu_bgimg, 'thumbnail' );
			$data_img       = $data_img[0] ?? '';
			$img_wrap_class = ' active';
			$img_label      = esc_attr__( 'Change Background Image', 'authow' );
		}

		$menu_control .= '<p data-imgid="' . esc_attr( $item->ID ) . '" class="description goso-mn-settings mega-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label style="display:block">Mega Menu Background Image</label>';
		$menu_control .= '<span class="menu-mn-g">';
		$menu_control .= '<span class="goso_menu_bgimg_btn">' . $img_label . '</span>';
		$menu_control .= '<span class="goso_menu_bgimg_delete_btn' . $img_wrap_class . '">Delete</span>';
		$menu_control .= '</span>';
		$menu_control .= '<input type="hidden" class="custom_media_id widefat code edit-menu-item-url" id="goso_menu_bgimg[' . $item->ID . ']" name="goso_menu_bgimg[' . $item->ID . ']" value="' . $goso_menu_bgimg . '" />';
		$menu_control .= '<span class="pc-mn-image-wrapper' . $img_wrap_class . '"><img style="max-width:70px;height:auto;" class="custom_media_image" src="' . esc_url( $data_img ) . '" alt="" /></span>';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings cat-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>';
		$menu_control .= 'Make it is a category mega menu (make sure category you selected has posts & menu item you selected need is top level and this menu item no have child menu items)';
		$menu_control .= '</label>';

		$menu_control .= '<select style="' . $style . '" name="goso_cat_mega_menu[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		foreach ( $td_category_tree as $category => $category_id ) {
			$menu_control .= '<option value="' . $category_id . '"' . selected( $goso_cat_mega_menu, $category_id, false ) . '>' . $category . '</option>';
		}
		$menu_control .= ' </select>';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description goso-mn-settings cat-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>';
		$menu_control .= 'Select rows when display posts in this category mega menu';
		$menu_control .= '</label>';

		$menu_control .= '<select style="' . $style . '" name="goso_number_mega_menu[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '<option value="1"' . selected( $goso_number_mega_menu, '1', false ) . '>1 row</option>';
		$menu_control .= '<option value="2"' . selected( $goso_number_mega_menu, '2', false ) . '>2 rows</option>';
		$menu_control .= '<option value="3"' . selected( $goso_number_mega_menu, '3', false ) . '>3 rows</option>';
		$menu_control .= ' </select>';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description all-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Label Text</label>';
		$menu_control .= '<input value="' . $goso_menu_lbtxt . '" type="text" style="' . $style . '" name="goso_menu_lbtxt[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description all-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label>Label Style</label>';
		$menu_control .= '<select style="' . $style . '" name="goso_menu_lbs[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '<option value="1"' . selected( $goso_menu_lbs, '1', false ) . '>Style 1</option>';
		$menu_control .= '<option value="2"' . selected( $goso_menu_lbs, '2', false ) . '>Style 2</option>';
		$menu_control .= '<option value="4"' . selected( $goso_menu_lbs, '4', false ) . '>Style 3</option>';
		$menu_control .= ' </select>';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description all-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label style="display:block">Label Text Color</label>';
		$menu_control .= '<input value="' . $goso_menu_lbcl . '" type="text" style="' . $style . '" name="goso_menu_lbcl[' . $item->ID . ']" id="goso_menu_lbcl_' . $item->ID . '" class="widefat code color-picker edit-menu-item-url">';
		$menu_control .= '</p>';

		$menu_control .= '<p class="description all-menu-select description-wide goso-authow-description goso-hide-child">';
		$menu_control .= '<label style="display:block">Label Background Color</label>';
		$menu_control .= '<input value="' . $goso_menu_lbbg . '" type="text" style="' . $style . '" name="goso_menu_lbbg[' . $item->ID . ']" id="goso_menu_lbbg_' . $item->ID . '" class="widefat code color-picker edit-menu-item-url">';
		$menu_control .= '</p>';

		parent::start_el( $menu_return, $item, $depth, $args, $id );

		$menu_return = preg_replace( '/(?=<div.*submitbox)/', $menu_control, $menu_return );

		$output .= $menu_return;
	}
}
