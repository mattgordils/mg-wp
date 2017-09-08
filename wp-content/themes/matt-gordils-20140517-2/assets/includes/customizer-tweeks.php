<?php
	$content_text_color = get_option('content_text_color');
	$content_link_color = get_option('content_link_color');
	$content_link_hover_color = get_option('content_link_hover_color');
	$body_bg_color = get_option('body_bg_color');
?>
<style>
	body { background-color: <?php echo $body_bg_color; ?>; }
	#content { color:  <?php echo $content_text_color; ?>; }
	#content a { color:  <?php echo $content_link_color; ?>; }
	#content a:hover { color:  <?php echo $content_link_hover_color; ?>; }
</style>