<?php get_header();?>

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2><?php _e('Archiv f&uuml;r Kategorie &bdquo;'); ?><?php echo single_cat_title(); ?>&ldquo;</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2><?php _e('Tagesarchiv'); ?> <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2><?php _e('Monatsarchiv'); ?> <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2><?php _e('Jahresarchiv'); ?> <?php the_time('Y'); ?></h2>
	<?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2><?php /* Search Count */
							$search_count = 0;
							$search = new WP_Query("s=$s & showposts=-1");
							if ($search->have_posts()) : while($search->have_posts()) : $search->the_post();
								$search_count++;
							endwhile; endif;
							echo $search_count . ' ';
							if ($search_count == 1) { 
							_e('Suchresultat');
							} else {
							_e('Suchresultate');
							}?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2><?php _e('Autoren Archiv'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_tag()) { ?>
		<h2><?php _e('Tag Archiv'); ?></h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2><?php _e('Archiv'); ?></h2>
	<?php } ?>
	
	<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <div class="entry-meta">
                          <ul>
                            <li><span class="meta-start">Veröffentlicht von</span> <a href="<?php echo get_author_posts_url(get_the_author_ID()); ?>"><?php echo get_the_author(); ?></a></li>
                            <li>am <?php echo get_the_time('d.m.Y');?></li>
                            <li>in <?php the_category(', ') ?></li>
                            <li><span class="meta-comments"><?php comments_popup_link('Noch kein Kommentar', 'Ein Kommentar', '% Kommentare', 'comments-link', 'Kommentare sind f&uuml;r diesen Artikel deaktiviert'); ?></span></li>
                            <li><span class="meta-edit"><?php echo edit_post_link("bearbeiten"); ?></span></li>
                          </ul>
                        </div>				
			<div class="story">
			<?php if(is_archive() || is_search()) { ?>
				<?php the_excerpt() ?>
				<p class="textright"><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('... weiterlesen &raquo;'); ?></a></p>
				<p class="info"><?php _e('Aktualisiert am'); ?> <?php the_modified_date(); ?> <?php edit_post_link('Editieren',' &middot; ', ''); ?></p>
			<?php } else { ?>
				<?php the_content("weiterlesen " . the_title('', '', false)); ?>
			 	<?php wp_link_pages(); ?>
			<?php } ?>
			</div>
		
		</div>
	
	<?php endwhile; ?>

        <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Ältere Einträge') ?></div>
                <div class="alignright"><?php previous_posts_link('Neuere Einträge &raquo;') ?></div>
        </div>

	<?php else : ?>

            <h2 class="center">Not Found</h2>
            <p><?php _e('Nichts gefunden, was den Suchkriterien entspricht.'); ?></p>

        <?php endif; ?>

<?php get_footer(); ?>
