<?
/*
* Single Custom Post Page
*/
?>

<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>

<div class="container">
  <?php //get_template_part( 'loop', 'single' ); ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <div class="project-intro">
    <p class="year"><?php the_time('Y') ?></p>
    <h1><? the_title(); ?></h1>
    <p class="services"><!--Categories no link-->          
      <?php
        $taxonomy_ar = get_the_terms($post->ID, 'custom_cats'); // Change it taxonomy name
        $before = '';
        $separator = ' / ';
        $output = '';
        if ($taxonomy_ar) {
          foreach ($taxonomy_ar as $taxonomy_term) {
            $term_link = get_term_link( $taxonomy_term, 'species' );
            $output .= '<a class="fade" href="' . $term_link . '"  title="' . esc_attr( sprintf( __( "View all posts in %s" ), $taxonomy_term->name ) ) . '">' . $taxonomy_term->name . '</a>'.$separator;
          }
        echo($before);
        echo trim($output, $separator);
        }
      ?>
    </p>
  </div>  
          
    <?php if(get_field('project_images')): ?>
      <ul class="project">
      
          <?php while(the_repeater_field('project_images')): ?>
            <?php $media_type = get_sub_field('media_type'); ?>
            
            <?php if ( $media_type == "image" ) {?>
              <?php $image_id = get_sub_field('project_image'); ?>
              <?php $type_of_image = get_sub_field('image_layout'); ?>
              <?php $device = get_sub_field('device_or_bg'); ?>
              <?php $size = get_sub_field('image_crop'); ?>
              <?php $image = wp_get_attachment_image_src( $image_id, $size );
              // url = $image[0];
              // width = $image[1];
              // height = $image[2];
              ?>
              <?php $imageSm = wp_get_attachment_image_src( $image_id, 'sm' ); ?>
              <?php $imageMd = wp_get_attachment_image_src( $image_id, 'md' ); ?>
              <?php $imageLg = wp_get_attachment_image_src( $image_id, 'lg' ); ?>
    	        <li class="<?php echo $type_of_image; ?> <?php echo $device; ?>">
                <div>
                  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                </div>
              </li>
            <?php } ?>
            
            <?php if ( $media_type == "video" ) {?>
    	       <li class="video">
    	         <div class="videoWrapper">
                 <iframe src="//player.vimeo.com/video/<?php the_sub_field('vimeo_id'); ?>?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=<?php the_sub_field('project_color'); ?>" width="1500" height="844" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
               </div>
             </li>
            <?php } ?>        
          <?php endwhile; ?>
          
      </ul>
      <div class="project-desc"> 
        <p class="services"><!--Categories no link-->          
          <?php
            $taxonomy_ar = get_the_terms($post->ID, 'custom_cats'); // Change it taxonomy name
            $before = '';
            $separator = ' / ';
            $output = '';
            if ($taxonomy_ar) {
              foreach ($taxonomy_ar as $taxonomy_term) {
                $term_link = get_term_link( $taxonomy_term, 'species' );
                $output .= '<a class="fade" href="' . $term_link . '"  title="' . esc_attr( sprintf( __( "View all posts in %s" ), $taxonomy_term->name ) ) . '">' . $taxonomy_term->name . '</a>'.$separator;
              }
            echo($before);
            echo trim($output, $separator);
            }
          ?>
        
        </p>
        
        <div class="desc"><?php the_content(); ?></div>
        
        <?php if(get_field('project_link')): ?>
          <?php $project_link = (get_field('project_link')); ?>
            
          <p><a class="project-link" target="_blank" href="<?php echo $project_link; ?>"><?php echo $project_link; ?></a></p>
          
        <?php endif; ?> 
              
        <?php if(get_field('credits')): ?>
          <ul class="credits">
          
            <?php while(the_repeater_field('credits')): ?>
              <?php $label = (get_sub_field('label')); ?>
              <?php $contributor = (get_sub_field('name')); ?>
              <?php if(get_sub_field('name')): ?>
                  
                  <li><span class="info-label"><?php echo $label; ?></span>
                  
                  <?php if(get_sub_field('credit_link')): ?>
                    <a href="<?php the_sub_field('credit_link'); ?>" target="_blank">
                  <?php endif; ?>
                  
                    <?php echo $contributor; ?>
                  
                  <?php if(get_sub_field('contributor_link')): ?>
                    &rarr;</a>
                  <?php endif; ?>
                  </li>
                
              <?php endif; ?> 
            <?php endwhile; ?>
          
          </ul>
        <?php endif; ?>
      </div>

    <?php endif; ?>

<?php endwhile; // end of the loop. ?>

</div>

<? 
$post_id = get_the_ID();
$queryRand = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => 4, 'orderby'=> 'rand','order' => 'asc', 'post__not_in' => array($post_id))); ?>

<div class="other-projects blk">
  <div class="container">
    <? if( $queryRand->have_posts() ): ?>
      <? $i = 1; ?>
      <h2>Other Projects</h2>
      <ul class="thumbs fourUp">
      <? while ($queryRand->have_posts()) : $queryRand->the_post(); ?>
        <li><?php include 'assets/includes/thumb-post-output.php'; ?></li>
        <? $i++; ?>
      <? endwhile; ?>
      </ul>
    <? endif; ?>
  </div>
  <div class="blk">
    <nav class="next-prev">
      <a class="fade work view-all" href="<?php echo home_url( '/' ); ?>/portfolio" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <div class="icon block"><span class="one"></span><span class="two"></span></div>All Projects
      </a>
    </nav>
  </div>
</div>

<?php get_footer(); ?>
<?php include('assets/includes/foot.php'); ?>

</body>
</html>