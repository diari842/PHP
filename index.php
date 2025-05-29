<?php get_header(); ?>
<section class="hero">
  <div class="container">
    <h1>Discover Local Events</h1>
    <p>Find out what's happening around you. Music, culture, food and more.</p>
  </div>
</section>

<section class="filters">
  <div class="container">
    <form method="get" id="event-filter-form">
      <select name="event_category">
        <option value="">All Categories</option>
        <?php
        $terms = get_terms(['taxonomy' => 'event_category', 'hide_empty' => false]);
        foreach ($terms as $term) {
          echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
        ?>
      </select>
      <input type="text" name="event_location" placeholder="Location">
      <input type="submit" value="Filter">
    </form>
  </div>
</section>

<section id="events">
  <div class="container">
    <h2>Latest Events</h2>
    <div class="event-list">
      <?php
      $args = [
        'post_type' => 'event',
        'posts_per_page' => 9,
        'orderby' => 'date',
        'order' => 'DESC'
      ];

      if (!empty($_GET['event_category'])) {
        $args['tax_query'] = [[
          'taxonomy' => 'event_category',
          'field' => 'slug',
          'terms' => $_GET['event_category']
        ]];
      }

      if (!empty($_GET['event_location'])) {
        $args['meta_query'][] = [
          'key' => 'event_location',
          'value' => sanitize_text_field($_GET['event_location']),
          'compare' => 'LIKE'
        ];
      }

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
          get_template_part('template-parts/event-card');
        endwhile;

        the_posts_pagination([
          'mid_size' => 2,
          'prev_text' => __('« Prev', 'citypulse'),
          'next_text' => __('Next »', 'citypulse'),
        ]);

        wp_reset_postdata();
      else :
        echo '<p>No events found.</p>';
      endif;
      ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
