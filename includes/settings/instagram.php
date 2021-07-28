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
?>
<div class="wp-social-media settings">
    <?php
    /**
     * Let the user authenticate to Instagram API
     * 
     * Default button to be used
     */
    $redirect_uri = $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    <h2><?php _e( 'Account Authorisation' ); ?></h2>
    <p class="description"><?php _e( 'To start using WP Social Media, kindly allow and authorise the app on Instagram to access your account. Clicking the button below will redirect you to Instagram site which you need to authorise WP Social Media accessing your images and video.' ); ?></p>
    <div class="insta-default">
        <a href="<?php echo wp_social_media_app_redirect; ?>?redirect_uri=<?php echo $redirect_uri; ?>" class="insta-default">Log in with Instagram <i class="dashicons dashicons-instagram"></i></a>
    </div>
    <?php
    /**
     * End of authorisation section
     * 
     * Let's begin with the form setttings
     */
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
</div>