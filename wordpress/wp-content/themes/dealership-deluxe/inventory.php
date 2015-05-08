<?php
/*
Template Name: Full Inventory
*/
?>
<?php get_header(); ?>
            <div id="sidebar-search" > 
		<?php if ( ! dynamic_sidebar( 'Search Module' )) : ?>
				<?php endif; ?>
				</div>
	<div id="content-single">
		<div class="tri-col-span" >
			<div class="detail-page-content-fix">
		<?php cps_ajax_search_results(); ?>
<div class="cpsAjaxLoaderResults" ></div> 
			</div>			
		</div>
	</div>
		<div id="sidebar" class="common"> 
            	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<?php endif; ?>
			</div></div>
			<div class="clearfix"></div>
		<div style="clear:both"></div>
<?php get_footer(); ?>