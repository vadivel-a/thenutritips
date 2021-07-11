
	<?php $postUrl = get_permalink(); ?>
	<div class="share-button-wrapper">
				<ul class="social">
	        		<li><a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	        		<li><a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $postUrl; ?>"target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				</ul>
	</div>
