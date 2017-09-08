<html <?php language_attributes(); ?>>
<?php include('assets/includes/head.php'); ?>

<body <?php body_class(); ?>>
<?php get_header(); ?>
<div class="container four-o-four">
	<h1>Not Found</h1>
		<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'starkers' ); ?></p>
		<?php include 'searchform.php'; ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

</div>
<?php get_footer(); ?>

<?php include('assets/includes/foot.php'); ?>

</body>
</html>