<?php 
/**
 * Plugin Main Class
 */
class LA_Words_Rotator
{
    public function __construct()
    {
        add_action("admin_menu", array($this,'rotating_words_admin_options'));
        add_action('admin_enqueue_scripts', array($this,'admin_enqueuing_scripts'));
        add_action('wp_ajax_la_save_words_rotator', array($this, 'save_admin_options'));
        add_shortcode('animated-words-rotator', array($this, 'render_words_rotator'));
    }

    public function rotating_words_admin_options()
    {
        add_menu_page('CSS3 Rotating Words', 'CSS3 Rotating Words', 'manage_options', 'word_rotator', array($this,'rotating_wordpress_admin_menu'), 'dashicons-update-alt');
    }

    public function admin_enqueuing_scripts($slug)
    {
        if ($slug == 'toplevel_page_word_rotator') {
            $this->enqueue_admin_scripts_and_styles();
        }
    }

    private function enqueue_admin_scripts_and_styles()
    {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wdo-rotator-admin-js', plugins_url('admin/admin.js', __FILE__), array('jquery', 'jquery-ui-accordion', 'wp-color-picker'), '1.0.0', true);
        wp_enqueue_style('rotator-ui-css', plugins_url('admin/jquery-ui.min.css', __FILE__), array(), '1.0.0');
        wp_enqueue_style('rotator-admin-css', plugins_url('admin/style.css', __FILE__), array(), '1.0.0');
        wp_enqueue_style('rotator-bootstrap-css', plugins_url('admin/bootstrap-min.css', __FILE__), array(), '1.0.0');
        wp_localize_script('wdo-rotator-admin-js', 'laAjax', array(
            'url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('la-ajax-nonce'),
            'path' => plugin_dir_url(__FILE__)
        ));
    }

    public function rotating_wordpress_admin_menu()
    {
        include "includes/admin-settings.php";
    }

    public function save_admin_options(){
       // Verify nonce and check user capabilities
       if (isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], 'la-ajax-nonce') && current_user_can('manage_options')) {
           update_option('la_words_rotator', $_REQUEST);
       } else {
           wp_send_json_error('Unauthorized access');
       }
    }

    public function render_words_rotator($atts, $content, $the_shortcode)
    {
        $savedmeta = get_option('la_words_rotator');
        $postContents = '';
        if (isset($savedmeta['rotwords'])) {
            foreach ($savedmeta['rotwords'] as $key => $data) {
                if ($atts['id'] == $data['counter']) {
                    $this->enqueue_rotator_scripts_and_styles($data);
                    $output = '<div class="rwo-container" data-animation="' . esc_attr($data['animation_effect']) . '" data-id="' . esc_attr($data['counter']) . '">';
                    $output .= '<p class="rotate-words rotating-word' . esc_attr($data['counter']) . '">';
                    $output .= esc_html(stripslashes($data["stat_sent"])) . ' <span class="rotate">' . esc_html(stripslashes($data['rot_words'])) . '</span> ' . esc_html(stripslashes($data['end_sent'])) . '</p>';
                    $output .= '</div>';
                    return $output;
                }   
            }
        }
    }

    private function enqueue_rotator_scripts_and_styles($data)
    {
    	wp_enqueue_script('rw-text-rotator-js', plugins_url('js/jquery.simple-text-rotator.min.js', __FILE__), array('jquery'), '1.0.0', true);
        wp_enqueue_script('rw-animate-js', plugins_url('js/jquery.simple-text-rotator.min.js', __FILE__), array('jquery'), '1.0.0', true);
        wp_enqueue_script('rw-script-js', plugins_url('js/script.js', __FILE__), array('jquery'), '1.0.0', true);
        wp_enqueue_style('rw-text-rotator-css', plugins_url('js/simpletextrotator.css', __FILE__), array(), '1.0.0');
        wp_enqueue_style('rw-animate-css', plugins_url('js/animate.min.css', __FILE__), array(), '1.0.0');
        wp_localize_script('rw-script-js', 'words', array(
            'animation' => esc_attr($data["animation_effect"]),
            'speed' => esc_attr($data['animation_speed']),
            'counter' => esc_attr($data['counter']),
        ));
    }
}
?>
