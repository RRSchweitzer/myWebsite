			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="wrap cf">

					<p class="source-org copyright">
						 &#169; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> 
						<span><?php if(is_home()): ?>
							<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wpcontented' ) ); ?>"><?php printf( __( 'Powered by %s', 'wpcontented' ), 'WordPress' ); ?></a> and <a href="<?php echo esc_url( __( 'http://deucethemes.com', 'wpcontented' ) ); ?>"><?php printf( __( '%s', 'wpcontented' ), 'Deuce Themes' ); ?></a>
						<?php endif; ?>
						</span>
					</p>

				</div>

			</footer>


		<a href="#" class="scrollToTop"><span class="fa fa-caret-square-o-up"></span><?php _e('Back to Top','wpcontented'); ?></a>
		<?php wp_footer(); ?>
	</body>

</html> <!-- end of site. what a ride! -->