<?php 

/*
 * Plugin Name:       Master QR Code
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       This is QR Code plugin. With the phone ..
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Muhammad Aniab
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

class MQR_master_qr_code{
	public function __construct(){
		add_action("init", array( $this,"init") );
	}
	public function init(){
		add_filter("the_content", array( $this,"display_qr_code") );
	}
	function display_qr_code($content){
		$page_link=esc_url(get_permalink());
		$image_of_QR_code="<div style='margin:20px 0;' ><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$page_link}' ></div>";
		$content.=$image_of_QR_code;
		return $content;

	}
}
new MQR_master_qr_code();










 ?>