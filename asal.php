<?php
/**
 * Settings documentation view/template.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @package PostGallery
 * @version 2.2.2
 */ 
?>
<section id="documentation"
    <?php if ( $tab != 'docs' ) : ?>style="display: none;"<?php endif ?>
>
    <h1 id="top"><?php _e( 'Documentation', 'simple-post-gallery' ) ?></h1>

    <div>
        <ol>
            <li>
                <a href="#" class="scroll-to" data-marker="#usage"><?php _e( 'Usage', 'simple-post-gallery' ) ?></a>
                <ol>
                    <li>
                        <a href="#" class="scroll-to" data-marker="#the-gallery"><?php _e( 'The gallery', 'simple-post-gallery' ) ?></a>
                    </li>
                    <li>
                        <a href="#" class="scroll-to" data-marker="#shortcode"><?php _e( 'Shortcode', 'simple-post-gallery' ) ?></a>
                    </li>
                    <li>
                        <a href="#" class="scroll-to" data-marker="#in-templates"><?php _e( 'In templates', 'simple-post-gallery' ) ?></a>
                    </li>
                    <li>
                        <a href="#" class="scroll-to" data-marker="#as-data"><?php _e( 'As data', 'simple-post-gallery' ) ?></a>
                    </li>
                </ol>
            </li>
            <li>
                <a href="#" class="scroll-to" data-marker="#customization"><?php _e( 'Customization', 'simple-post-gallery' ) ?></a>
                <ol>
                    <li>
                        <a href="#" class="scroll-to" data-marker="#templates"><?php _e( 'Templates', 'simple-post-gallery' ) ?></a>
                    </li>
                    <li>
                        <a href="#" class="scroll-to" data-marker="#example"><?php _e( 'Example', 'simple-post-gallery' ) ?></a>
                    </li>
                </ol>
            </li>
            <li>
                <a href="#" class="scroll-to" data-marker="#settings"><?php _e( 'Settings', 'simple-post-gallery' ) ?></a>
            </li>
        </ol>
    </div>

    <div class="container">

        <div id="usage">
            <h2>
                <?php _e( 'Usage', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h2>

            <h3 id="the-gallery">
                <?php _e( 'The gallery', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h3>
            <p><?php _e( 'A gallery metabox will appear on each post, within the enabled post types (settings).', 'simple-post-gallery' ) ?></p>
            <p>
                <img src="<?php echo assets_url( 'images/documentation/customization-gallery1.jpg', __FILE__ )?>" alt="gallery 2"/>
            </p>
            <p><?php _e( 'Click the "Add Image" button to selected and add images to the gallery.', 'simple-post-gallery' ) ?></p>
            <p>
                <img src="<?php echo assets_url( 'images/documentation/customization-gallery2.jpg', __FILE__ )?>" alt="gallery 2"/>
            </p>
            <p><?php _e( 'Once added, you can drag-and-drop the images to sort their display order. Finally click the post\'s publish button to save changes.', 'simple-post-gallery' ) ?></p>
            <p>
                <img src="<?php echo assets_url( 'images/documentation/customization-gallery3.jpg', __FILE__ )?>" alt="gallery 3"/>
            </p>

            <h3 id="shortcode">
                <?php _e( 'Shortcode', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h3>
            <p><?php _e( 'Add the following shortcode within the content of a post to display its gallery (the gallery should at least have 1 image):', 'simple-post-gallery' ) ?></p>
            <pre>
                [post_gallery]
            </pre>
            <p><?php _e( 'Use the <b>id</b> attribute within the shortcode to display the gallery of a specific post (in the example below, 199 would be the post ID):', 'simple-post-gallery' ) ?></p>
            <pre>
                [post_gallery id=199]
            </pre>

            <h3 id="in-templates">
                <?php _e( 'In templates', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h3>
            <p><?php _e( 'The following function can be used within your template to display the gallery of a post:', 'simple-post-gallery' ) ?></p>
            <code>
                &lt;?php the_gallery( $post_id ) ?&gt;
            </code>
            <p><?php _e( 'Parameter <strong>$post_id</strong> is optional. If no ID is passed by, then the function will use the current post in display:', 'simple-post-gallery' ) ?></p>
            <code>
                &lt;?php the_gallery() ?&gt;
            </code>

            <h3 id="as-data">
                <?php _e( 'As data', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h3>
            <p><?php _e( 'The following function can be used to get the gallery of a post:', 'simple-post-gallery' ) ?></p>
            <code>
                &lt;?php $gallery = get_gallery( $post_id ) ?&gt;
            </code>
            <p><?php _e( 'Parameter <strong>$post_id</strong> is optional. If no ID is passed by, then the function will use the current post in display:', 'simple-post-gallery' ) ?></p>
            <code>
                &lt;?php $gallery = get_gallery() ?&gt;
            </code>
            <p><?php _e( 'Use a foreach statement to loop within the gallery\'s attachments:', 'simple-post-gallery' ) ?></p>
            <script src="https://gist.github.com/10quality-info/8a6fea2c09a4ccc6da7d03bd4e43dff6.js"></script>

            <h4 id="attachment-object">
                <?php _e( 'Attachment object', 'simple-post-gallery' ) ?>
            </h4>
            <p><?php _e( '<strong>get_gallery()</strong> returns an array of attachment objects, each attachment has the following properties:', 'simple-post-gallery' ) ?></p>
            <p>
                <ul>
                    <li>
                        <?php _e( '<strong>alt</strong>: Alternative text set for the image.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>caption</strong>: Caption text set for the image.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>url</strong>: Image original url.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>edit_url</strong>: Image url with edit resolution (170x65).', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>thumb_url</strong>: Image url with thumbnail resolution (set at wordpress\' media settings).', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>medium_url</strong>: Image url with medium resolution (set at wordpress\' media settings).', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>large_url</strong>: Image url with large resolution (set at wordpress\' media settings).', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>path</strong>: Path to where the image is located.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>is_video</strong>: Flag that indicates if attachment is a video.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>embed</strong>: Video\'s embed iframe.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>video_id</strong>: Video provider\'s ID.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>video_url</strong>: Video url.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>video_provider</strong>: Name of the video provider.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>embed_size</strong>: Standard or any other custom size.', 'simple-post-gallery' ) ?>
                    </li>
                    <li>
                        <?php _e( '<strong>get_res($width, $height, $crop)</strong>: Method to obtain a the image url at a specific resolution.', 'simple-post-gallery' ) ?>
                    </li>
                </ul>
            </p>
        </div>

        <div id="customization">
            <h2>
                <?php _e( 'Customization', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h2>
            <p>
                <?php _e( '<strong>Post Gallery</strong> lets you customize all its templates (views) in a very friendly way.', 'simple-post-gallery' ) ?> 
                <?php _e( 'Just copy a selected template (view) file from:', 'simple-post-gallery' ) ?>
            </p>
            <p>
                <code>
                    wp-content/plugins/simple-post-gallery/assets/views
                </code>
            </p>
            <p>
                <?php _e( 'Into your theme\'s folder:', 'simple-post-gallery' ) ?>
            </p>
            <p>
                <code>
                    wp-content/themes/[your-theme-name]/views
                </code>
            </p>

            <h3 id="templates">
                <?php _e( 'Templates', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h3>
            <p>
                <?php _e( 'Locate and copy the wanted files inside the plugin\'s folder:', 'simple-post-gallery' ) ?>
            </p>
            <p>
                <img src="<?php echo assets_url( 'images/documentation/customization-example1.jpg', __FILE__ )?>" alt="example 1"/>
            </p>
            <p>
                <?php _e( 'Then we paste them over (with the same path structure) into our theme:', 'simple-post-gallery' ) ?>
            </p>
            <p>
                <img src="<?php echo assets_url( 'images/documentation/customization-example2.jpg', __FILE__ )?>" alt="example 2"/>
            </p>

            <h3 id="example">
                <?php _e( 'Example', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h3>
            <p>
                <?php _e( 'In the following example, we want to customize the gallery displayed using the <strong>shortcode</strong> or <strong>the_gallery()</strong> function.', 'simple-post-gallery' ) ?>
                <?php _e( 'Before customizing, is recommended to un-enqueue the default scripts and styles.', 'simple-post-gallery' ) ?>
            </p>
            <p>
                <?php _e( 'The default template located at file <strong>gallery.php</strong> looks like:', 'simple-post-gallery' ) ?>
            </p>
            <p>
                <script src="https://gist.github.com/10quality-info/0b904621a5a819a09e24c5a745861915.js"></script>
            </p>
            <p>
                <?php _e( 'A modified version, where lightbox is removed and medium image size resolution is used, would look like:', 'simple-post-gallery' ) ?>
            </p>
            <p>
                <script src="https://gist.github.com/10quality-info/11838be4dd85f0d5608349b035287266.js"></script>
            </p>
            <p>
                <?php _e( 'This customization will take effect in your entire wordpress setup.', 'simple-post-gallery' ) ?>
            </p>
        </div>

        <div id="settings">
            <h2>
                <?php _e( 'Settings', 'simple-post-gallery' ) ?>
                <?php $view->show( 'plugins.post-gallery.admin.settings-doc-backtotop' ) ?>
            </h2>

            <h3 id="resolutions">
                <?php _e( 'Image resolutions', 'simple-post-gallery' ) ?>
            </h3>
            <p>
                <?php echo sprintf(
                    __( 'Configure your image resolution (sizes) settings at <a href="%s">Settings > Media</a>. You can also use <strong>get_res()</strong> method on each attachment.', 'simple-post-gallery' ),
                    admin_url( 'options-media.php' )
                )?>
            </p>
        </div>

    </div>

    <div class="credits text-center">
        <p><?php _e( 'Brought to you by', 'simple-post-gallery' ) ?> </p>
        <a href="http://www.10quality.com">
            <img src="<?php echo assets_url( 'images/10quality-logo-x65.png', __FILE__ )?>"
                alt="10 Quality - Software Development Studio"
            />
        </a>
    </div>

</section>
