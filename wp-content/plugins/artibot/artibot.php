<?php
/**
 * @package ArtiBot
 * @version 1.1.6
 */
/*
Plugin Name: ArtiBot
Plugin URI:
Description: ArtiBot.ai is an AI-powered lead capture tool for your website. It works 24 hours a day, 7 days a week! It's super easy to setup and use. Plus, it's free. <a href="https://wordpress.org/support/view/plugin-reviews/artibot">Click here to review the plugin!</a>
Author: Pure Chat, Inc.
Version: 1.1.6
Author URI: artibot.ai
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include 'variables.php';

class ArtiBot_Plugin {
	var $version = 8;

	public static function activate()	{
		ArtiBot_Plugin::clear_cache();
	}

	public static function deactivate()	{
		ArtiBot_Plugin::clear_cache();
	}



	function __construct() {
	//	add_option('artibot_widget_code', '', '', 'yes');
	//	add_option('artibot_widget_name', '', '', 'yes');

		add_action('wp_footer', array( &$this, 'artibot_load_snippet') );

		add_action('admin_menu', array( &$this, 'artibot_menu' ) );
		add_action('wp_ajax_artibot_update', array( &$this, 'artibot_update' ) );

		$this->update_plugin();
	}

	function update_plugin() {
		update_option('artibot_plugin_ver', $this->version);
	}

	function artibot_menu() {
		add_menu_page('ArtiBot', 'ArtiBot', 'manage_options', 'artibot-menu', array( &$this, 'artibot_generateAcctPage' ), plugins_url().'/artibot/favicon.ico');
	}

	function artibot_update() {
		if($_POST['action'] == 'artibot_update' && strlen((string)$_POST['artibotwid']) == 36)
		{
			update_option('artibot_widget_code', $_POST['artibotwid']);
			update_option('artibot_widget_name', $_POST['artibotwname']);
		}
	}

	function artibot_load_snippet() {
		global $current_user;
		if(get_option('artibot_widget_code'))
		{
			echo("<script type='text/javascript'>!function(t,e){t.artibotApi={l:[],t:[],on:function(){this.l.push(arguments)},trigger:function(){this.t.push(arguments)}};var a=!1,i=e.createElement('script');i.async=!0,i.type='text/javascript',i.src='https://app.artibot.ai/loader.js',e.getElementsByTagName('head').item(0).appendChild(i),i.onreadystatechange=i.onload=function(){if(!(a||this.readyState&&'loaded'!=this.readyState&&'complete'!=this.readyState)){new window.ArtiBot({i:'" . get_option('artibot_widget_code') . "'});a=!0}}}(window,document);</script>");
		}
		else
		{
			echo("<!-- Please select a widget in the wordpress plugin to activate artibot -->");
		}
	}

	private static function clear_cache() {
		if (function_exists('wp_cache_clear_cache')) {
			wp_cache_clear_cache();
		}
	}

	function artibot_generateAcctPage() {
		global $artibotHome;
		?>
		<head>
				<link rel="stylesheet" href="<?php echo plugins_url().'/artibot/artibotStyles.css'?>" type="text/css">
		</head>
		<?php
		if (isset($_POST['artibotwid']) && isset($_POST['artibotwname'])) {
			artibot_update();
		}
		?>
		<p>
		<div class="artibotbuttonbox">
			<img src="<?php echo plugins_url().'/artibot/logo.png'?>"alt="ArtiBot logo"></img>
			<div class = "artibotcontentdiv">
				<?php
				if (get_option('artibot_widget_code') == '' ) {
					?>
					<p>ArtiBot.ai is an AI-powered lead capture tool for your website. It works 24 hours a day, 7 days a week! It's super easy to setup and use. Plus, it's free. </p>
					<p>The button will open an ArtiBot selector in an external page. Keep in mind that your ArtiBot account is separate from your WordPress account.</p>
				<?php
				} else {
				?>
					<h4>Your current ArtiBot is:</h4>
					<h1 class="artibotCurrentWidgetName"><?php echo get_option('artibot_widget_name'); ?></h1>
					<p>Would you like to switch ArtiBots?</p>
				<?php
			}
				?>
			</div>
			<form>
				<input type="button" class="artibotbutton" value="Pick an ArtiBot!" onclick="openArtiBotChildWindow()">
			</form>
			<p>
		</div>
		<script>
			var artiBotChildWindow;
			var artiBotNameToPass = "<?php echo get_option('artibot_widget_name');?>";
			var artiBotIdToPass = "<?php echo get_option('artibot_widget_code');?>";
			function openArtiBotChildWindow() {
				artiBotChildWindow = window.open('<?php echo $artibotHome;?>/integrations/wordpress?botId='+artiBotIdToPass, 'ArtiBot');
			}
			var url = ajaxurl;
			window.addEventListener('message', function(event) {
				var data = {
					'action': 'artibot_update',
					'artibotwid': event.data.id,
					'artibotwname': event.data.name
				};
				jQuery.post(url, data).done(function(){})
				var artiBotNamePassedIn = event.data.name;
				if(typeof artiBotNamePassedIn != 'undefined') {
					document.getElementsByClassName('artibotcontentdiv')[0].innerHTML = '<h4>Your current ArtiBot is:</h4><h1 class="artibotCurrentWidgetName">' +
																						  artiBotNamePassedIn + '</h1><p>Would you like to switch bots?</p>';
					artiBotNameToPass = artiBotNamePassedIn;
					artiBotIdToPass = event.data.id;
				}
			}, false);
		</script>
		<div class="artibotlinkbox">
			<p><a href="https://app.artibot.ai/" target="_blank">Visit ArtiBot.ai’s dashboard </a> to setup your ArtiBot, view leads, and add lead recipients.</p>
		</div>
		<?php
	}
}



register_activation_hook(__FILE__, array('ArtiBot_Plugin', 'activate'));
register_deactivation_hook(__FILE__, array('ArtiBot_Plugin', 'deactivate'));

new ArtiBot_Plugin();
?>
