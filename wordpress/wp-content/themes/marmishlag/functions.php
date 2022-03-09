<?php

add_action('after_setup_theme',
    function () {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        add_theme_support('menus');
        register_nav_menu('custom_header', "C'est le menu dans le header");
    });

function marmishlag_theme_style() {
    wp_enqueue_style( 'marmishlag-style', get_stylesheet_uri('./style.css') );
}
add_action( 'wp_enqueue_scripts', 'marmishlag_theme_style' );

add_filter('login_headerurl',
    function ($header_url) {
        return 'https://www.google.fr';
    });

add_filter('nav_menu_css_class', function ($classes) {
    $classes[] = 'nav-item';
    return $classes;
});

add_filter('nav_menu_link_attributes', function ($atts) {
    $atts['class'] = "nav-link";
    return $atts;
});

function MarmishlagPaginateLinks()
{
    $paginateLink = paginate_links(['type' => 'array']);
    if ($paginateLink) {
        ob_start();
        echo '<nav aria-label="Page navigation example" class="pagination">';
        echo '<ul>';

        foreach ($paginateLink as $link) {
            echo sprintf('<li class="page-item %s">%s</li>',
                str_contains($link, 'current') ? 'active' : '',
                str_replace('page-numbers', 'page-link', $link));
        }

        echo "</ul>";
        echo "</nav>";

        return ob_get_clean();
    }
}

add_action('init', function (){

    register_taxonomy('type', ['post'], [
        'labels' => [
            'name' => 'Types'
        ],
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'default_term' => [
            'name' => 'Dessert',
            'slug' => 'dessert'
        ]
    ]);

    register_post_type('recette', [
        'label' => 'Recettes',
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'menu-icon' => 'dashicons-food',
        'taxonomies' => ['type'],
        'supports' => [
            'thumbnail', 'custom-fields', 'title'
        ]
    ]);

    flush_rewrite_rules();
});