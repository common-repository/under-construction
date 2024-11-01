<?php
/*
Plugin Name: Website Under Construction
Plugin URI: http://spiders-design.co.uk
Description: Displays a customizable 'under construction' page to visitors. A countdown can be displayed on the coming soon page as well as links to...
Version: 0.2
Author: Spiders-Design
Author URI: http://spiders-design.co.uk
License: Spiders-Design free license
*/

// Specify Hooks/Filters
function get_option_pt()
{
    $options = get_option('under_construction_options');
    $options['enabled'] = $options['checkbox_1'];
    $options['theme'] = $options['dropdown_1'];
    $options['title'] = $options['text_1'];
    $options['password'] = $options['pass_1'];
    $options['message'] = $options['textarea_1'];
    $options['password_bypass'] = $options['checkbox_2'];
    $options['updates'] = $options['checkbox_3'];
    $options['updates_link'] = $options['text_2'];
    $options['reset'] = $options['checkbox_4'];
    $options['social_enable'] = $options['checkbox_5'];
    $options['social_twitter'] = $options['checkbox_6'];
    $options['social_twitter_link'] = $options['text_3'];
    $options['social_facebook'] = $options['checkbox_7'];
    $options['social_facebook_link'] = $options['text_4'];
    $options['social_digg'] = $options['checkbox_8'];
    $options['social_digg_link'] = $options['text_5'];
    $options['social_yahoo'] = $options['checkbox_9'];
    $options['social_yahoo_link'] = $options['text_6'];
    $options['social_delicious'] = $options['checkbox_10'];
    $options['social_delicious_link'] = $options['text_7'];
    $options['social_rss'] = $options['checkbox_11'];
    $options['social_rss_link'] = $options['text_8'];
    $options['social_flickr'] = $options['checkbox_12'];
    $options['social_flickr_link'] = $options['text_9'];
    $options['social_stumbleupon'] = $options['checkbox_13'];
    $options['social_stumbleupon_link'] = $options['text_10'];
    return $options;
}

include(WP_PLUGIN_DIR.'/under-construction/options.php');
include(WP_PLUGIN_DIR.'/under-construction/under_construction.php');
function add_defaults_fn() {
	$tmp = get_option('under_construction_options');
    $defaults = array(
    "disabled_checkbox_1" => "",
    "checkbox_1"=>"on",//enabled
    "dropdown_1" => "rocket", //theme
    "text_1" => "Website Under Construction", //title
    "pass_1" => "password123", 
    "textarea_1" => "Our site is currently under construction.", 
    "checkbox_2" => "on", 
    "checkbox_3" => "on",
    "checkbox_4" => "",
    "checkbox_5" => "on",
    "checkbox_6" => "on",
    "checkbox_7" => "on",
    "checkbox_8" => "on",
    "checkbox_9" => "on",
    "checkbox_10" => "on",
    "checkbox_11" => "on",
    "checkbox_12" => "on",
    "checkbox_13" => "on",
    "text_2" => "#",
    "text_3" => "#",
    "text_4" => "#",
    "text_5" => "#",
    "text_6" => "#",
    "text_7" => "#",
    "text_8" => "#",
    "text_9" => "#",
    "text_10" => "#",
);
    if(($tmp['checkbox_4']=='on')||(!is_array($tmp))) {
		update_option('under_construction_options', $defaults);
        
	}
}


define('THIS_PLUGIN_TEXT','Use the settings below to control the appearance of the page');
  add_action('admin_menu', 'add_defaults_fn');
  add_action('admin_init', 'plugin_init_fn' );
  add_action('admin_menu', 'plugin_add_page_fn');
  add_action('get_header', 'under_construction');


//Register defaults

// Register our settings. Add the settings section, and settings fields
function plugin_init_fn(){
	register_setting('under_construction_options', 'under_construction_options');
    add_settings_section('main_section', 'Global Settings', 'section_text_fn', 'under_construction');
    add_settings_field('disabled_checkbox_1', 'Remove link to Spiders-Design', 'build_disabled_checkbox_option', 'under_construction', 'main_section');
    add_settings_field('checkbox_1', 'Enabled', 'build_checkbox_option', 'under_construction', 'main_section');
    add_settings_field('drop_down_1', 'Select Theme', 'build_dropdown_option', 'under_construction', 'main_section');
	add_settings_field('text_1', 'Page Title', 'build_text_option', 'under_construction', 'main_section');
	add_settings_field('pass_1', 'Password to view site', 'build_pass_option', 'under_construction', 'main_section');
	add_settings_field('textarea_1', 'Custom message / description', 'build_textarea_option', 'under_construction', 'main_section');
    add_settings_field('checkbox_2', 'Enable password bypass', 'build_checkbox_option', 'under_construction', 'main_section');
    add_settings_field('checkbox_3', 'Enable "receive updates" form', 'build_checkbox_option', 'under_construction', 'main_section');
    add_settings_field('text_2', 'Recieve updates link (mailto://youremail)', 'build_text_option', 'under_construction', 'main_section');
	//add_settings_field('radio_1', 'Select Shape', 'build_radio_option', 'under_construction', 'main_section');
	//add_settings_field('drop_down_2', 'Select Color', 'build_dropdown_option', 'under_construction', 'main_section');
    add_settings_field('check_box_4', 'Restore Defaults', 'build_checkbox_option', 'under_construction', 'main_section');
    add_settings_section('social_section', 'Social Media', 'section_text_fn', 'under_construction');
    add_settings_field('check_box_5', 'Enable social media icons', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('check_box_6', 'Enable twitter', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_3', 'Twitter link', 'build_text_option', 'under_construction', 'social_section');
    add_settings_field('check_box_7', 'Enable Facebook', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_4', 'Facebook Link', 'build_text_option', 'under_construction', 'social_section');
    add_settings_field('check_box_8', 'Enable Digg', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_5', 'Digg link', 'build_text_option', 'under_construction', 'social_section');
    add_settings_field('check_box_9', 'Enable Yahoo', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_6', 'Yahoo link', 'build_text_option', 'under_construction', 'social_section');
    add_settings_field('check_box_10', 'Enable Delicious', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_7', 'Delicious link', 'build_text_option', 'under_construction', 'social_section');
    add_settings_field('check_box_11', 'Enable RSS', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_8', 'Rss link', 'build_text_option', 'under_construction', 'social_section');
    add_settings_field('check_box_12', 'Enable Flickr', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_9', 'Flickr link', 'build_text_option', 'under_construction', 'social_section');
    add_settings_field('check_box_13', 'Enable Stumble Upon', 'build_checkbox_option', 'under_construction', 'social_section');
    add_settings_field('text_10', 'Stumble Upon link', 'build_text_option', 'under_construction', 'social_section');
}

// Add sub page to the Settings Menu
function plugin_add_page_fn() {
	   add_options_page('Website Under Construction Settings', 'Under Construction', 'administrator', 'under_construction', 'options_page_fn');
}