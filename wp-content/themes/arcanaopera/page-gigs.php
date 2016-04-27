<?php
/*
Template Name: Gigs
*/
?>

<?php get_header(); ?>
<?php $gig_query = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'gigs',
    'meta_key' => 'data_editoriale',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'relation' => 'AND',
    'meta_query' => array(
        'key' => 'data_editoriale',
        'value' => date('YmdHi'),
        'compare' => '>='
    )
)); ?>
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
                    <?php if($gig_query->have_posts()):
                        while($gig_query->have_posts()): $gig_query->the_post(); ?>

                            <?php echo get_post_meta(get_the_ID(), 'data_editoriale_day', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_month', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_year', true) ?> - <?php echo get_the_title() ?><br/>

                            <?php
                        endwhile;
                    else: ?>

                        No gig planned at this time.

                    <?php endif;
                    wp_reset_query();
                    ?>

                    <?php $past_gig_query = new WP_Query(array(
                        'post_status' => 'publish',
                        'post_type' => 'gigs',
                        'meta_key' => 'data_editoriale',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                        'relation' => 'AND',
                        'meta_query' => array(
                            'key' => 'data_editoriale',
                            'value' => date('YmdHi'),
                            'compare' => '<'
                        ),
                        'posts_per_page' => 10000
                    ));

                    ?>
                    <hr>
                    <?php if($past_gig_query->have_posts()): ?>
                        <h3 class="grey-header">PAST CONCERTS</h3>

                        <?php while($past_gig_query->have_posts()): $past_gig_query->the_post(); ?>

                            <?php echo get_post_meta(get_the_ID(), 'data_editoriale_day', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_month', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_year', true) ?> - <?php echo get_the_title() ?><br/>

                        <?php endwhile; ?>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
        </div>

        <?php get_sidebar() ?>

    </div>
    <hr>
</div> <!-- /container -->
<?php get_footer(); ?>

