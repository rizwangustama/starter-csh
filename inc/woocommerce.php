<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package csh
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function csh_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'csh_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function csh_woocommerce_scripts() {
	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'csh-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'csh_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function csh_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'csh_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function csh_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'csh_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'csh_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function csh_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main container mx-auto">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'csh_woocommerce_wrapper_before' );

if ( ! function_exists( 'csh_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function csh_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'csh_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'csh_woocommerce_header_cart' ) ) {
			csh_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'csh_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function csh_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		csh_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'csh_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'csh_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function csh_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'csh' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'csh' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'csh_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function csh_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php csh_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

function my_remove_product_type_options( $options ) {
	if ( isset( $options['downloadable'] ) ) {
		unset( $options['downloadable'] );
	}
	return $options;
}

add_filter( 'woocommerce_add_to_cart_validation', 'subscription_in_cart', 9999, 2 );
   
function subscription_in_cart( $passed, $product_id ) {
   //$res = get_post_meta($product_id);
   $is_subscription = get_post_meta( $product_id, '_rp_sub:subscription_product', true );
   /* get product categories */
   $product_cats = array_map(function($item){
	return $item->slug;
   },wp_get_post_terms( $product_id, 'product_cat' ));
   if (in_array("subscriptions", $product_cats) || $is_subscription) { 
   	wc_empty_cart();
   }
   return $passed;
}

add_filter( 'template_include', 'woocomerce_page_template', 99 );
function woocomerce_page_template( $template ) {
    if ( is_page( 'checkout' ) || is_page( 'cart' ) || is_page( 'my-account' )  ) {
        $new_template = locate_template( array( 'template-fullwidth.php' ) );
		return $new_template;
    }
    return $template;
}

function publiquemoslo_add_post_content_endpoint() {
    // add_rewrite_endpoint( 'post-content', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'manage-content', EP_ROOT | EP_PAGES );
}
  
// ------------------
// 2. Add new query var
  
function publiquemoslo_post_content_query_vars( $vars ) {
    // $vars[] = 'post-content';
	$vars[] = 'manage-content';
    return $vars;
}
  
// ------------------
// 3. Insert the new endpoint into the My Account menu
  
function publiquemoslo_add_post_content_link_my_account( $items ) {
    // $items['post-content'] = 'Add New Post';
	$items['manage-content'] = 'Manage Posts';
    return $items;
}

// ------------------
// 4. Add content to the new tab
  
function publiquemoslo_post_content() {
   if (isset($_GET['delete']) && get_current_user_id() == get_post($_GET["delete"])->post_author && get_post($_GET["delete"])->post_status != "publish") {
	wp_delete_post($_GET["delete"]);
	echo '<div class="woocommerce-message">Post deleted successfully.</div>';
   }else if (isset($_GET["post_id"]) && get_current_user_id() == get_post($_GET["post_id"])->post_author && get_post($_GET["post_id"])->post_status != "publish") {
	$post_id = $_GET["post_id"];
	$post = get_post($post_id);
	$post_tags = array_map(function($item){
		return $item->name;
	},get_the_tags($post_id));
	$post_tags = is_array($post_tags) ? implode(",",$post_tags) : "";
	$post_excerpt= htmlentities(strip_tags(get_custom_excerpt($post)));
	echo '<h3 class="mb-5">Edit Post</h3>';
	echo do_shortcode('[gravityform id="2" ajax="true" title="false" description="false" tabindex="49" field_values="post_id='.$post_id.'&post_title='.$post->post_title.'&post_content='.htmlentities($post->post_content).'&post_tags='.htmlentities($post_tags).'&post_excerpt='.$post_excerpt.'"]');
   }else{
	echo '<h3 class="mb-5">Add New Post</h3>';
	echo do_shortcode('[gravityform id="2" ajax="true" title="false" description="false" tabindex="49"]');
   }
}

//5. Manage content
function publiquemoslo_manage_content() {
	echo '<h3 class="mb-5">Your Latest Posts</h3>';
	echo '<div class="flex items-center justify-between mb-5">';
	echo '<div class="ml-auto flex gap-x-3">';
	echo '<a title="view all posts" href="/wp-admin/edit.php" class="btn btn-primary">View All Post</a>';
	echo '<a title="add new post" href="/wp-admin/post-new.php" class="btn btn-primary">Add New Post</a>';
	echo '</div>';
	echo '</div>';
	$args = array(
	   'post_type' => 'post',
	   'posts_per_page' => 10,
	   'author' => get_current_user_id(),
	   'post_status' => array('publish', 'pending', 'draft','private')
	);
	$query = new WP_Query( $args );
	$posts = $query->get_posts();
	$i=1;
	if ( $query->have_posts() ) {
	 echo '<div class="flex items-center border-b bg-light bg-opacity-25 py-4 px-2 justify-between post-lists font-semibold">';
	 echo '<div class="hidden md:block md:w-1/12 text-center">No.</div>';
	 echo '<div class="w-full md:w-8/12">Title</div>';
	 echo '<div class="w-full md:w-3/12"><span class="mb-0">Status</span></div>';
	 echo '</div>';
	 foreach ($posts as $post) {
		 echo '<div class="flex items-center justify-between border-b border-neutral p-2 post-lists-item">';
		 echo '<div class="hidden md:block md:w-1/12 text-center">'.$i++;
		 echo '</div>';
		 echo '<div class="w-full md:w-8/12">';
		 echo '<h4><a title="read more detail" '.($post->post_status == "publish" ? "target=\"_blank\"" : "").' href="'.($post->post_status == "publish" ? get_permalink($post->ID) : "#").'">'.$post->post_title.'</a></h4>';
		 echo '</div>';
		 echo '<div class="w-full md:w-3/12 flex items-center">';
		 echo '<span class="mb-0">'.$post->post_status.'</span>';
		 $edit_link = site_url()."/wp-admin/post.php?post=".$post->ID."&action=edit";
		 $delete_link = site_url()."/my-account/post-content/?delete=".$post->ID;
		 if ($post->post_status != "publish") {
			 echo '<a title="read more detail" href="'.$edit_link.'" class="btn p-2 ml-2">
			 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			 <path d="M21 11.9999C20.7348 11.9999 20.4804 12.1053 20.2929 12.2928C20.1054 12.4804 20 12.7347 20 12.9999V18.9999C20 19.2652 19.8946 19.5195 19.7071 19.707C19.5196 19.8946 19.2652 19.9999 19 19.9999H5C4.73478 19.9999 4.48043 19.8946 4.29289 19.707C4.10536 19.5195 4 19.2652 4 18.9999V4.99994C4 4.73472 4.10536 4.48037 4.29289 4.29283C4.48043 4.1053 4.73478 3.99994 5 3.99994H11C11.2652 3.99994 11.5196 3.89458 11.7071 3.70705C11.8946 3.51951 12 3.26516 12 2.99994C12 2.73472 11.8946 2.48037 11.7071 2.29283C11.5196 2.1053 11.2652 1.99994 11 1.99994H5C4.20435 1.99994 3.44129 2.31601 2.87868 2.87862C2.31607 3.44123 2 4.20429 2 4.99994V18.9999C2 19.7956 2.31607 20.5587 2.87868 21.1213C3.44129 21.6839 4.20435 21.9999 5 21.9999H19C19.7956 21.9999 20.5587 21.6839 21.1213 21.1213C21.6839 20.5587 22 19.7956 22 18.9999V12.9999C22 12.7347 21.8946 12.4804 21.7071 12.2928C21.5196 12.1053 21.2652 11.9999 21 11.9999ZM6 12.7599V16.9999C6 17.2652 6.10536 17.5195 6.29289 17.707C6.48043 17.8946 6.73478 17.9999 7 17.9999H11.24C11.3716 18.0007 11.5021 17.9755 11.6239 17.9257C11.7457 17.8759 11.8566 17.8026 11.95 17.7099L18.87 10.7799L21.71 7.99994C21.8037 7.90698 21.8781 7.79637 21.9289 7.67452C21.9797 7.55266 22.0058 7.42195 22.0058 7.28994C22.0058 7.15793 21.9797 7.02722 21.9289 6.90536C21.8781 6.7835 21.8037 6.6729 21.71 6.57994L17.47 2.28994C17.377 2.19621 17.2664 2.12182 17.1446 2.07105C17.0227 2.02028 16.892 1.99414 16.76 1.99414C16.628 1.99414 16.4973 2.02028 16.3754 2.07105C16.2536 2.12182 16.143 2.19621 16.05 2.28994L13.23 5.11994L6.29 12.0499C6.19732 12.1434 6.12399 12.2542 6.07423 12.376C6.02446 12.4979 5.99924 12.6283 6 12.7599V12.7599ZM16.76 4.40994L19.59 7.23994L18.17 8.65994L15.34 5.82994L16.76 4.40994ZM8 13.1699L13.93 7.23994L16.76 10.0699L10.83 15.9999H8V13.1699Z" fill="white"/>
			 </svg>
			 </a>';
			 echo '<a onclick="return confirm(\'Are you sure you want to delete this post? \')" href="'.$delete_link.'" class="btn bg-red-900 p-2 ml-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			 <path fill-rule="evenodd" clip-rule="evenodd" d="M11 2C10.4477 2 10 2.44772 10 3V4H14V3C14 2.44772 13.5523 2 13 2H11ZM16 4V3C16 1.34315 14.6569 0 13 0H11C9.34315 0 8 1.34315 8 3V4H3C2.44772 4 2 4.44772 2 5C2 5.55228 2.44772 6 3 6H3.10496L4.80843 21.3313C4.97725 22.8506 6.26144 24 7.79009 24H16.2099C17.7386 24 19.0228 22.8506 19.1916 21.3313L20.895 6H21C21.5523 6 22 5.55228 22 5C22 4.44772 21.5523 4 21 4H16ZM18.8827 6H5.11726L6.7962 21.1104C6.85247 21.6169 7.28054 22 7.79009 22H16.2099C16.7195 22 17.1475 21.6169 17.2038 21.1104L18.8827 6ZM10 9C10.5523 9 11 9.44771 11 10V18C11 18.5523 10.5523 19 10 19C9.44772 19 9 18.5523 9 18V10C9 9.44771 9.44772 9 10 9ZM14 9C14.5523 9 15 9.44771 15 10V18C15 18.5523 14.5523 19 14 19C13.4477 19 13 18.5523 13 18V10C13 9.44771 13.4477 9 14 9Z" fill="white"/>
			 </svg></a>';
		 }
		 echo '</div>';
		 echo '</div>';
	 }
	}
 }

add_action( 'init', 'publiquemoslo_add_post_content_endpoint' );
add_filter( 'query_vars', 'publiquemoslo_post_content_query_vars', 0 );

// Note: add_action must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format
function show_media_button( $editor_settings, $field_object, $form, $entry ) {
    $editor_settings['media_buttons'] = true;
    return $editor_settings;
}
add_filter( 'gform_rich_text_editor_options', 'show_media_button', 10, 4 );

function clear_cache() {
    // deletes the default cache for normal Post. (1)
    $cache_key = _count_posts_cache_key( 'post' , 'readable' );

    wp_cache_delete( $cache_key, 'counts' );
}

function fix_count_orders( $counts, $type, $perm ) {
    global $wpdb;

    if ( ! post_type_exists( $type ) ) {
        return new stdClass();
    }

    $query = "SELECT post_status, COUNT( * ) AS num_posts FROM {$wpdb->posts} WHERE post_type = %s";

    $post_type_object = get_post_type_object( $type );

    // adds condition to respect `$perm`. (3)
    if ( $perm === 'readable' && is_user_logged_in() ) {
        if ( ! current_user_can( $post_type_object->cap->read_private_posts ) ) {
            $query .= $wpdb->prepare(
                " AND (post_status != 'private' OR ( post_author = %d AND post_status = 'private' ))",
                get_current_user_id()
            );
        }
    }

    // limits only author's own posts. (6)
    if ( is_admin() && ! current_user_can ( $post_type_object->cap->edit_others_posts ) ) {
        $query .= $wpdb->prepare( ' AND post_author = %d', get_current_user_id() );
    }

    $query .= ' GROUP BY post_status';

    $results = (array) $wpdb->get_results( $wpdb->prepare( $query, $type ), ARRAY_A );
    $counts  = array_fill_keys( get_post_stati(), 0 );

    foreach ( $results as $row ) {
        $counts[ $row['post_status'] ] = $row['num_posts'];
    }

    $counts    = (object) $counts;
    $cache_key = _count_posts_cache_key( $type, 'readable' );

    // caches the result. (2)
    // although this is not so efficient because the cache is almost always deleted.
    wp_cache_set( $cache_key, $counts, 'counts' );

    return $counts;
}

function query_set_only_author( $wp_query ) {
    if (!is_admin()) return;
    $allowed_types = [ 'post', 'pages' ];
    $current_type  = get_query_var( 'post_type', 'post' );

    if ( in_array( $current_type, $allowed_types, true ) ) {
        $post_type_object = get_post_type_object( $current_type );

        if (! current_user_can( $post_type_object->cap->edit_others_posts ) ) {    // (6)
            $wp_query->set( 'author', get_current_user_id() );

            add_filter( 'wp_count_posts', 'fix_count_orders', PHP_INT_MAX, 3 );    // (4)
        }
    }
}

function fix_views( $views ) {
    // For normal Post.
    // USE PROPER CAPABILITY IF YOU WANT TO RISTRICT THE READABILITY FOR CUSTOM POST TYPE (6).
    if ( current_user_can( 'edit_others_posts' ) ) {
        return;
    }

    unset( $views[ 'sticky' ] );

    return $views;
}


if( is_user_logged_in() ) {
    $user = wp_get_current_user();
    $roles = ( array ) $user->roles;
	if (in_array("member_subscriber", $roles)) {
		add_filter( 'woocommerce_account_menu_items', 'publiquemoslo_add_post_content_link_my_account' );
		add_action( 'woocommerce_account_post-content_endpoint', 'publiquemoslo_post_content' );
		add_action( 'woocommerce_account_manage-content_endpoint', 'publiquemoslo_manage_content' );
		add_action( 'admin_init', 'clear_cache' );    // you might use other hooks.
		add_action( 'pre_get_posts', 'query_set_only_author', PHP_INT_MAX ); 
		add_filter( 'views_edit-post', 'fix_views', PHP_INT_MAX );
		add_filter( 'woocommerce_account_menu_items', function($items) {
			$newItems = array(
				"dashboard" => $items["dashboard"],
				"orders" => $items["orders"],
				"subscriptions" => $items["subscriptions"],
				// "post-content" => $items["post-content"],
				"manage-content" => $items["manage-content"],
				"edit-address" => $items["edit-address"],
				"edit-account" => $items["edit-account"],
				"customer-logout" => $items["customer-logout"],
			);
			return $newItems;
		}, 99, 1 );
	}
}