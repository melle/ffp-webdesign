                </div>
                <!-- end #col1_content -->
            </div>
			<!-- end: #col1 -->

            <?php get_sidebar(); ?>
		
        </div>
		<!-- end: #main -->

		<!-- begin: #footer -->
		<div id="footer">
		  &copy; <?php echo date('Y'); ?> &middot; <a accesskey="1" href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> wird angetrieben von <a href="http://www.wordpress.org/">Wordpress</a> &middot; Das Layout basiert auf <a href="http://www.yaml.de">
                    <img border="0" style="position: relative; top: 5px;" alt="based on YAML" src="<?php bloginfo('stylesheet_directory'); ?>/images/yaml_base.gif"/>
                  </a>
        </div>
        <!-- end: #footer -->
		
		<?php wp_footer(); ?>
    </div>
</div>
<!-- <?php echo $wpdb->num_queries . " queries, "; timer_stop(1); echo " seconds"; ?> -->
</body>
</html>