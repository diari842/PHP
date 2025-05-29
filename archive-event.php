<?php get_header(); ?>

<h2>Event Archive</h2>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('template-parts/event-card');
    endwhile;
else :
    echo '<p>No events available.</p>';
endif;
?>

<?php get_footer(); ?>
