<?php
/*
The comments page for wpcontented
*/

// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

?>

<?php // You can start editing here. ?>

  <?php if ( have_comments() ) : ?>

    <h3 id="comments-title" class="h2 section-title"><?php comments_number( __( '<span>No</span> Comments', 'wpcontented' ), __( '<span>1</span> Comment', 'wpcontented' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'wpcontented' ) );?></h3>

    <section class="commentlist">
      <?php
        wp_list_comments( array(
          'style'             => 'div',
          'short_ping'        => true,
          'avatar_size'       => 100,
          'callback'          => 'wpcontented_comments',
          'type'              => 'all',
          'reply_text'        => __('Reply','wpcontented'),
          'page'              => '',
          'per_page'          => '',
          'reverse_top_level' => null,
          'reverse_children'  => ''
        ) );
      ?>
    </section>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav class="navigation comment-navigation" role="navigation">
      	<div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'wpcontented' ) ); ?></div>
      	<div class="comment-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'wpcontented' ) ); ?></div>
    	</nav>
    <?php endif; ?>

    <?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php _e( 'Comments are closed.' , 'wpcontented' ); ?></p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form(); ?>

