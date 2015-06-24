<?php
/*
	Plugin Name: AAA Client Communication
	Description: A way to communicate to client
	Version: 0.9.1
	GitHub Plugin URI: https://github.com/wpstudio/client-comm-plugin
*/

add_action('wp_dashboard_setup','client_feed_dashboard_widget');
function client_feed_dashboard_widget(){
	global $wp_meta_boxes;
	wp_add_dashboard_widget('client_dashboard_news', 'Latest News from Your Dev', 'client_dashboard_news_content');
	function client_dashboard_news_content(){
		$client_feed = 'http://wpblog.org/'.$_SERVER['HTTP_HOST'].'.php';
		$client_feed_extract = file_get_contents($client_feed);
		?>
		<div class="client-dash-content">
			<?php echo $client_feed_extract; ?>
		</div>
		<?php
	}
}

/* Full Page */
add_action( 'admin_menu', 'client_full_page_news_area' );
function client_full_page_news_area(){
	add_menu_page( 'Client News', 'Client News', 'administrator', 'client_comm_news', 'client_news_comm_content', '',1 );
}
function client_news_comm_content(){
	$client_full_page = 'http://wpblog.org/'.$_SERVER['HTTP_HOST'].'.php';
	$client_full_page_extract = file_get_contents($client_full_page);
	?>
	<div class="wrap">
		<div class="client-full-news">
			<?php echo $client_full_page; ?>
			<?php echo $client_full_page_extract; ?>
		</div>
	</div>
	<?php
}








