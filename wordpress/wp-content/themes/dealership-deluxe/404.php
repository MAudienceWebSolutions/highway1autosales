<?php get_header(); ?>
            <div id="sidebar-search" > 
		<?php if ( ! dynamic_sidebar( 'Search Module' )) : ?>
				<?php endif; ?>
				</div>
		<?php cps_ajax_search_results(); ?>
		<div id="content-single"><div class="cpsAjaxLoaderCenter"></div> 
			<div class="tri-col-span right detail-page">
			</div>
			<div class="tri-col-span hideOnSearch">
			
                  	<div class="blog-post">
			<h1><?php _e('404 Page Not Found!','language');?></h1>
			<p><?php _e('Sorry, no results found. Please try another search','language');?></p>
		</div>							
										
			</div>			
		</div>
		<div id="sidebar" class="common"> 
            	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<?php endif; ?>
		</div>
	<div class="clearfix"></div>
<div style="clear:both"></div>
<?php get_footer(); ?>