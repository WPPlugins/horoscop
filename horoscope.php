<?php
/*
Plugin Name: Horoscop
Plugin URI: https://wordpress.org/plugins/horoscop/
Description: Acest plugin simplu afișează pe site prezicerile horoscopului pentru toate cele 12 zodii. După activarea modulului, o nouă piesă (widget) va fi disponibilă și se poate poziționa în zona dorită din site.
Version: 2.5.6
Author: Vlăduț Ilie
Author URI: http://vladilie.ro
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

------------------------------------------------------------------------------------------------------
	Copyright 2012-2017 Vlăduț Ilie (email: vladilie94@gmail.com)
------------------------------------------------------------------------------------------------------
	Preluarea informațiilor de către acest plugin, se face cu permisiunea editorului Dana Mîndru de la
	www.acvaria.com, acord acceptat, în scris prin e-mail, în data de 20 august 2012.
------------------------------------------------------------------------------------------------------
	Informațiile preluate de către acest plugin respectă și sunt protejate de legea 8/1996 privind
	dreptul de autor și drepturile conexe.
------------------------------------------------------------------------------------------------------
*/
defined('ABSPATH') || exit;
date_default_timezone_set('Europe/Bucharest');
define('IMAGES_HOROSCOPE_DIR', plugin_dir_url(__FILE__) . 'images/');
require_once('includes/class-horoscope.php');

register_activation_hook(__FILE__, 'init_horoscope_settings');
register_deactivation_hook(__FILE__, 'remove_horoscope_settings');

add_action('widgets_init', create_function('', 'register_widget("Horoscope");'));
add_action('wp_enqueue_scripts', 'horoscope_enqueue_scripts');
add_action('make_horoscope_cache', 'make_horoscope_cache');
add_filter('cron_schedules', 'add_horoscope_cron_interval');
?>