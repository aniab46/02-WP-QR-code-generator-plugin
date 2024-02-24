<?php 

	class MQRC_Query_data{


		public function __construct(){
			add_shortcode("get_post",array($this,'get_query_data'));
		}
		public function get_query_data(){
			ob_start();

			$args = array(
				'post_type'=> 'post',
				);
			// The Query.
			$query = new WP_Query( $args );

			// The Loop.
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
					<li><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></li>
					<p><?php the_content() ?></p>
					<?php
				}
			} else {
				esc_html_e( 'Sorry, no posts matched your criteria.' );
			}
			
			// Restore original Post Data.
			wp_reset_postdata();
			return ob_get_clean();

		}
			


		public function post_query(  ){
			ob_start();

			$arg=array(
				'post_type'=> 'post',
			) ;
			$posts= get_posts($arg);

			foreach($posts as $post){
				$link=get_the_permalink($post->ID);
				?>
					<h2><a href="<?php echo $link ?>"><?php echo $post->post_title ?></a></h2>
					<p><?php echo $post->post_content ?></p>

				<?php
				//echo $post->post_title. '<br>';
			}

			return ob_get_clean();

		}
	}

	new MQRC_Query_data();

?>