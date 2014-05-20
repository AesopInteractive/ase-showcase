<?php

class aseShowcaseType{

	function __construct(){

		add_action('init', array($this,'do_type'));

	}

	function do_type() {

		$labels = array(
			'name'                => _x( 'Showcase', 'Post Type General Name', 'ase_showcase' ),
			'singular_name'       => _x( 'Showcase Item', 'Post Type Singular Name', 'ase_showcase' ),
			'menu_name'           => __( 'Showcase', 'ase_showcase' ),
			'parent_item_colon'   => __( 'Parent Showcase:', 'ase_showcase' ),
			'all_items'           => __( 'All Showcases', 'ase_showcase' ),
			'view_item'           => __( 'View Showcase', 'ase_showcase' ),
			'add_new_item'        => __( 'Add New Showcase', 'ase_showcase' ),
			'add_new'             => __( 'Add New', 'ase_showcase' ),
			'edit_item'           => __( 'Edit Showcase', 'ase_showcase' ),
			'update_item'         => __( 'Update Showcase', 'ase_showcase' ),
			'search_items'        => __( 'Search Showcase', 'ase_showcase' ),
			'not_found'           => __( 'Not found', 'ase_showcase' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'ase_showcase' ),
		);
		$args = array(
			'label'               => __( 'ase_showcase', 'ase_showcase' ),
			'description'         => __( 'Aesop Showcase', 'ase_showcase' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => '',
			'can_export'          => true,
			'has_archive'		=> 'showcase',
			'rewrite'			=> array('slug' => 'showcase'),
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'ase_showcase', $args );

	}

}
new aseShowcaseType;