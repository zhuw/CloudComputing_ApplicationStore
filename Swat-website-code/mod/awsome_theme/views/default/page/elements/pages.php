<?php 
	/*
	 * 3 Column River Acitivity
	 *
	 * @package ElggRiverDash
	 * Full Creadit goes to ELGG Core Team for creating a beautiful social networking script
	 *
         * Modified by Satheesh PM, BARC, Mumbai, India..
         * http://satheesh.anushaktinagar.net
         *
	 * @author ColdTrick IT Solutions
	 * @copyright Coldtrick IT Solutions 2009
	 * @link http://www.coldtrick.com/
	 * @version 1.0
         *
         */

if (elgg_is_active_plugin('pages')) {

        $title = elgg_echo('river_activity_3C:page');
	$num = (int) elgg_get_plugin_setting('num_page', 'river_activity_3C');
        $box_view = elgg_get_plugin_setting('view_riverbox', 'river_activity_3C');
        
	$latest_pages = elgg_get_entities_from_metadata(array(
		"type" => "object",
		"subtype" => "page_top",
                "limit" => $num,
		"full_view" => false,
		"pagination" => false,
		"view_type_toggle" => false
        ));
	
        if ($latest_pages) {
                elgg_push_context('widgets');
                $river_body = '';
                foreach ($latest_pages as $latest_page) {
                        $river_body .= elgg_view_entity($latest_page, array('full_view' => false));
                }
                elgg_pop_context();
                $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'pages/all"><b>'.elgg_echo('river_activity_3C:viewmore').'</b></a></p>';
        }else {
            $river_body = elgg_echo ("river_activity_3C:page-no");
        }
        echo elgg_view_module($box_view, $title, $river_body);
        
}        
        
