<?php
	register_sidebar(array(
		'name'=>__('Sidebar','language'),
		'id' => 'sidebar',
		'before_widget' => "<div class='right-block'><div class='right-white-block'><ul class='side-nav'>",
		'after_widget' => '</ul></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name'=>__('Carousel Cars','language'),
		'id' => 'carousel',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array(
		'name'=>__('Header Phone Number','language'),
		'id' => 'phone',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar(array(
		'name'=>__('Welcome Widget','language'),
		'id' => 'welcome',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array(
		'name'=>__('Search Module','language'),
		'id' => 'search',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array(
		'name'=>__('Featured Cars','language'),
		'id'  => 'featured',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array(
		'name'=>__('Footer ','language'),
		'id' => 'footer',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
?>