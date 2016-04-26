<?php
/*
Template Name: Generic
*/
?>

<?php get_header(); ?>
<div class="row main-content">
    <aside id="sidebar" class="large-8 columns">
        <?php if ( have_posts() ) : ?>

            <?php do_action('foundationPress_before_content'); ?>

            <?php get_template_part( 'content', get_post_format() ); ?>

            <?php do_action('foundationPress_before_pagination'); ?>

        <?php endif;?>
    </aside>
    <div class="large-4 columns" role="main">
        <?php echo get_template_part('parts/right-column') ?>
    </div>
</div>
<?php get_footer(); ?>
