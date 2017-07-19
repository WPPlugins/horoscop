<?php
/**
 *	Functions file
 *	@package: Horoscop
 *	@since: 2.1.8
 *	@modified: 2.5.6
 */
$signs = array( 'code' => array('berbec', 'taur', 'gemeni', 'rac', 'leu', 'fecioara', 'balanta', 'scorpion', 'sagetator', 'capricorn', 'varsator', 'pesti'),
				'display' => array('Berbec', 'Taur', 'Gemeni', 'Rac', 'Leu', 'Fecioară', 'Balanță', 'Scorpion', 'Săgetător', 'Capricorn', 'Vărsător', 'Pești'));
function init_horoscope_settings() {
	/**
	 *	Initiate Horoscop settings after activate plugin
	 *	@since: 2.1.8
	 *	@modified: 2.5.6
	 *	@return: (void)
	 */
	global $wpdb;
	$query = 'CREATE TABLE ' . $wpdb->prefix . 'horoscope_cache (
		ID tinyint(2) unsigned NOT NULL auto_increment,
		sign char(10) NOT NULL,
		content text NOT NULL,
		PRIMARY KEY ID (ID)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;';
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta($query);
	wp_schedule_event(time(), '6hours', 'make_horoscope_cache');
}

function remove_horoscope_settings() {
	/**
	 *	Remove Horoscop settings after deactivate plugin
	 *	@since: 2.1.8
	 *	@modified: 2.5.6
	 *	@return: (void)
	 */
	global $wpdb;
	$wpdb->query('DROP TABLE ' . $wpdb->prefix . 'horoscope_cache');
	delete_option('widget_horoscope');
	wp_clear_scheduled_hook('make_horoscope_cache');
}

function add_horoscope_cron_interval($schedules) {
	/**
	 *	Create a custom interval for horoscope update cron-job
	 *	@since: 2.5.6
	 *	@return: (array)
	 */
	$schedules['6hours'] = array(
		'interval' => 21600, // == 6 hours
		'display'  => esc_html__('Make an update every six hours'),
    );
    return $schedules;
}

function get_sign_content($sign) {
	/**
	 *	Get content of sign from www.acvaria.com
	 *	@since: 2.1.8
	 *	@params: (string) $sign
	 *	@return: (string) $content
	 */
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://www.acvaria.com/partener-acvaria.php?z=' . $sign);
	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($curl, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPGET, true);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	$content = curl_exec($curl);
	$curl_info = curl_getinfo($curl);	
	if ( 200 != $curl_info['http_code'] ) return 0;
	curl_close($curl);
	$content = preg_replace('/\s\s+/', '', $content);
	$content = str_replace(' Horoscop oferit de www.acvaria.com', '', strip_tags($content));
	return utf8_encode($content);
}

function make_horoscope_cache() {
	/**
	 *	Make horoscop cache at an interval set in cron-job
	 *	@since: 2.1.8
	 *	@modified: 2.5.6
	 *	@return: (void)
	 */
	global $wpdb, $signs;
	foreach ( $signs['code'] AS $sign ) {
		$count = $wpdb->get_var("SELECT COUNT(*) FROM " . $wpdb->prefix . "horoscope_cache WHERE sign='" . $sign . "'");
		if ( 0 == $count ) $wpdb->insert($wpdb->prefix . 'horoscope_cache', array('sign' => $sign, 'content' => get_sign_content($sign)), array('%s', '%s'));
		else $wpdb->update($wpdb->prefix . 'horoscope_cache', array('sign' => $sign, 'content' => get_sign_content($sign)), array('sign' => $sign), array('%s', '%s'), array('%s'));
	}
}

function sign_period($sign) {
	/**
	 *	Show the period of every sign
	 *	@since: 1.8.3
	 *	@params: (string) $sign
	 *	@return: (string)
	 */
	switch ($sign) {
		case 'berbec':		return '21 martie - 20 aprilie';
		case 'taur':		return '21 aprilie - 21 mai';
		case 'gemeni':		return '22 mai - 21 iunie';
		case 'rac':			return '22 iunie - 22 iulie';
		case 'leu':			return '23 iulie - 22 august';
		case 'fecioara':	return '23 august - 22 septembrie';
		case 'balanta':		return '23 septembrie - 22 octombrie';
		case 'scorpion':	return '23 octombrie - 21 noiembrie';
		case 'sagetator':	return '22 noiembrie - 21 decembrie';
		case 'capricorn':	return '22 decembrie - 19 ianuarie';
		case 'varsator':	return '20 ianuarie - 18 februarie';
		default:			return '19 februarie - 20 martie';
	}
}

function horoscope_enqueue_scripts() {
	/**
	 *	Set jQuery and CSS paths
	 *	@since: 2.5.6
	 *	@return: (void)
	 */
	wp_enqueue_script('horoscope-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false);
	wp_enqueue_style('horoscope-stylesheet', plugin_dir_url(__FILE__) . 'style.css', '', '1.0.0', 'all');
}
?>