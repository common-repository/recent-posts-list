<?php
/**
 * Setting page
*/
function rplp_setting_page() {
    add_submenu_page(
        'rplp-links',
        'Posts Settings',
        'Posts Settings',
        'manage_options',
        'rplp-setting-page',
        'rplp_setting_page_content'
    );

    //call register settings function
	add_action( 'admin_init', 'register_bootstrap_components_blocks_settings' );
}
add_action( 'admin_menu', 'rplp_setting_page' );

function register_bootstrap_components_blocks_settings() {
	register_setting( 'rplp_settings_group', 'section_title' );
    register_setting( 'rplp_settings_group', 'total_posts' );
}

function rplp_setting_page_content() {
?>
    <div class="wrap">
        <h3>Recent Posts Links Settings</h3>
        <p><i>New Settings will be overriden on default settings</i></p>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'rplp_settings_group' );
            ?>
            <?php
                do_settings_sections( 'rplp_settings_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        Section Title
                    </th>
                    <td>
                        <textarea rows="5" cols="10" name="section_title"><?php echo get_option( 'section_title', 'Related Posts' ); ?></textarea>
                        <i class="help-text">Display at the top of this area.</i>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Total Posts
                    </th>
                    <td>
                        <input type="number" name="total_posts" value="<?php echo get_option( 'total_posts', 5 ); ?>" />
                        <i class="help-text">Set -1 to load all posts.</i>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php } ?>
