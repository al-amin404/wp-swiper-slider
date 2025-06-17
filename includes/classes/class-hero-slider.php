<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class WSS_HERO_SLIDER{
    public function register() {
        add_action('wp_enqueue_scripts', [$this, 'wss_enqueue_slider_assets']);
        add_shortcode('wss_hero_swiper_wrapper', [$this, 'wss_render_hero_swiper_wrapper']);
        add_shortcode('wss_swiper_slide', [$this, 'wss_render_swiper_slide']);
    }

    public function wss_enqueue_slider_assets() {
        // Swiper CDN
        wp_enqueue_style('wss_swiper_slider_css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('wss_swiper_js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '1.0.0', true);

        // enqueue custom css & js
        wp_enqueue_style('wss_slider_custom_style', plugin_dir_url(__FILE__). '../css/custom-style.css');
        wp_enqueue_script('wss_slider_custom_js', plugin_dir_url(__FILE__). '../js/custom.js', [], '1.0.0', true);
    }

    
    /**
     * Render the main Swiper Wrapper.
     *
     * @return string
     */

     public function wss_render_hero_swiper_wrapper($atts, $content = null) {
        $output = '<div class="swiper mySwiper">';
        $output .= '<div class="swiper-wrapper">';
        $output .= do_shortcode($content);
         // Optional navigation & pagination
        $output .= '<div class="swiper-button-next"></div>';
        $output .= '<div class="swiper-button-prev"></div>';
        $output .= '<div class="swiper-pagination"></div>';
        $output .= '</div>';


        return $output;
     }

    /**
     * Render the Swiper slides.
     *
     * @return string
     */
     public function wss_render_swiper_slide($atts) {
        $slide_atts = shortcode_atts([
            'imgsrc' => '',
            'alttext' => '',
        ], $atts);

        $output = '<div class="swiper-slide">';
        $output .= '<img src="'. esc_url($slide_atts['imgsrc']) .'" alt="'. esc_attr($slide_atts['alttext']) .'" />' ;
        $output .= '</div>';


        return $output;

     }
}