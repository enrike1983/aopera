<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php do_action('foundationPress_before_content'); ?>

	<?php get_template_part( 'content-home', get_post_format() ); ?>

	<?php do_action('foundationPress_before_pagination'); ?>

<?php endif;?>
<?php get_footer(); ?>

