<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.rollybueno.com/wp-social-media
 * @since      1.0.0
 *
 * @package    WP_Social_Media
 * @subpackage WP_Social_Media/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Social_Media
 * @subpackage WP_Social_Media/admin
 * @author     Rolly G. Bueno Jr. <rollybueno@gmail.com?
 */
class WP_Social_Media_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		add_action( 'admin_menu', array( $this, 'register_admin_page' ) );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Social_Media_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Social_Media_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, wp_social_media_path_plugin_url . 'assets/css/wp-social-media-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Social_Media_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Social_Media_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, wp_social_media_path_plugin_url . 'assets/script/wp-social-media-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register custom administration menu page
	 *
	 * @since 1.0.0
	 */
	public function register_admin_page() {
		add_menu_page(
			__( 'WP Social Media', 'wp-social-media' ),
			__( 'WP Social Media', 'wp-social-media' ),
			'manage_options',
			'wp-social-media',
			array( $this, 'display_admin_page' ),
			'dashicons-share',
		);
	}

	/**
	 * Display content on the admin page
	 *
	 * @since   1.0.0
	 */
	public function display_admin_page() {
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'instagram';
		?>
			<div class="wrap">
				<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
                <p class="description"><?php _e( 'Welcome to WP Social Media! Use this plugin to display your social media posts on a page using shortcode.', 'wp-social-media' ); ?></p>
				<p class="description"><?php _e( 'We support secure authentication to pull your social media content for ease and security. Choose the platform below..', 'wp-social-media' ); ?></p>
				
                <nav class="nav-tab-wrapper">
					<a href="admin.php?page=wp-social-media&tab=instagram" class="nav-tab <?php echo ( 'instagram' === $tab ) ? 'nav-tab-active' : ''; ?>"><?php _e( 'Instagram', 'wp-social-media' ); ?></a>
				</nav>

				<div class="tab-content">
					<?php
					switch ( $tab ) :
                        default:
						case 'instagram':
							include_once( wp_social_media_path . '/includes/settings/instagram.php' );
							break;
					endswitch;
					?>
				</div>
			</div>
		<?php
	}

}
