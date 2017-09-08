<!--begin post-->

<a class="fade" href="<? the_permalink(); ?>">
  <div class="thumb-wrap">
    <?php 
      if ( has_post_thumbnail() ) { 
      the_post_thumbnail( 'thumb-size' ); 
      } 
    ?>
    <?php if (get_field('hover_image')) {?>
      <?php $image_id = get_field('hover_image'); ?>
      <?php $size = 'thumb-size' ?>
      <?php $image = wp_get_attachment_image_src( $image_id, $size );
      // url = $image[0];
      // width = $image[1];
      // height = $image[2];
      ?>
      <img class="hover-image" src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
    <?php } ?>
  </div>
  <div class="thumb-info">
  <h6><? the_title(); ?></h6>
  
  <!--Categories no link-->
    <?php // Post categories with link
      $categories = get_the_category();
      $before = '';
      $separator = ', ';
      $output = '';
      if($categories){
        foreach($categories as $category) {
          $output .= ''.$category->cat_name.''.$separator;
        }
        echo '<p>';
        echo($before);
        echo trim($output, $separator);
        echo '</p>';
      }
    ?>

    <?php
      $taxonomy_ar = get_the_terms($post->ID, 'custom_cats'); // Change it taxonomy name
      $before = '';
      $separator = ', ';
      $output = '';
      if ($taxonomy_ar) {
        foreach ($taxonomy_ar as $taxonomy_term) {
          $term_link = get_term_link( $taxonomy_term, 'species' );
          $output .= '' . $taxonomy_term->name . ''.$separator;
        }
        echo '<p>';
        echo($before);
        echo trim($output, $separator);
        echo '</p>';
      }
    ?>
  </div>
</a>