<?php
/*
Template Name: Generic - 2 columns img left
*/
?>
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
                <?php if (have_posts()) : while (have_posts()) : the_post();?>
                    <div class="col-md-6">
                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                        <img width="300" src="<?php echo $url; ?>" />
                    </div>
                    <div class="col-md-6">
                        <?php echo the_content() ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php get_template_part('_band-list') ?>
                </div>
            </div>
        </div>

        <?php get_sidebar() ?>

    </div>
    <hr>
</div> <!-- /container -->
<?php get_footer(); ?>
