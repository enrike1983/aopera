<?php get_header(); ?>
<div class="row main-content">
	<aside id="sidebar" class="large-8 columns">
		<?php if ( have_posts() ) : ?>

			<?php do_action('foundationPress_before_content'); ?>

			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>

					</header>
					<?php do_action('foundationPress_post_before_entry_content'); ?>
					<div class="entry-content">

						<?php if ( has_post_thumbnail() ): ?>
							<div class="row">
								<div class="column">
									<?php the_post_thumbnail('', array('class' => 'th')); ?>
								</div>
							</div>
						<?php endif; ?>

						<?php the_content(); ?>
					</div>
					<footer>
						<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
						<p><?php the_tags(); ?></p>
					</footer>
					<?php do_action('foundationPress_post_before_comments'); ?>
					<?php comments_template(); ?>
					<?php do_action('foundationPress_post_after_comments'); ?>
				</article>
			<?php endwhile;?>

			<?php do_action('foundationPress_before_pagination'); ?>
			<?php FoundationPress_entry_meta(); ?>
		<?php endif;?>
	</aside>
	<div class="large-4 columns" role="main">
		<?php echo get_template_part('parts/right-column') ?>
	</div>
</div>
<?php get_footer(); ?>
