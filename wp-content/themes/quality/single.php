<?php
get_header();
?>
<section id="section-block" class="site-content">

	<div class="container">
        <div class="breadcrumbs" typeof="BreadcrumbList">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>
		<div class="row">
		<!--Blog Posts-->
		<?php echo '<div class="col-md-'.( !is_active_sidebar( "sidebar-primary" ) ?"12" :"8" ).' col-xs-12">'; ?>
			<div class="news">
				
				<?php while ( have_posts() ) : 
						the_post();
						get_template_part('content','');
					endwhile; ?>
			</div>	
		<?php wp_link_pages();?>
		<!--/Blog Content-->
		<?php comments_template('',true); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
</section>
<?php get_footer(); ?>