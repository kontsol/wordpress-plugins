<?php

class Custom_Ajax_Search {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
			if ( defined( 'CUSTOM_AJAX_SEARCH_VERSION' ) ) {
					$this->version = CUSTOM_AJAX_SEARCH_VERSION;
			} else {
					$this->version = '1.0.0';
			}
			$this->plugin_name = 'custom-ajax-search';

			$this->load_dependencies();
			$this->set_locale();
			$this->define_admin_hooks();
			$this->define_public_hooks();
			$this->register_shortcodes();
	}

	private function load_dependencies() {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-custom-ajax-search-loader.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-custom-ajax-search-i18n.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-custom-ajax-search-admin.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-custom-ajax-search-public.php';

			$this->loader = new Custom_Ajax_Search_Loader();
	}

	private function set_locale() {
			$plugin_i18n = new Custom_Ajax_Search_i18n();
			$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	private function define_admin_hooks() {
			$plugin_admin = new Custom_Ajax_Search_Admin( $this->get_plugin_name(), $this->get_version() );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}

	private function define_public_hooks() {
			$plugin_public = new Custom_Ajax_Search_Public( $this->get_plugin_name(), $this->get_version() );
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
			add_shortcode( 'custom_search', array( $this, 'custom_ajax_search' ) );
	}

	public function custom_ajax_search( $atts, $content = null ) {

		$query_args = array(
			'post_type'      => 'post', 
			'posts_per_page' => 0,    
	);


	$html = '<div class="custom-search">';
	$html .= '<form id="custom-search-form" action="#" method="get">'; 
	$html .= '<h1>Browse Archives</h1>';
	$html .= '<div class="search-container">';
	$html .= '<input type="text" id="custom-search-input" name="s" placeholder="Search...">';
	$html .= '<ion-icon name="close-outline" id="close-btn"></ion-icon>';
	$html .= '</input>';
	$html .= '</div>';
	$html .= '</form>';
	$html .= '</div>';

	$html .= '<div class="custom-search-results">'; 

	// if ( $posts_query->have_posts() ) {
	// 		while ( $posts_query->have_posts() ) {
	// 				$posts_query->the_post();
	// 				$html .= '<div class="search-result">';
	// 				$html .= '<h2><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h2>';
	// 				$html .= '</div>';
	// 		}
	// 		wp_reset_postdata();
	// }
	// else {
	// 		$html .= '<p>No posts found</p>';
	// }

	// $html .= '</div>';
	$html .= '</div>';

	wp_enqueue_script( 'custom-search-js', plugin_dir_url( __FILE__ ) . 'public/js/custom-ajax-search-public.js', array( 'jquery' ), '1.0', true );

	return $html;
	}
	}