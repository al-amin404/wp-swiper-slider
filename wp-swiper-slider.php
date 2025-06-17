<?php
/**
 * Plugin Name: WP Swiper Slider
 * Description: A simple and lightweight plugin to display swiper sliders on the website using shortcodes
 * Author: Al Amin
 * Version: 1.0.0
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

 if ( ! defined("ABSPATH") ) exit;

 require_once plugin_dir_path(__FILE__). 'includes/classes/class-hero-slider.php';

 add_action('plugins_loaded', 'wss_slider_init');

 function wss_slider_init() {
    $heroSlider = new WSS_HERO_SLIDER;
    $heroSlider->register();
 }