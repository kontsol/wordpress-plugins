<?php

class Custom_Accordion_Shortcode {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
			if ( defined( 'CUSTOM_ACCORDION_SHORTCODE_VERSION' ) ) {
					$this->version = CUSTOM_ACCORDION_SHORTCODE_VERSION;
			} else {
					$this->version = '1.0.0';
			}
			$this->plugin_name = 'custom-accordion-shortcode';

			$this->load_dependencies();
			$this->set_locale();
			$this->define_admin_hooks();
			$this->define_public_hooks();
			$this->register_shortcodes();
	}

	private function load_dependencies() {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-custom-accordion-shortcode-loader.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-custom-accordion-shortcode-i18n.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-custom-accordion-shortcode-admin.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-custom-accordion-shortcode-public.php';

			$this->loader = new Custom_Accordion_Shortcode_Loader();
	}

	private function set_locale() {
			$plugin_i18n = new Custom_Accordion_Shortcode_i18n();
			$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	private function define_admin_hooks() {
			$plugin_admin = new Custom_Accordion_Shortcode_Admin( $this->get_plugin_name(), $this->get_version() );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}

	private function define_public_hooks() {
			$plugin_public = new Custom_Accordion_Shortcode_Public( $this->get_plugin_name(), $this->get_version() );
			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	public function run() {
			$this->loader->run();
	}

	public function get_plugin_name() {
			return $this->plugin_name;
	}

	public function get_loader() {
			return $this->loader;
	}

	public function get_version() {
			return $this->version;
	}

	private function register_shortcodes() {
			add_shortcode( 'custom_accordion', array( $this, 'custom_accordion_shortcode' ) );
	}

	public function custom_accordion_shortcode( $atts) {

		// , $content = null 

			// $id = isset( $atts['id'] ) ? $atts['id'] : '';
			// $title = isset( $atts['title'] ) ? $atts['title'] : '';
			// $description = isset( $atts['description'] ) ? $atts['description'] : '';

			// $atts = shortcode_atts(
			// 		array(
			// 				'title' => '',
			// 				'description' => ''
			// 		),
			// 		$atts,
			// 		'custom_accordion'
			// );


			// $html = '<div class="accordion-item">';
			// $html .= '<div class="accordion-header">';
			// $html .= '<h2 class="accordion-title">' . esc_html( $title ) . '</h2>';
			// $html .= '<ion-icon id="accordion-button' . esc_attr( $id ) . '" name="add-circle-outline"></ion-icon>';
			// $html .= '</div>'; 
			// $html .= '<div class="accordion-content" id="accordion-content-' . esc_attr( $id ) . '" style="display: none;">' . esc_html( $description ) . '</div>';
			// $html .= '</div>';

			$atts = shortcode_atts(
        array(
            'id' => '',
            'title' => '',
            'description' => ''
        ),
        $atts,
        'custom_accordion'
    );

			$html = '<div class="accordion-item">';
			$html .= '<div class="accordion-header">';
			$html .= '<h2 class="accordion-title">' . $atts['title'] . '</h2>';
			$html .= '<ion-icon id="accordion-button' . $atts['id'] . '" name="add-circle-outline"></ion-icon>';
			$html .= '</div>'; 
			$html .= '<div class="accordion-content" id="accordion-content-' . $atts['id'] . '" style="display: none;">' . $atts['description'] . '</div>';
			$html .= '</div>';

			return $html;
	}

}

