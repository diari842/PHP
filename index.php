<?php get_header(); ?>

<main>
    <h1>Welcome to my First Theme</h1>
    <?php
    if(have_posts()):
        while (have_posts()) : the_post();
            the_title('<h2>','</h2>');
            the_content();
        endwhile;
    else:
        echo'<p> No content availabe.</p>';
    endif;
    ?>

</main>

<?php get_footer(); ?>