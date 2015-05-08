<?php
/*
Template Name: News
*/

?>
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
				<?php 					
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$the_query = new WP_Query( 'post_type=post&paged='.$paged.'' );
					while ( $the_query->have_posts() ) : $the_query->the_post();
					global $more;
					$more = 0;
					?>	
                  	<div class="blog-post">                  	
                  		<div class="thumb_articles">					
					  		<a href="<?php the_permalink();?>">
						  		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large');} ?>						
						  	</a>					
					</div>
						<h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
							<?php the_content('<span class="full-article">FULL ARTICLE</span>'); ?>
					</div>
				<?php endwhile;wp_reset_postdata();?>
				<?php theme_pagination( $the_query->max_num_pages); ?>								
			</div>			
		</div>
		<div id="sidebar" class="common">				
            <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
			<?php endif; ?>
		</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>