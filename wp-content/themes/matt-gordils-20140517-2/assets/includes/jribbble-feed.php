<div class="other-projects blk">
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.jribbble-1.0.1.js"></script>
  <hr class="container">
  <h2>Work in Progress</h2>
  <div class="container">
    <ul id="shotsByPlayerId" class="thumbs fourUp"></ul>
  </div>
  <script>
      var callback = function (playerShots) {
          var html = '';
  
          $('h2 b').text(playerShots.shots[0].player.name);
  
          $.each(playerShots.shots, function (i, shot) {
              html += '<li class="thumb"><!--<h3>' + shot.title + '</h3>-->';
              html += '<a href="' + shot.url + '" target="_blank">';
              html += '<img src="' + shot.image_url + '" ';
              html += 'alt="' + shot.title + '"></a></li>';
          });
  
          $('#shotsByPlayerId').html(html);
      };
  
      $.jribbble.getShotsByPlayerId('artomatt', callback, {page: 1, per_page: 4});
  </script>
</div>