<h3><?php the_title() ?></h3>

<?php $releases_query = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'releases',
    'meta_key' => 'data_editoriale',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
));

if($releases_query->have_posts()):
    while($releases_query->have_posts()): $releases_query->the_post(); ?>

        <div class="row release-container-block">
            <div class="small-6 large-5 columns">
                <?php $image_src = wp_get_attachment_image_src( the_post_thumbnail( get_the_ID() ), 'featured-thumbnail' ); ?>
                <img src="<?php echo $image_src ?>" />
            </div>
            <div class="small-6 large-7 columns">
                <h4><?php the_title() ?></h4>
                <?php the_content() ?>
            </div>
        </div>

    <?php
    endwhile;
endif;
wp_reset_query();
?>