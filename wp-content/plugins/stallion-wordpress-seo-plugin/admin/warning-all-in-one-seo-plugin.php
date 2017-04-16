<?php $allinone_options = get_option('aioseop_options'); ?>
<h3><?php _e( 'All In One SEO Pack Plugin Warnings Version', 'stallion-wordpress-seo-plugin' ); ?> 2.3.11 November 2016</h3>

<p><?php $stallion_responsive_url = 'http://stallion-theme.co.uk/stallion-responsive-theme/';
$stallion_responsive_link = sprintf( wp_kses( __( 'You are using the All In One SEO Pack Plugin, some of the settings within this plugin are SEO damaging. If you are a <a href="%s" target="_blank">Stallion Responsive Theme</a> user it is recommended while using the Stallion Responsive Theme to deactivate the All In One plugin as there are plugin features which stop theme features working correctly.', 'stallion-wordpress-seo-plugin' ), array( 'a' => array( 'href' => array(), 'target' => array()
) ) ), esc_url( $stallion_responsive_url ) );
echo $stallion_responsive_link;
?></p><br />

<p><?php $all_review_url = 'http://stallion-theme.co.uk/wordpress-all-in-one-seo-plugin-review/';
$all_review_link = sprintf( wp_kses( __( 'All IMPORTANT SEO features are covered by the Stallion Responsive Theme AND Stallion Responsive will use most of your All In One SEO data including within various Stallion Responsive features and widgets (makes really good use of All In One SEO title tags). See <a href="%s" target="_blank">All In One SEO Pack Review</a> for details.', 'stallion-wordpress-seo-plugin' ), array( 'a' => array( 'href' => array(), 'target' => array()
) ) ), esc_url( $all_review_url ) );
echo $all_review_link;
?></p><br />

<p><?php $stallion_seo_plugin_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#all-in-one-seo-warnings';
$stallion_seo_plugin_link = sprintf( wp_kses( __( 'Below are the <b style="color:red;">damaging SEO settings</b> you are currently using, if there are no <b style="color:red;">red settings</b> listed below, well done you have not set any of the damaging SEO features. If you see red warnings click the <a href="%s" target="_blank">More Information</a> links', 'stallion-wordpress-seo-plugin' ),
array (
'a' => array ( 'href' => array (), 'target' => array () ),
'b' => array ( 'style' => array () )
 ) ), esc_url( $stallion_seo_plugin_url ) );
echo $stallion_seo_plugin_link;
?></p><br />
<?php
if (isset($allinone_options['aiosp_cpostnoindex'])) {
	if (! empty( $allinone_options['aiosp_cpostnoindex'] )) { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Default to NOINDEX', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_cpostnoindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Default to NOINDEX: Posts, Pages or Media Enabled</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_cpostnofollow'])) {
	if (! empty( $allinone_options['aiosp_cpostnofollow'] )) { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Default to NOFOLLOW', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_cpostnofollow';
$output = sprintf( wp_kses( __( '<b style="color:red;">Default to NOFOLLOW: Posts, Pages or Media Enabled</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_category_noindex'])) {
	if ($allinone_options['aiosp_category_noindex'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for Categories', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_category_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for Categories ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_archive_date_noindex'])) {
	if ($allinone_options['aiosp_archive_date_noindex'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for Date Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_archive_date_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for Date Archives ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_archive_author_noindex'])) {
	if ($allinone_options['aiosp_archive_author_noindex'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for Author Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_archive_author_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for Author Archives ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_tags_noindex'])) {
	if ($allinone_options['aiosp_tags_noindex'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for Tag Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_tags_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for Tag Archives ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_search_noindex'])) {
	if ($allinone_options['aiosp_search_noindex'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for Search Archives', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_search_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for Search Archives ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_404_noindex'])) {
	if ($allinone_options['aiosp_404_noindex'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for 404 Pages', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_404_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for 404 Pages ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_tax_noindex'])) {
#	if ($allinone_options['aiosp_tax_noindex'] == 'on') { 
	if (! empty( $allinone_options['aiosp_tax_noindex'] )) { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for Taxonomy Archives:', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_tax_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for Taxonomy Archives: Any Taxonomy Enabled</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_paginated_noindex'])) {
	if ($allinone_options['aiosp_paginated_noindex'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use noindex for paginated pages/posts', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_paginated_noindex';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use noindex for paginated pages/posts ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>
<?php
if (isset($allinone_options['aiosp_paginated_nofollow'])) {
	if ($allinone_options['aiosp_paginated_nofollow'] == 'on') { ?>
<p><strong><?php _e( 'General Settings - Noindex Settings : Use nofollow for paginated pages/posts', 'stallion-wordpress-seo-plugin'); ?></strong></p>
<p><?php $stallion_seo_plugin_doc_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-tutorial-all-in-one-seo-plugin-warnings/#aiosp_paginated_nofollow';
$output = sprintf( wp_kses( __( '<b style="color:red;">Use nofollow for paginated pages/posts ON</b> : <a href="%s" target="_blank">More Information</a>.', 'stallion-wordpress-seo-plugin' ),
array ( 'a' => array ( 'href' => array (), 'target' => array () ), 'b' => array ( 'style' => array () ) ) ), esc_url( $stallion_seo_plugin_doc_url ) );
echo $output;
?></p><br />
<?php
	}
}
?>