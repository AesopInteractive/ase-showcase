<?php

get_header();

	?>
	<div class="ase-showcase-wrap">

		<div class="ase-showcase-submit">
			<div class="ase-stacked-title">
				<h1 class="tac zmb ase-blue">Aesop Story Engine in the wild</h1>
				<h2 class="tac">help inspire others by sharing your aesop powered creation</h2>
			</div>
			<a href="#showcase-modal" class="btn btn-red" data-toggle="modal">Add to Showcase</a>
			<div class="modal fade showcase-modal" id="showcase-modal" tabindex="-1" role="dialog">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-body">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h2>Add your project</h2>
			          	<?php echo do_shortcode('[gravityform id="3" name="Showcase" title="false" description="false" ajax="true"]');?>
			        </div>
			      </div>
			    </div>
		  	</div>
		</div>

		<div class="ase-content ase-showcase-grid">

			<div class="showcase-row">
				<?php

				$index = 0;
				if ( have_posts() ) : while( have_posts() ) : the_post();

				$index++;
				$count = 9;

				$thumb_id = get_post_thumbnail_id();
				$thumb_url = wp_get_attachment_image_src($thumb_id,'ase-showcase-img', true);

				$siteurl = get_post_meta(get_the_ID(), 'ase_showcase_site_url', true);

				$id = get_the_ID();

				?>
				<div class="ase-showcase-item col-md-4">
					<img class="ase-img" src="<?php echo $thumb_url[0];?>">
					<div class="ase-showcase-item-inner">
						<?php

						the_title('<h4>','</h4>');

						echo wpautop(wp_trim_words(get_the_content(),36,'...'));

						if( current_user_can('editor') || current_user_can('administrator') ) {

							$url = admin_url( 'post.php?post='.$id.'&action=edit' );
							printf('<a class="showcase-item-edit" style="font-size:14px;margin:0;padding-left:0.5rem;" href="%s">(edit)</a>',$url );
						}

						?>
					</div>
					<a href="<?php echo $siteurl;?>" class="btn btn-primary">Visit Project</a>
				</div>
				<?php

				if ( ( 0 == $index % 3 )) {

					printf('</div><div class="showcase-row">');
				}

				endwhile;endif; ?>
			</div>

		</div>

		<div class="ase-pagination clearfix ase-content">
			<?php echo ase_get_pagination(); ?>
		</div>

	</div>
	<?php

get_footer();