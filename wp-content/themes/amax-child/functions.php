<?php
/**
 * Originally the theme was directly edited and some issues came up
 * This is an attempt to make a new child theme based on the theme the modified theme was built on top of.
 *
 */


/**
 * Add custom css file
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'custom',
        get_stylesheet_directory_uri() . '/custom.js',
        array('om_custom'),
        '1.0',
        true
    );
    wp_enqueue_style('amax', get_stylesheet_uri() . '/custom.css');
    wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/custom.css', ['amax']);
});

/**
 * Hide some menu items
 */
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
    remove_menu_page('link-manager.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
});

/**
 * Add fancybox class to links in the menu that start with a #
 * This links will trigger fancybox and load the content
 * in a lightbox if it is on the page and hidden.
 */
add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
    if (preg_match('/#/', $atts['href'])) {
        $atts['class'] = 'fancybox';
    }
    return $atts;
}, 10, 3);

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
add_action('wp_dashboard_setup', function () {
    wp_add_dashboard_widget(
        'example_dashboard_widget',
        'RECEIVE $500 in CASH FOR A WEBSITE REFERRAL!!',
        'example_dashboard_widget_function'
    );
});

function example_dashboard_widget_function()
{
    // Display whatever it is you want to show.
    echo <<<HTML
<span style='width:100%'>
    <a href='http://www.sayenkodesign.com'>
        <img
            alt='Seattle Web Design'
            src='http://www.sayenkodesign.com/wp-content/uploads/2014/08/Sayenko-Design-WP-Referral-Bonus-460.jpg'
            width='486px'>
    </a>
</span>
</br>
</br>
Simply introduce us via email along with the prospects phone number. Email introductions can be sent to
<a href='mailto:mike@sayenkodesign.com'>mike@sayenkodesign.com</a>
HTML;
}