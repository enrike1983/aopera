<?php
/*
Template Name: Generic
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
                <div class="col-md-12">
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>
                        <?php echo the_content() ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>

        <?php get_sidebar() ?>

    </div>
    <hr>
</div> <!-- /container -->
<?php get_footer(); ?>
