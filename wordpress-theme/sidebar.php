			<!-- begin: #col3 static column -->
			<div id="col3">
				<div id="col3_content" class="clearfix">
					<ul class="sidebar">
                		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
                			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
                
                		<?php if (is_archive()) { ?>
                		<li><h2><?php _e('Archiv'); ?></h2>
                			<ul>
                			<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
                			</ul>
                		</li>
                		<?php }
                		endif; // End Widgets ?>
                	</ul>
				</div>
				<div id="ie_clearing">&nbsp;</div>
				<!-- End: IE Column Clearing -->
			</div>
			<!-- end: #col3 -->
