
	<?php if ('closed' != $post->comment_status) { ?>
	<div id="commentbox">
		<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
			<p><?php _e('Passwort eingeben, um Kommentare zu sehen.'); ?></p>
		<?php return; endif; ?>
	
		<?php if ( $comments || comments_open()) : ?>
			<h3 id="comments"><?php comments_number('', __('Ein Kommentar'), __('% Kommentare')); ?></h3>
		<?php endif; ?>
	
	<?php if ( $comments ) { ?>
		<ul id="commentlist">
			<?php foreach ($comments as $comment) : ?>
			<li id="comment-<?php comment_ID() ?>">
				<span class="comment_author">
                                        <h4><?php comment_author_link() ?> <?php comment_type('', __('(Trackback)'), __('(Pingback)')); ?></h4>
                                </span>
                                <span class="comment-meta"><a href="#comment-<?php comment_ID() ?>" title="Permalink to comment-<?php comment_ID() ?>"><?php comment_date() ?> um <?php comment_time() ?> Uhr</a>
					<?php edit_comment_link(__("Kommentar bearbeiten"), ' - '); ?></span>
				<div class="comment_text"><?php comment_text() ?></div>
			
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="approve"><?php _e('Dein Kommentar muss erst frei geschaltet werden.') ?></div>
				<?php endif; ?>			
			</li>
			<?php endforeach; ?>
		</ul>
	
	<?php } else { // If there are no comments yet ?>
		<?php if ('open' == $post->comment_status) : ?>
			<p class="small"></p>
		<?php endif; ?>
	<?php } ?>
	
	
	<?php if ('open' == $post->comment_status) : ?>
	
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p><?php _e('Du musst'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('angemeldet'); ?></a> <?php _e('sein ,um zu kommentieren.'); ?></p>
		<?php else : ?>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<h3 id="postcomment"><?php _e('Schreibe einen Kommentar'); ?></h3>
			<div>
			<?php if ( $user_ID ) { ?>
				<p><?php _e('Du bist eingeloggt als'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
				<?php echo $user_identity; ?></a>. 
				<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout"><?php _e('Abmelden'); ?></a></p>
			<?php } else { ?>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" /> <label for="author"><b><?php _e('Name'); ?></b> (benötigt)</label><br />
				
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" /> <label for="email"><b><?php _e('E-Mail'); ?></b></label><br />
				
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" /> <label for="url"><?php _e('URL'); ?> <small>(optional)</small></label><br />

			<?php } ?>
				<!-- <label for="comment"><?php _e('Dein Kommentar'); ?></label><br /> -->
				<textarea name="comment" id="comment" cols="40" rows="10" tabindex="4"></textarea><br />
				<!-- <small><strong>XHTML:</strong>  <?php echo allowed_tags(); ?></small> -->
				<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Absenden'); ?>" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			</div>
			
			<?php do_action('comment_form', $post->ID); ?>	
		</form>
	
	<?php endif; // If registration required and not logged in ?>
	
	<?php endif; ?>
	</div>
	<?php } //if closed ?>
