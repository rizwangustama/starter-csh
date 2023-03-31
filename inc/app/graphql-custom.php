<?php 
function custom_post_init() {
    register_graphql_field('RootQueryToPostConnectionWhereArgs', 'staffId', [
        'type' => 'Integer',
        'description' => __('Filter Post by Staff ID', 'sage'),
    ]);

    add_action( 'graphql_register_types', function() {
        register_graphql_field( 'RootQueryToPostConnectionWhereArgs', 'filters', [
            'type' => 'String',
            'description' => __( 'Custom Post Type Filters', 'sage' ),
        ] );
    } );

    add_filter( 'graphql_post_object_connection_query_args', function( $query_args, $source, $args, $context, $info ) {
        if (
            isset($args['where']['staffId'])
        ) {
            $query_args["meta_query"] = [
                ['key' => 'staff', 'value' => '"'. $args['where']['staffId'].'"', "compare" => "LIKE"],
            ];
        }
        
        if ( isset( $args['where']['filters'] ) && "" !== $args['where']['filters'] ) {
            $filters = json_decode($args['where']['filters'], true);
            if(array_key_exists("keywords",$filters) && $filters["keywords"] !="") {
                $query_args['s'] = $filters["keywords"];
            }
        }
        return $query_args;
    }, 10, 5 );
}

if (function_exists('register_graphql_field')) {
    add_action('init', 'custom_post_init');
}