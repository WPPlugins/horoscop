<?php
/**
 *	Class Horoscope
 *	@package: Horoscop
 *	@since: 2.1.8
 *	@modified: 2.5.6
 */
require_once('functions.php');
class Horoscope extends WP_Widget
{
	public function __construct() {
		parent::__construct(
			'Horoscope', // Base ID
			'Horoscop',  // Name
			array('description' => __('Ia-mă de aici și pune-mă în sidebar, să îți arăt ce pot!'),)
		);
	}

	public function widget($args, $instance) {
		global $wpdb, $signs;
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		if ( !empty($title) )
			echo $before_title . $title . $after_title;
		/**
		 *	jQuery for sliding
		 *	@since: 2.1.8
		 *	@modified: 2.5.6
		 */
		$code .= '<script type="text/javascript">
		$(document).ready(function() {
			$("div.horoscop-sign").css("display", "none");
			$(".horoscope-sign-widget").click(function() {
				var this_sign = $(this).attr("title");
				var what_show = "show-"+this_sign+"-content";
				$("#horoscope-sign-list").slideUp("slow");
				$("div#"+what_show).slideDown("slow");
				$("h3#horoscope-sign-title").click(function() {
					$("div#"+what_show).slideUp("slow");
					$("#horoscope-sign-list").slideDown("slow");
				});
			});
		});</script>';
		$code .= '<div id="horoscope-widget">';
		for ( $i = 0; $i < 12; $i++ ) {
			$scode = $signs['code'][ $i ];
			$sdisp = $signs['display'][ $i ];
			$content = $wpdb->get_results($wpdb->prepare("SELECT content FROM {$wpdb->prefix}horoscope_cache WHERE sign=%s", $scode));
			if ( empty($content[0]->content) ) $text ='Conținutul acestei zodii nu a fost actualizat corespunzător.';
			else $text = $content[0]->content;
			$code .= '<div class="horoscop-sign" id="show-'. $scode .'-content">
				<h3 id="horoscope-sign-title"><span style="vertical-align: middle" class="dashicons dashicons-arrow-left-alt2"></span>'. $sdisp . '</h3><br/>
				<p id="horoscope-sign-subtitle">' . sign_period ($scode) . '</p>
				<p id="horoscop-sign-content">' . $text . '</p>
				<p id="horoscope-footer">Copyright ' . date('Y') . ' &copy; <a href="http://www.acvaria.com" target="_blank">acvaria.com</a></p></div>';
		}
		/**
		 * Display mode: text list (from first version) added with matrix in this 1.8.3 version
		 * @since: 1.8.3
		 */
		if ( $instance['display_mode'] ) {
			$code .= '<ul id="horoscope-sign-list" style="text-align: left;">';
			$i = 0;
			foreach ( $signs['code'] as $sign ) {
				$code .= '<li class="horoscope-sign-widget" title="' . $sign . '">' .  ucfirst($sign) . '</li>';
			}
			$code .= '</ul>';
		} else {
			$code .= '<div id="horoscope-sign-list">';
			$j = 1;
			foreach ( $signs['code'] as $sign ) {
				if ( $j == 4 ) {
					$br = '<br/>';
					$j = 0;
				} else $br = '';
				$j++;
				$code .= '<img src="' . IMAGES_HOROSCOPE_DIR . $sign . '.png" class="horoscope-sign-widget" title="' . $sign . '" style="padding: 1px;" alt="' . $sign . '">' . $br;
			}
			$code .= '</div>';
		}
		$code .= '</div>';
		echo $code . $after_widget;
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['display_mode'] = (int)$new_instance['display_mode'];
		return $instance;
	}

	public function form($instance) {
		$defaults = array('title' => 'Horoscop', 'display_mode' => 0);
		$instance = wp_parse_args((array) $instance, $defaults);
		?>
		<div class="widget-content">
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titlu:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></p>
			<p><?php _e('Mod afișare:'); ?><br/>
				<?php
				if ( $instance['display_mode'] ) {
					$matrix_selected = '';
					$list_selected = 'selected="selected"';
				} else {
					$matrix_selected = 'selected="selected"';
					$list_selected = '';
				}
				?>
				<select class="widefat" name="<?php echo $this->get_field_name('display_mode'); ?>">
					<option value="0" <?php echo $matrix_selected; ?>>Matrice de imagini</option>
					<option value="1" <?php echo $list_selected; ?>>Listă ordonată cu zodii</option>
				</select>
			</p>
		</div>
		<?php
	}
}
?>