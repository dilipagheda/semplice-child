
<?php if(have_posts()) : ?>
	
<div class="container">
	<div class="row mb-5">
		<?php $count=0; while(have_posts()) : the_post(); 
			if($count==0) : 
				get_template_part('partials/hero-one');
			else :  
				if($count==1) : 
					get_template_part('partials/hero-two');
				else:
					if($count==2):
						get_template_part('partials/hero-three');
					else:
						if($count==9):
							get_template_part('partials/hero-one');
						else:
							get_template_part('partials/blog-normal');
						endif;
					endif;
				endif;	
			endif;	
			$count++;
			endwhile; ?>
				

	</div>
</div>
<?php endif; ?>
