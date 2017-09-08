<script>
  jQuery(document).ready(function ($) {
    "use strict";
    $('#projectList').perfectScrollbar();
  });
</script>

<? $query = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => -1, 'orderby'=> 'menu_order','order' => 'asc')); ?>

<div class="sidebar-wrap">
  <div id="projectList" class="project-sidebar">
    <? if( $query->have_posts() ): ?>
      <? $i = 1; ?>
      <ul class="projects">
      <? while ($query->have_posts()) : $query->the_post(); ?>
        <li><?php include 'thumb-w-info-post-output.php'; ?></li>
        <? $i++; ?>
      <? endwhile; ?>
      </ul>
    <? endif; ?>
  </div>
</div>

<div class="overlay">
</div>