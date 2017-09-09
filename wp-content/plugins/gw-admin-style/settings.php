<? 
  if ($_REQUEST['settings-updated'] == true):
    
    $file = fopen(plugin_dir_path(__FILE__)."assets/sass/_php-variables.scss","w");
  if (get_option('login_logo')):
    $dynamic_sass .= '$logo_url : "' . get_option('login_logo'). '";';
  endif;
  if (get_option('primary_color')):
    $dynamic_sass .= '$primary_color : ' . get_option('primary_color'). ';';
  endif;
  if (get_option('darker_color')):
    $dynamic_sass .= '$darker_color : ' . get_option('darker_color'). ';';
  endif;
    fwrite($file,$dynamic_sass);
    fclose($file);
  endif;
  $links = get_option('widget_links');
?>

<div class="wrap hypersettings">
  <h2>HyperPress</h2>
  <form method="post" action="options.php">
    <? 
      settings_fields('hypersettings');  
    ?>
    <h3>General</h3>
    <ul>
    <li>
      <label>Test</label>
      <input type="text" value="<?= get_option('test'); ?>" name="test" />
    </li>
    <li>
      <label>Primary Color</label>
      <input type="text" name="primary_color" value="<? echo get_option('primary_color'); ?>" class="color-field"/>
    </li>
    <li>
      <label>Darker Color</label>
      <input type="text" name="darker_color" value="<? echo get_option('darker_color'); ?>" class="color-field"/>
    </li>
    </ul>
    <h3>Login Page</h3>
    <ul>
      <li>
        <label>Logo</label>
        <img id="image" src="<? echo get_option('login_logo'); ?>" width="auto" height="60"/>
        <input type="hidden" id="image_field" name="login_logo" value="<?= get_option('login_logo') ?>"/>
        <button upload_button="class"><?= ((string)get_option('login_logo') != '') ? 'Replace Image' : 'Upload Image'; ?></button>
      </li>
    </ul>
    <h3>Widget List</h3>
    <? for ($i=1;$i<=10;$i++): ?>
    <? $link = $links[$i]; ?>
    <ul>   
      <li>
        <label>Title <?= $i; ?></label>
        <input type="text" name="widget_links[<?=$i;?>][title]" value="<? echo $link['title']; ?>"/>
      </li>
      <li>
        <label>URL <?= $i; ?></label>
        <input type="text" name="widget_links[<?=$i;?>][url]" value="<? echo $link['url']; ?>"/>
      </li>
      <li>
        <label>Icon <?= $i; ?></label>
        <img class="image" src="<? echo $links[$i]['img']; ?>" width="auto" height="60"/>
        <input type="hidden" class="image_field" name="widget_links[<?=$i;?>][img]" value="<? echo $link['img']; ?>"/>
        <button class="upload_button"><?= ((string)$link['img'] != '') ? 'Replace Image' : 'Upload Image'; ?></button>
      </li>
    </ul>
    <? endfor; ?>


    <?= submit_button(); ?>
  </form>
</div>