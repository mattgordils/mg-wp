<div class="push"></div>
</div><!--close #content-->

<footer class="blk">
  <div class="container">

    <div class="left">
      <!--<small class="copyright">&copy <?php //echo date('Y'); ?> <?php //bloginfo( 'name' ); ?></small>-->
      <?php the_field('town_state', 'options'); ?>
    </div>
    
    <div class="middle">
      <a href="mailto:<?php the_field('email', 'options'); ?>"><?php the_field('email', 'options'); ?></a>
      <?php if (get_field('resume', 'options')): ?>
        <span class="separate">| </span><a class="resume" href="<?php the_field('resume', 'options'); ?>" target="_blank">Resume</a>
      <? endif; ?>
    </div>
    
    <div class="right">
      <div class="social">
        <?php if(get_field('social_media', 'option')): ?>
        <ul>
          <?php while(the_repeater_field('social_media', 'option')): ?>
            <?php if(get_sub_field('link')): ?>
            <li><a href="<?php the_sub_field('link'); ?>" target="_blank" title="<?php the_sub_field('name'); ?>">
              <?php if (is_page('info')) { ?>
                <img src="<?php the_sub_field('icon_white'); ?>" alt="<?php the_sub_field('name'); ?>" width="40" height="40" />
              <?php } else { ?>
                <img src="<?php the_sub_field('icon_white'); ?>" alt="<?php the_sub_field('name'); ?>" width="40" height="40" />
              <?php } ?>
            </a></li>
            <?php endif; ?>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </div><!--end social-->
    </div>
    
  </div>
</footer>

<?php wp_footer(); ?>