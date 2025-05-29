<?php get_header(); ?>
<section class="single-event">
  <div class="container">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        $date = get_post_meta(get_the_ID(), 'event_date', true);
        $time = get_post_meta(get_the_ID(), 'event_time', true);
        $location = get_post_meta(get_the_ID(), 'event_location', true);
        $cost = get_post_meta(get_the_ID(), 'event_cost', true);
        $lat = get_post_meta(get_the_ID(), 'event_latitude', true);
        $lng = get_post_meta(get_the_ID(), 'event_longitude', true);
    ?>
    <article>
      <h1><?php the_title(); ?></h1>
      <div class="event-meta">
        <p><strong>Date:</strong> <?php echo esc_html($date); ?></p>
        <p><strong>Time:</strong> <?php echo esc_html($time); ?></p>
        <p><strong>Location:</strong> <?php echo esc_html($location); ?></p>
        <p><strong>Cost:</strong> <?php echo esc_html($cost); ?></p>
      </div>
      <div class="event-content">
        <?php the_content(); ?>
      </div>
      <?php if ($lat && $lng): ?>
      <div class="event-map">
        <div id="event-map" style="width: 100%; height: 400px;"></div>
        <script>
          function initMap() {
            var location = { lat: parseFloat('<?php echo $lat; ?>'), lng: parseFloat('<?php echo $lng; ?>') };
            var map = new google.maps.Map(document.getElementById('event-map'), {
              zoom: 14,
              center: location
            });
            new google.maps.Marker({
              position: location,
              map: map
            });
          }
        </script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
        </script>
      </div>
      <?php endif; ?>
    </article>
    <?php endwhile; endif; ?>
  </div>
</section>
<?php get_footer(); ?>
