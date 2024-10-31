<?php
/**
 * Admin Menu page
*/

/**
 * External Assets Enqueue
*/
function rplp_external_assets_load($screen){
    if ( 'toplevel_page_rplp-links' == $screen || 'posts-list_page_rplp-setting-page' == $screen ) {
        wp_enqueue_style( 'rplp-admin-css', plugins_url( 'assets/css/admin.css', __FILE__ ), array(), time(), 'all' );
    }
}
add_action( 'admin_enqueue_scripts', 'rplp_external_assets_load' );

/**
 * Admin Page
 */
function rplp_admin_overview_page() {
    add_menu_page( 'Posts List', 'Posts List', 'manage_options', 'rplp-links', 'rplp_admin_overview_page_content', 'dashicons-editor-ul', 78 );
}
add_action( 'admin_menu', 'rplp_admin_overview_page' );

/**
 * Admin Page Content
 */
function rplp_admin_overview_page_content(){
    ?>
        <div class="admin_page_container">
            <div class="plugin_head">
                <div class="head_container">
                    <h1 class="plugin_title"> Recent Posts List </h1>
                    <h4 class="plugin_subtitle">Display Recent Posts List Just After the Post Content in Single Post View.</h4>
                    <div class="support_btn">
                        <a href="https://demos.makegutenblock.com" target="_blank" style="background: #D37F00">See Demos</a>
                        <a href="#" target="_blank" style="background: #0174A2">Rate Plugin</a>
                    </div>
                </div>
            </div>
            <div class="plugin_body">
                <div class="doc_video_area">
                    <div class="doc_video">
                        <img src="https://i.postimg.cc/8kXsHSFK/related-posts.jpg">
                    </div>
                </div>
                <div class="support_area">
                    <div class="single_support">
                        <h4 class="support_title">Freelance Work</h4>
                        <div class="support_btn">
                            <a href="https://www.fiverr.com/users/devs_zak/" target="_blank" style="background: #1DBF73">@Fiverr</a>
                            <a href="https://www.upwork.com/freelancers/~010af183b3205dc627" target="_blank" style="background: #14A800">@UpWork</a>
                        </div>
                    </div>
                    <div class="single_support">
                        <h4 class="support_title">Get Support</h4>
                        <div class="support_btn">
                            <a href="https://makegutenblock.com/contact" target="_blank" style="background: #002B42">Contact</a>
                            <a href="mailto:zbinsaifullah@gmail.com" style="background: #EA4335">Send Mail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
