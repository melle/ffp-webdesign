<?php get_header();?>
	<?php if (have_posts()) { while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
			<p class="post-info"><small>Dieser Eintrag wurde
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						am <?php the_time('j. F Y') ?> um <?php the_time() ?> in <?php the_category(', ') ?> veröffentlicht. <?php if(get_the_tag_list()) { 
                                                  ?><span class="meta-tags">Die Tags sind </span><?php 
                                                  echo  get_the_tag_list('',', ','.');
                                                } ?>

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Du kannst einen <a href="#postcomment">Kommentar hinterlassen</a>, oder einen <a href="<?php trackback_url(); ?>" rel="trackback">Trackback</a> von Deiner eigenen Seite senden.

                                                        Die Kommentare zu diesem Artikel kannst Du als <?php post_comments_feed_link('RSS 2.0'); ?> Feed abonieren.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Die Kommentare sind geschlossen, Du kannst aber einen <a href="<?php trackback_url(); ?> " rel="trackback">Trackback</a> von Deiner eigenen Seite senden.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Du kannst einen <a href="#respond">Kommentar hinterlassen</a>, Trackbacks sind derzeit abgeschaltet.

                                                        Die Kommentare zu diesem Artikel kannst Du als <?php post_comments_feed_link('RSS 2.0'); ?> Feed abonieren.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Kommentare oder Trackbacks sind zur Zeit nicht möglich.
						<?php } ?>

                                                <?php edit_post_link('Du kannst diesen Eintrag bearbeiten','','.'); ?>
                                      </small></p>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; } else { ?>
	<p><?php _e('Nichts gefunden, was den Suchkriterien entspricht.'); ?></p>
	<?php } ?>

<?php get_footer(); ?>