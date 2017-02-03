
<?php $gig_query = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'gigs',
	'meta_key' => 'data_editoriale',
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
	'relation' => 'AND',
	'meta_query' => array(
		'key' => 'data_editoriale',
		'value' => date('YmdHi'),
		'compare' => '>='
	),
	'posts_per_page' => 5
)); ?>

<div class="col-md-4 ">
	<div class="row">
		<header class="col-lg-12 section-header">
			<h2>ONLINE STORE</h2>
			<hr>
		</header>
	</div>
	<div class="row">
		<div class="col-md-12">
			<img style="width:100%" src="<?php echo get_bloginfo('template_directory')?>/img/de-noir/de-noir.jpg"/>
		</div>
	</div>
	<div class="row">
		<header class="col-lg-12 section-header">
			<h2>TOURDATES</h2>
			<hr>
		</header>
	</div>
	<?php if($gig_query->have_posts()): ?>
		<?php
		while($gig_query->have_posts()): $gig_query->the_post(); ?>

			<div class="row tour-element">
				<div class="col-xs-3">
					<div class="tour-left">
						<div class="tour-month"><?php echo get_post_meta(get_the_ID(), 'data_editoriale_month', true) ?></div>
						<div class="tour-day"><?php echo get_post_meta(get_the_ID(), 'data_editoriale_day', true) ?></div>
						<div class="tour-year"><?php echo get_post_meta(get_the_ID(), 'data_editoriale_year', true) ?></div>
					</div>
				</div>
				<div class="col-xs-9">
					<div class="tour-right">
						<h5 class="location">
							<?php echo get_the_title() ?>
						</h5>
						<div class="date">
							<?php echo get_the_content() ?>
						</div>
                        <?php if(get_the_excerpt()): ?>
                            <div class="readmore">
                                <a target="_blank" href="<?php echo get_the_excerpt()?>">Details / Tickets</a>
                            </div>
                        <?php endif?>
					</div>
				</div>
			</div>

			<?php
		endwhile;
		?>
	<?php endif; ?>
	<?php wp_reset_query();?>
	<div class="row">
		<header class="col-lg-12 section-header">
			<h2>
				LISTEN
			</h2>
			<hr>
			<iframe src="https://embed.spotify.com/?uri=https://play.spotify.com/album/3Ac0F0U6d8kg28n5k5VNiu" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
		</header>
	</div>
	<div class="row">
		<header class="col-lg-12 section-header">
			<h2>SOCIAL</h2>
			<hr>
		</header>
		<div class="col-md-12">
			<div class="fb-page"
				 data-href="https://www.facebook.com/alexanderwyrd.arcanaopera"
				 data-width="300"
				 data-hide-cover="false"
				 data-show-facepile="false"
				 data-show-posts="false"></div>
			<!-- <div class="fb-page" data-href="https://www.facebook.com/alexanderwyrd.arcanaopera/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/alexanderwyrd.arcanaopera/"><a href="https://www.facebook.com/alexanderwyrd.arcanaopera/">Arcana Opera - A. W.</a></blockquote></div></div> -->
		</div>
	</div>
</div>