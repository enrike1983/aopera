<h3><?php the_title() ?></h3>

<?php $releases_query = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'photos',
    'meta_key' => 'data_editoriale',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
));

if($releases_query->have_posts()):
    while($releases_query->have_posts()): $releases_query->the_post(); ?>

        <h4 class="gallery-title"><?php the_title() ?></h4>
        <?php the_content() ?>

    <?php
    endwhile;
endif;
wp_reset_query();
?>