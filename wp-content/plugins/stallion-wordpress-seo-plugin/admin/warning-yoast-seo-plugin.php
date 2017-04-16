<?php $wpseo_options = get_option('wpseo_titles'); ?>
<h3><?php _e( 'Yoast WordPress SEO Plugin Warnings Version', 'stallion-wordpress-seo-plugin' ); ?> 3.8 November 2016</h3>

<p><?php $stallion_responsive_url = 'http://stallion-theme.co.uk/stallion-responsive-theme/';
$stallion_responsive_link = sprintf( wp_kses( __( 'You are using the Yoast WordPress SEO Plugin, some of the settings within this plugin are SEO damaging. If you are a <a href="%s" target="_blank">Stallion Responsive Theme</a> user it is recommended while using the Stallion Responsive Theme to deactivate the Yoast plugin as there are plugin features which stop theme features working correctly.', 'stallion-wordpress-seo-plugin' ), array( 'a' => array( 'href' => array(), 'target' => array()
) ) ), esc_url( $stallion_responsive_url ) );
echo $stallion_responsive_link;
?></p><br />

<p><?php $yoast_review_url = 'http://stallion-theme.co.uk/yoast-wordpress-seo-plugin-review/';
$yoast_review_link = sprintf( wp_kses( __( 'All IMPORTANT SEO features are covered by the Stallion Responsive Theme AND Stallion Responsive will use most of your Yoast SEO data including within various Stallion Responsive features and widgets (makes good use of Yoast title tags). See <a href="%s" target="_blank">Yoast WordPress SEO Plugin Review</a> for details. Good news is the plugin author has finally removed the sitewide nofollow features which deleted link benefit, but unfortunately still uses noindex (section wide) and nofollow on a page by page basis.', 'stallion-wordpress-seo-plugin' ), array( 'a' => array( 'href' => array(), 'target' => array()
) ) ), esc_url( $yoast_review_url ) );
echo $yoast_review_link;
?></p><br />

<p><?php $stallion_seo_plugin_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-seo-warnings';
$stallion_seo_plugin_link = sprintf( wp_kses( __( "Below are the <b style='color:red;'>damaging SEO settings</b> you are currently using, if there are no <b style='color:red;'>red settings</b> listed below, well done you haven't set any of the damaging SEO features. If you see red warnings check out the <a href='%s' target='_blank'>More Information</a> links.", 'stallion-wordpress-seo-plugin' ),
array (
'a' => array ( 'href' => array (), 'target' => array () ),
'b' => array ( 'style' => array () )
 ) ), esc_url( $stallion_seo_plugin_url ) );
echo $stallion_seo_plugin_link;
?></p><br />

<p><?php _e("Note: The developers of Yoast tend to change the options page layout on a regular basis, if you find a red warning below you can't find under a particular options page, the developers have probably moved it to another page.", 'stallion-wordpress-seo-plugin') ?></p><br />

<?php
#  'noindex-subpages-wpseo' => boolean true
#  'noindex-author-wpseo' => boolean true
#  'noindex-archive-wpseo' => boolean true
#  'noindex-post' => boolean true
#  'noindex-page' => boolean true
#  'noindex-attachment' => boolean true
#  'noindex-tax-category' => boolean true
#  'noindex-tax-post_tag' => boolean true
?>
<?php
if (isset($wpseo_options['noindex-post'])) {
	if ($wpseo_options['noindex-post'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Post Types : Posts', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-post';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-page'])) {
	if ($wpseo_options['noindex-page'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Post Types : Pages', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-page';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-attachment'])) {
	if ($wpseo_options['noindex-attachment'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Post Types : Media', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-attachment';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-tax-category'])) {
	if ($wpseo_options['noindex-tax-category'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Taxonomies : Categories', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-tax-category';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-tax-post_tag'])) {
	if ($wpseo_options['noindex-tax-post_tag'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Taxonomies : Tags', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-tax-post_tag';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-tax-post_format'])) {
	if ($wpseo_options['noindex-tax-post_format'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Taxonomies : Format', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-tax-post_format';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-author-wpseo'])) {
	if ($wpseo_options['noindex-author-wpseo'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Archives : Author Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-author-wpseo';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-archive-wpseo'])) {
	if ($wpseo_options['noindex-archive-wpseo'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Archives : Date Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-archive-wpseo';
$output = sprintf( wp_kses( __( '<b style="color:red;">Meta Robots: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($wpseo_options['noindex-subpages-wpseo'])) {
	if ($wpseo_options['noindex-subpages-wpseo'] == 'true') { ?>
<p><strong><?php _e( 'Titles and Metas - Other : Sitewide meta settings', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-yoast-wordpress-seo-plugin-warnings/#yoast-noindex-subpages-wpseo';
$output = sprintf( wp_kses( __( '<b style="color:red;">Subpages of archives: noindex</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>