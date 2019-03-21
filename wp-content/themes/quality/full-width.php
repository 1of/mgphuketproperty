<?php
/**
Template Name: Full-width page
*/
get_header();
?>
<div class="clearfix"></div>
<!-- News & Sidebar Section -->
    <section id="section-block" class="site-content">
    <div class="container">
    <div class="breadcrumbs" typeof="BreadcrumbList">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
    </div>
    </section>
	<div class="row">
						<div class="post-content">	
							<?php 
							the_post(); 
							the_content(); ?>
						</div>

	</div>
	<!-- /News & Sidebar Section ---->	
<?php 
get_footer(); ?>