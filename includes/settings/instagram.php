<?php
/**
 * Instagram specific settings page
 *
 * @link       http://www.rollybueno.com/wp-social-media
 * @since      1.0.0
 *
 * @package    WP_Social_Media
 * @subpackage WP_Social_Media/admin/Instagram
 */

$access_token = isset( $_GET['access_token'] ) ? esc_html( $_GET['access_token'] ) : get_option( 'wp-social-media-ig-token' );
if( isset( $_GET['access_token'] ) ) {
	update_option( 'wp-social-media-ig-token', $access_token );
}
$token_expires = isset( $_GET['expires'] ) ? esc_html( $_GET['expires'] ) : get_option( 'wp-social-media-ig-token-expires' );
if( isset( $_GET['expires'] ) ) {
	update_option( 'wp-social-media-ig-token-expires', $user_id );
}
$user_id = isset( $_GET['user_id'] ) ? esc_html( $_GET['user_id'] ) : get_option( 'wp-social-media-ig-user-id' );
if( isset( $_GET['user_id'] ) ) {
	update_option( 'wp-social-media-ig-user-id', $user_id );
}
?>
<div class="wp-social-media settings">
	<?php
	/**
	 * Let the user authenticate to Instagram API
	 *
	 * Default button to be used
	 */
	if ( empty( $access_token ) ) {
		$redirect_uri = $actual_link = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		?>
	<h2><?php _e( 'Account Authorisation' ); ?></h2>
	<p class="description"><?php _e( 'To start using WP Social Media, kindly allow and authorise the app on Instagram to access your account. Clicking the button below will redirect you to Instagram site which you need to authorise WP Social Media accessing your images and video.' ); ?></p>
	<div class="insta-default">
		<a href="<?php echo wp_social_media_app_redirect; ?>?redirect_url=<?php echo base64_encode( $redirect_uri ); ?>" class="insta-default"><?php _e( 'Log in with Instagram', 'wp-social-media' ); ?> <i class="dashicons dashicons-instagram"></i></a>
	</div>
		<?php
		/**
		 * End of authorisation section
		 *
		 * Let's begin with the form setttings
		 */
	} else {
		?>
	<form action="admin.php?page=wp-social-media&tab=instagram" method="post" class="instagram">
		<ul class="flex-outer">
			<li>
				<label for="Test">Test</label>
				<input type="text" name="" id="Test">
			</li>
			<li class="submit">
				<button class="button button-primary"><?php _e( 'Save', 'wp-social-media' ); ?></button>
			</li>
		</ul>
	</form>
	<?php } ?>
</div>
