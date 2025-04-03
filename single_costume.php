<?php
get_header();

if (has_category('featured')) :
?>

<div class="custom-single-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="custom-single-header">
            <h1 class="custom-single-title"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="custom-featured-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="custom-single-content">
            <?php the_content(); ?>
        </div>
    </article>
</div>

<style>
.custom-single-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.custom-single-header {
    text-align: center;
}

.custom-single-title {
    font-size: 2em;
    color: #333;
}

.custom-featured-image img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.custom-single-content {
    font-size: 1.1em;
    line-height: 1.6;
    color: #555;
}
</style>

<?php
endif;

get_footer();
?>
