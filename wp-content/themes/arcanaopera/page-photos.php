<?php
/*
Template Name: Photos
*/
?>

<?php $releases_query = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'photos',
    'meta_key' => 'data_editoriale',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
)); ?>

<?php get_header(); ?>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <header class="col-lg-12 section-header">
                    <h2><?php the_title() ?></h2>
                    <hr>
                </header>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <?php if($releases_query->have_posts()):
                    while($releases_query->have_posts()): $releases_query->the_post(); ?>

                    <h4 class="gallery-title"><?php the_title() ?></h4>
                    <?php the_content() ?>

                    <?php
                    endwhile;
                    endif;
                    wp_reset_query(); ?>
                </div>
            </div>
        </div>

        <?php get_sidebar() ?>

    </div>
    <hr>
</div> <!-- /container -->
<?php get_footer(); ?>
