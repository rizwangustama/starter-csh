<?php

function cptui_register_my_cpts_staff() {

/**
 * Post Type: Staffs.
 */

$labels = [
  "name" => __( "Authors", "custom-post-type-ui" ),
  "singular_name" => __( "Author", "custom-post-type-ui" ),
  "menu_name" => __( "Author", "custom-post-type-ui" ),
  "all_items" => __( "All Authors", "custom-post-type-ui" ),
  "add_new" => __( "Add new", "custom-post-type-ui" ),
  "add_new_item" => __( "Add new Author", "custom-post-type-ui" ),
  "edit_item" => __( "Edit Author", "custom-post-type-ui" ),
  "new_item" => __( "New Author", "custom-post-type-ui" ),
  "view_item" => __( "View Author", "custom-post-type-ui" ),
  "view_items" => __( "View Authors", "custom-post-type-ui" ),
  "search_items" => __( "Search Authors", "custom-post-type-ui" ),
  "not_found" => __( "No Authors found", "custom-post-type-ui" ),
  "not_found_in_trash" => __( "No Authors found in trash", "custom-post-type-ui" ),
  "parent" => __( "Parent Author:", "custom-post-type-ui" ),
  "featured_image" => __( "Featured image for this Author", "custom-post-type-ui" ),
  "set_featured_image" => __( "Set featured image for this Author", "custom-post-type-ui" ),
  "remove_featured_image" => __( "Remove featured image for this Author", "custom-post-type-ui" ),
  "use_featured_image" => __( "Use as featured image for this Author", "custom-post-type-ui" ),
  "archives" => __( "Author archives", "custom-post-type-ui" ),
  "insert_into_item" => __( "Insert into Author", "custom-post-type-ui" ),
  "uploaded_to_this_item" => __( "Upload to this Author", "custom-post-type-ui" ),
  "filter_items_list" => __( "Filter Authors list", "custom-post-type-ui" ),
  "items_list_navigation" => __( "Authors list navigation", "custom-post-type-ui" ),
  "items_list" => __( "Authors list", "custom-post-type-ui" ),
  "attributes" => __( "Authors attributes", "custom-post-type-ui" ),
  "name_admin_bar" => __( "Author", "custom-post-type-ui" ),
  "item_published" => __( "Author published", "custom-post-type-ui" ),
  "item_published_privately" => __( "Author published privately.", "custom-post-type-ui" ),
  "item_reverted_to_draft" => __( "Author reverted to draft.", "custom-post-type-ui" ),
  "item_scheduled" => __( "Author scheduled", "custom-post-type-ui" ),
  "item_updated" => __( "Author updated.", "custom-post-type-ui" ),
  "parent_item_colon" => __( "Parent Author:", "custom-post-type-ui" ),
];

$args = [
  "label" => __( "Authors", "custom-post-type-ui" ),
  "labels" => $labels,
  "description" => "",
  "public" => true,
  "publicly_queryable" => true,
  "show_ui" => true,
  "show_in_rest" => true,
  "rest_base" => "",
  "rest_controller_class" => "WP_REST_Posts_Controller",
  "has_archive" => false,
  "show_in_menu" => true,
  "show_in_nav_menus" => true,
  "delete_with_user" => false,
  "exclude_from_search" => true,
  "capability_type" => "post",
  "map_meta_cap" => true,
  "hierarchical" => false,
  "rewrite" => [ "slug" => "staff-author", "with_front" => true ],
  "query_var" => true,
  "menu_icon" => "dashicons-groups",
  "supports" => [ "title", "editor", "thumbnail", "excerpt" ],
  "show_in_graphql" => true,
  "graphql_single_name" => "Staff",
  "graphql_plural_name" => "Staffs",
];

register_post_type( "staff", $args );
}

add_action( 'init', 'cptui_register_my_cpts_staff' );

// Add ACF to select staff and guest author on posts 

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_62d6ace42df37',
    'title' => 'Organization',
    'fields' => array(
      array(
        'key' => 'field_62d6ad27c1ee6',
        'label' => 'Organization Name',
        'name' => 'role',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'show_in_graphql' => 1,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'staff',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
    'show_in_graphql' => 1,
    'graphql_field_name' => 'staff_details',
    'map_graphql_types_from_location_rules' => 0,
    'graphql_types' => '',
  ));

  acf_add_local_field_group(array(
    'key' => 'group_62793c342784d',
    'title' => 'Staff',
    'fields' => array(
      array(
        'key' => 'field_62793f28c2bfe',
        'label' => 'Staff Author',
        'name' => 'staff',
        'type' => 'relationship',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'show_in_graphql' => 1,
        'post_type' => array(
          0 => 'staff',
        ),
        'taxonomy' => '',
        'filters' => '',
        'elements' => '',
        'min' => '',
        'max' => '',
        'return_format' => 'id',
      ),
      array(
        'key' => 'field_62794c72379e6',
        'label' => 'Guest Author',
        'name' => 'guest_author',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'show_in_graphql' => 1,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      )
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
    'show_in_graphql' => 0,
    'graphql_field_name' => 'staff',
    'map_graphql_types_from_location_rules' => 0,
    'graphql_types' => '',
  ));
  
  endif;		