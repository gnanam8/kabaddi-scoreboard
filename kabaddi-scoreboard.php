<?php
/**
 * Plugin Name: Kabaddi Scoreboard
 * Description: A custom plugin to manage Kabaddi scores.
 * Version: 1.0
 * Author: Your Name
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('KABADDI_SCOREBOARD_VERSION', '1.0');
define('KABADDI_SCOREBOARD_DIR', plugin_dir_path(__FILE__));

// Enqueue scripts and styles
function kabaddi_scoreboard_enqueue_scripts() {
    wp_enqueue_style('kabaddi-scoreboard-style', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_script('kabaddi-scoreboard-script', plugins_url('assets/js/script.js', __FILE__), array('jquery'), KABADDI_SCOREBOARD_VERSION, true);
}
add_action('wp_enqueue_scripts', 'kabaddi_scoreboard_enqueue_scripts');

// Include necessary files
include_once KABADDI_SCOREBOARD_DIR . 'includes/admin-page.php';
include_once KABADDI_SCOREBOARD_DIR . 'includes/scoreboard.php';
include_once KABADDI_SCOREBOARD_DIR . 'includes/timer.php';

// Shortcode to display the scoreboard
function kabaddi_scoreboard_shortcode() {
    ob_start();
    include KABADDI_SCOREBOARD_DIR . 'includes/scoreboard.php';
    include KABADDI_SCOREBOARD_DIR . 'includes/timer.php';
    return ob_get_clean();
}
add_shortcode('kabaddi_scoreboard', 'kabaddi_scoreboard_shortcode');
?>