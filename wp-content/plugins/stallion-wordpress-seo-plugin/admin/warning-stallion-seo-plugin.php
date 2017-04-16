<?php $stseo_options = get_option('stallion_wp_seo_not_index'); ?>
<h3><?php _e( 'Stallion WordPress SEO Plugin Warnings Version', 'stallion-wordpress-seo-plugin' ); ?> 3.0.0 November 2016</h3>

<p><?php $stallion_responsive_url = 'http://stallion-theme.co.uk/stallion-responsive-theme/';
$stallion_responsive_link = sprintf( wp_kses( __( 'You are using the Stallion WordPress SEO Plugin, some of the settings within this plugin are SEO damaging. If you are a <a href="%s" target="_blank">Stallion Responsive Theme v8.5+</a> user there are almost identical Not Index options under "Stallion Theme" > "SEO Advanced Options" : "Stallion WordPress SEO Plugin". It is safe to use the Stallion Responsive Theme and the Stallion WordPress SEO Plugin at the same time. The plugin options take priority over theme options.', 'stallion-wordpress-seo-plugin' ), array( 'a' => array( 'href' => array(), 'target' => array()
) ) ), esc_url( $stallion_responsive_url ) );
echo $stallion_responsive_link;
?></p><br />

<p><?php _e( "Note All IMPORTANT SEO features are covered by the Stallion Responsive Theme AND Stallion Responsive includes it's own title tags and meta tags features and uses most of Yoast and All In One SEO data.", 'stallion-wordpress-seo-plugin' ); ?></p><br />

<p><?php $stallion_seo_plugin_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#stallion-seo-warnings';
$stallion_seo_plugin_link = sprintf( wp_kses( __( "Below are the <b style='color:red;'>damaging SEO settings</b> you are currently using, if there are no <b style='color:red;'>red settings</b> listed below, well done you haven't set any of the damaging SEO features. Note: <b style='color:orange;'>orange settings</b> are SEO notices, there are circumstances this can cause SEO damage. The <b style='color:blue;'>blue settings</b> are SEO reminders, blue is a good options, but can be improved further via other WordPress settings. See the <a href='%s' target='_blank'>More Information</a> links.", 'stallion-wordpress-seo-plugin' ),
array (
'a' => array ( 'href' => array (), 'target' => array () ),
'b' => array ( 'style' => array () )
 ) ), esc_url( $stallion_seo_plugin_url ) );
echo $stallion_seo_plugin_link;
?></p><br />

<?php
if (isset($stseo_options['st_seo_notindex_date'])) {
	if ($stseo_options['st_seo_notindex_date'] == '2') { ?>
<p><strong><?php _e( 'Not Index Options : WordPress Date Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-stallion-wordpress-seo-plugin-warnings/#stallion-not-index-date-archives';
$output = sprintf( wp_kses( __( '<b style="color:blue;">Block All Date Archives**</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>

<?php
if (isset($stseo_options['st_seo_notindex_author'])) {
	if ($stseo_options['st_seo_notindex_author'] == '2') { ?>
<p><strong><?php _e( 'Not Index Options : WordPress Author Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-stallion-wordpress-seo-plugin-warnings/#stallion-not-index-author-archives';
$output = sprintf( wp_kses( __( '<b style="color:orange;">Block All Author Archives^^</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>

<?php
if (isset($stseo_options['st_seo_notindex_category'])) {
	if ($stseo_options['st_seo_notindex_category'] == '1') { ?>
<p><strong><?php _e( 'Not Index Options : WordPress Category Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-stallion-wordpress-seo-plugin-warnings/#stallion-not-index-category';
$output = sprintf( wp_kses( __( '<b style="color:red;">Block All Categories</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>

<?php
if (isset($stseo_options['st_seo_notindex_tags'])) {
	if ($stseo_options['st_seo_notindex_tags'] == '1') { ?>
<p><strong><?php _e( 'Not Index Options : WordPress Tag Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-stallion-wordpress-seo-plugin-warnings/#stallion-not-index-tags';
$output = sprintf( wp_kses( __( '<b style="color:red;">Block All Tags</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>

<?php
if (isset($stseo_options['st_seo_notindex_taxs'])) {
	if ($stseo_options['st_seo_notindex_taxs'] == '1') { ?>
<p><strong><?php _e( 'Not Index Options : WordPress Custom Taxonomy Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-stallion-wordpress-seo-plugin-warnings/#stallion-not-index-taxs';
$output = sprintf( wp_kses( __( '<b style="color:red;">Block All Custom Taxonomy Archives</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>

<?php
if (isset($stseo_options['st_seo_notindex_custptarc'])) {
	if ($stseo_options['st_seo_notindex_custptarc'] == '1') { ?>
<p><strong><?php _e( 'Not Index Options : WordPress Custom Post Type Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-stallion-wordpress-seo-plugin-warnings/#stallion-not-index-custptarc';
$output = sprintf( wp_kses( __( '<b style="color:red;">Block All Custom Post Type Archives</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>