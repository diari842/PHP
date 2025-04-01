<?php get_header(); ?>

<div class="primary">
    <div class="main"> 
        <div class="container"> 
        <article>
        <article>
                                                <h2><?php the_title(); ?></h2>
                                                <?php the_post_thumbnail(array(275,275)); ?>
                                                <div class="meta-info">
                                                    <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link();?></p>
                                                    <p>Catgeries: <?php the_category(); ?> </p>
                                                    <p> <?php the_tags(); ?></p>
                                                    
                                                </div>
                                                <?php the_content(); ?>
                                            </article>
                                        <?php
                                        
        <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(275,275)); ?></a> 
    </div>
</div>

<?php get_header(); ?>