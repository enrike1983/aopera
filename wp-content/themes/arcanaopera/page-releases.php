<?php
/*
Template Name: Discography
*/
?>
<?php get_header(); ?>

<?php $releases_query = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'releases',
    'meta_key' => 'data_editoriale',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
));
?>

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
                    <?php
                    if($releases_query->have_posts()):
                        while($releases_query->have_posts()): $releases_query->the_post(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                                    <img width="300" src="<?php echo $url; ?>" />
                                </div>
                                <div class="col-md-6">
                                    <h4><?php the_title() ?></h4>
                                    <?php the_content() ?>
                                </div>
                            </div>
                            <hr>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>

        <?php get_sidebar() ?>

    </div>
    <hr>
</div> <!-- /container -->
<?php get_footer(); ?>
