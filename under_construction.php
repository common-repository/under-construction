<?php

/**
 * @author admin
 * @copyright 2010
 */
 //exit();
function plugin_footer()
{
    $options = get_option_pt();
    if($options['disabled_checkbox_1'] != 'on')
    {
    echo "<a href='http://www.spiders-design.co.uk' class='footer'>Spiders-Design Under Construction Plugin</a>";
    }
}
function social_media_style()
{
    $plugin_dir = plugins_url().'/under-construction';
    echo <<<social_style
#social .twitter
{
	background-image:url($plugin_dir/images/social_gloss_twitter_48.png);
	background-repeat:no-repeat;
}
#social .facebook
{
	background-image:url($plugin_dir/images/social_gloss_facebook_48.png);
	background-repeat:no-repeat;
}
#social .digg
{
	background-image:url($plugin_dir/images/social_gloss_digg_48.png);
	background-repeat:no-repeat;
}
#social .yahoo
{
	background-image:url($plugin_dir/images/social_gloss_yahoo_48.png);
	background-repeat:no-repeat;
}
#social .rss
{
	background-image:url($plugin_dir/images/social_gloss_rss_48.png);
	background-repeat:no-repeat;
}
#social .delicious
{
	background-image:url($plugin_dir/images/social_gloss_delicious_48.png);
	background-repeat:no-repeat;
}
#social .flickr
{
	background-image:url($plugin_dir/images/social_gloss_flickr_48.png);
	background-repeat:no-repeat;
}
#social .stumbleupon
{
	background-image:url($plugin_dir/images/social_gloss_stumbleupon_48.png);
	background-repeat:no-repeat;
}
social_style;
}
function social_media_html()
{
    $options = get_option_pt();
    if($options['social_enable'] != 'on')
    {
        return;
    }
    if($options['social_twitter'] == 'on')
    {
        echo('<a href="'.$options['social_twitter_link'].'" class="twitter"></a>');
    }
    if($options['social_facebook'] == 'on')
    {
        echo('<a href="'.$options['social_facebook_link'].'" class="facebook"></a>');
    }
    if($options['social_digg'] == 'on')
    {
        echo('<a href="'.$options['social_digg_link'].'" class="digg"></a>');
    }
    if($options['social_yahoo'] == 'on')
    {
        echo('<a href="'.$options['social_yahoo_link'].'" class="yahoo"></a>');
    }
    if($options['social_delicious'] == 'on')
    {
        echo('<a href="'.$options['social_delicious_link'].'" class="delicious"></a>');
    }
    if($options['social_rss'] == 'on')
    {
        echo('<a href="'.$options['social_rss_link'].'" class="rss"></a>');
    }
    if($options['social_flickr'] == 'on')
    {
        echo('<a href="'.$options['social_flickr_link'].'" class="flickr"></a>');
    }
    if($options['social_stumbleupon'] == 'on')
    {
        echo('<a href="'.$options['social_stumbleupon_link'].'" class="stumbleupon"></a>');
    }
}

function under_construction()
{
    $options = get_option_pt();
    if($options['enabled']!= 'on')
    {// Plugin disabled
        return;
    }
    elseif(is_user_logged_in())
    {
        return;
    }
    else
    {//plugin enabled
        switch($options['theme'])
        {
            case rocket:
                include(WP_PLUGIN_DIR.'/under-construction/rocket.php');
            break;
            default:
                include(WP_PLUGIN_DIR.'/under-construction/rocket.php');
        }
        exit();
    }
}
?>