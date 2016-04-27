<?php get_header(); ?>
    <div class="container-fluid stripes">
        <div class="row">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active"> <img src="<?php echo get_bloginfo('template_directory')?>/img/carousel/1.jpg" style="width:100%" alt="First slide">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $news_query = new WP_Query(array(
        'paged' => $paged,
        'post_status' => 'publish',
        'post_type' => 'news',
        'meta_key' => 'data_editoriale',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => 5
    )); ?>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <header class="col-lg-12 section-header">
                        <h2>LATEST NEWS</h2>
                        <hr>
                    </header>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if($news_query->have_posts()):
                            while($news_query->have_posts()): $news_query->the_post();
                                ?>

                                <div class="news-list-el">
                                    <div class="row">
                                        <div class="col-md-12 news-title">
                                            <?php echo get_the_title() ?>
                                        </div>
                                        <div class="col-md-12 news-date">
                                            <?php echo get_post_meta(get_the_ID(), 'data_editoriale_day', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_month', true) ?>.<?php echo get_post_meta(get_the_ID(), 'data_editoriale_year', true) ?>
                                        </div>
                                        <div class="col-md-12 news-description">
                                            <?php echo get_the_content() ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                            <?php
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>

            <?php get_sidebar() ?>

        </div>
        <hr>
    </div> <!-- /container -->
<?php get_footer() ?>