<?php
	function my_post_type_blog() {
		register_post_type( 'blog',
		array( 
		'label' => 'Blog', 
		'singular_label' => 'Blog',
		'_builtin' => false,
		'exclude_from_search' => false, // Exclude from Search Results
		'capability_type' => 'page',
		'public' => true, 
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array(
		'slug' => 'blog',
		'with_front' => FALSE,
		),
		'query_var' => "blog", // This goes to the WP_Query schema
		'menu_icon' => get_template_directory_uri() . '/i/pencil.png',
		'supports' => array(
			'title',
			'editor',
			'thumbnail')
			) 
		);
		//register_taxonomy('posttype_category', 'Blog', array('hierarchical' => true, 'label' => 'Posttype Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	}

	add_action('init', 'my_post_type_blog');

    	function my_post_type_news() {
		register_post_type( 'news',
		array( 
		'label' => 'News', 
		'singular_label' => 'News',
		'_builtin' => false,
		'exclude_from_search' => false, // Exclude from Search Results
		'capability_type' => 'page',
		'public' => true, 
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array(
		'slug' => 'news',
		'with_front' => FALSE,
		),
		'query_var' => "news", // This goes to the WP_Query schema
		'menu_icon' => get_template_directory_uri() . '/i/news.png',
		'supports' => array(
			'title',
			'editor',
			'thumbnail')
			) 
		);
		//register_taxonomy('posttype_category', 'Blog', array('hierarchical' => true, 'label' => 'Posttype Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	}

	add_action('init', 'my_post_type_news');

    	function my_post_type_community() {
		register_post_type( 'community',
		array( 
		'label' => 'Community', 
		'singular_label' => 'Community',
		'_builtin' => false,
		'exclude_from_search' => false, // Exclude from Search Results
		'capability_type' => 'page',
		'public' => true, 
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array(
		'slug' => 'community',
		'with_front' => FALSE,
		),
		'query_var' => "news", // This goes to the WP_Query schema
		'menu_icon' => get_template_directory_uri() . '/i/chat.png',
		'supports' => array(
			'title',
			'editor',
			'thumbnail')
			) 
		);
		//register_taxonomy('posttype_category', 'Blog', array('hierarchical' => true, 'label' => 'Posttype Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	}

	add_action('init', 'my_post_type_community');
?>
