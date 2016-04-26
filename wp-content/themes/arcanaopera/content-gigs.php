<h3><?php the_title() ?></h3>

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
));

if($gig_query->have_posts()):
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
    )
));

if($past_gig_query->have_posts()): ?>
<div class="past-concert-container">
    <h3>PAST CONCERTS</h3>

    <?php while($past_gig_query->have_posts()): $past_gig_query->the_post(); ?>

        <?php echo get_post_meta(get_the_ID(), 'data_editoriale_day', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_month', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_year', true) ?> - <?php echo get_the_title() ?><br/>

    <?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); ?>