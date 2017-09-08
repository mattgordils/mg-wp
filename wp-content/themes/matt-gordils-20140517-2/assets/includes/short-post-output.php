<!--begin post-->

  <a class="fade" href="<? the_permalink(); ?>">
    <?php 
      if ( has_post_thumbnail() ) { 
      the_post_thumbnail( 'thumb-size' ); 
      } 
    ?>
  </a>
  <a class="fade" href="<? the_permalink(); ?>">
    <h2><? the_title(); ?></h2>
  </a>
  
  <p><!--Categories no link-->
    <?php // Post categories with link
      $categories = get_the_category();
      $before = 'Categorized as ';
      $separator = ', ';
      $output = '';
      if($categories){
        foreach($categories as $category) {
          $output .= '<a class="fade" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
        }
      echo($before);
      echo trim($output, $separator);
      }
    ?>
    <?php // Post tags with link
      $posttags = get_the_tags();
      $before = 'and tagged as ';
      $separator = ', ';
      $output = '';
      if ($posttags) {
        foreach($posttags as $tag) {
          $output .= '<a class="fade" href="'.get_tag_link( $tag->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
        }
      echo($before);
      echo trim($output, $separator);
      }
    ?>

    <?php
      $taxonomy_ar = get_the_terms($post->ID, 'custom_cats'); // Change it taxonomy name
      $before = 'The custom catergories are ';
      $separator = ', ';
      $output = '';
      if ($taxonomy_ar) {
        foreach ($taxonomy_ar as $taxonomy_term) {
          $term_link = get_term_link( $taxonomy_term, 'species' );
          $output .= '<a class="fade" href="' . $term_link . '"  title="' . esc_attr( sprintf( __( "View all posts in %s" ), $taxonomy_term->name ) ) . '">' . $taxonomy_term->name . '</a>'.$separator;
        }
      echo '<p>';
      echo($before);
      echo trim($output, $separator);
      echo '</p>';
      }
    ?>
  </p>
  <p><?php the_time('l, F jS, Y') ?></p>

  <?php the_excerpt(); ?>