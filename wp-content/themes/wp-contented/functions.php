<?php

// LOAD wpcontented CORE (if you remove this, the theme will break)
require_once( 'library/wpcontented.php' );


function wpcontented_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'wpcontented', get_template_directory() . '/library/translation' );


  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'wpcontented_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'wpcontented_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'use_default_gallery_style', '__return_false' ); 

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'wpcontented_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  wpcontented_theme_support();
  remove_theme_support( 'custom-header' ); 
  current_theme_supports( 'menus' );
  // adding sidebars to WordPress (these are created in functions.php)
  add_action( 'widgets_init', 'wpcontented_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'wpcontented_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'wpcontented_excerpt_more' );

  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;

} /* end wpcontented ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'wpcontented_ahoy' );

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpcontented-thumb-600', 600, 150, true );
add_image_size( 'wpcontented-thumb-300', 300, 100, true );
add_image_size( 'wpcontented-home-1000', 1000, 500, true );
add_image_size( 'wpcontented-slider-image', 1280, 500, true );
add_image_size( 'wpcontented-thumb-image-300by300', 300, 300, true );



add_filter( 'image_size_names_choose', 'wpcontented_custom_image_sizes' );
function wpcontented_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'wpcontented-thumb-600' => '600px by 150px',
        'wpcontented-thumb-300' => '300px by 100px',
        'wpcontented-slider-image' => '1280px by 500px'
    ) );
}


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function wpcontented_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Menu Widget Area', 'wpcontented' ),
    'description' => __( 'The Menu Widget Area.', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'sidebar2',
    'name' => __( 'Homepage Widget Area', 'wpcontented' ),
    'description' => __( 'The Homepage Widget Area.', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'sidebar3',
    'name' => __( 'Posts Widget Area', 'wpcontented' ),
    'description' => __( 'The Posts Widget Area.', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'sidebar4',
    'name' => __( 'Page Widget Area', 'wpcontented' ),
    'description' => __( 'The Page Widget Area.', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

   register_sidebar(array(
    'id' => 'sidebar5',
    'name' => __( 'Archive Widget Area', 'wpcontented' ),
    'description' => __( 'The Archive Widget Area.', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'featured-page-1',
    'name' => __( 'Featured Page Widget Area 1', 'wpcontented' ),
    'description' => __( 'The Featured Page Widget Area 1', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'featured-page-2',
    'name' => __( 'Featured Page Widget Area 2', 'wpcontented' ),
    'description' => __( 'The Featured Page Widget Area 2', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'featured-page-3',
    'name' => __( 'Featured Page Widget Area 3', 'wpcontented' ),
    'description' => __( 'The Featured Page Widget Area 3', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'featured-page-4',
    'name' => __( 'Featured Page Widget Area 4', 'wpcontented' ),
    'description' => __( 'The Featured Page Widget Area 4', 'wpcontented' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));


} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function wpcontented_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="//www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=100" class="load-gravatar avatar avatar-48 photo" height="100" width="100" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'wpcontented' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'wpcontented' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'wpcontented' ),'  ','') ) ?>
        <br>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'wpcontented' )); ?> </a></time>
        <?php comment_text() ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </section>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


function wpcontented_fonts() {
  wp_enqueue_style('wpcontentedFonts', get_template_directory_uri() . '/fonts/fonts.css');
}

add_action('wp_print_styles', 'wpcontented_fonts');

/*******************************************************************
* These are settings for the Theme Customizer in the admin panel. 
*******************************************************************/
if ( ! function_exists( 'wpcontented_theme_customizer' ) ) :
  function wpcontented_theme_customizer( $wp_customize ) {
    
    $wp_customize->remove_section( 'title_tagline');
    $wp_customize->remove_section( 'featured_front_page' );
  
  
    /* color scheme option */
    $wp_customize->add_setting( 'wpcontented_color_settings', array (
      'default' => '#333',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wpcontented_color_settings', array(
      'label'    => __( 'Primary Color Scheme', 'wpcontented' ),
      'section'  => 'colors',
      'settings' => 'wpcontented_color_settings',
    ) ) );


    $wp_customize->add_setting( 'wpcontented_color_settings_2', array (
      'default' => '#ffb83a',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wpcontented_color_settings_2', array(
      'label'    => __( 'Secondary Color Scheme', 'wpcontented' ),
      'section'  => 'colors',
      'settings' => 'wpcontented_color_settings_2',
    ) ) );
    
    /* logo option */
    $wp_customize->add_section( 'wpcontented_logo_section' , array(
      'title'       => __( 'Site Logo', 'wpcontented' ),
      'priority'    => 1,
      'description' => __( 'Upload a logo to replace the default site name in the header', 'wpcontented' ),
    ) );
    
    $wp_customize->add_setting( 'wpcontented_logo', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpcontented_logo', array(
      'label'    => __( 'Choose your logo (max-width is 350px)', 'wpcontented' ),
      'section'  => 'wpcontented_logo_section',
      'settings' => 'wpcontented_logo',
    ) ) );
  
    /* favicon option */
    $wp_customize->add_section( 'wpcontented_favicon_section' , array(
      'title'       => __( 'Site favicon', 'wpcontented' ),
      'priority'    => 2,
      'description' => __( 'Upload a favicon', 'wpcontented' ),
    ) );
    
    $wp_customize->add_setting( 'wpcontented_favicon', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpcontented_favicon', array(
      'label'    => __( 'Choose your favicon (ideal width and height is 16x16 or 32x32)', 'wpcontented' ),
      'section'  => 'wpcontented_favicon_section',
      'settings' => 'wpcontented_favicon',
    ) ) );
    
    /* social media option */
    $wp_customize->add_section( 'wpcontented_social_section' , array(
      'title'       => __( 'Social Media Icons', 'wpcontented' ),
      'priority'    => 32,
      'description' => __( 'Optional media icons in the header', 'wpcontented' ),
    ) );
    
    $wp_customize->add_setting( 'wpcontented_facebook', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_facebook', array(
      'label'    => __( 'Enter your Facebook url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_facebook',
      'priority'    => 101,
    ) ) );
  
    $wp_customize->add_setting( 'wpcontented_twitter', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_twitter', array(
      'label'    => __( 'Enter your Twitter url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_twitter',
      'priority'    => 102,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_google', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_google', array(
      'label'    => __( 'Enter your Google+ url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_google',
      'priority'    => 103,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_pinterest', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_pinterest', array(
      'label'    => __( 'Enter your Pinterest url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_pinterest',
      'priority'    => 104,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_linkedin', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_linkedin', array(
      'label'    => __( 'Enter your Linkedin url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_linkedin',
      'priority'    => 105,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_youtube', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_youtube', array(
      'label'    => __( 'Enter your Youtube url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_youtube',
      'priority'    => 106,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_tumblr', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_tumblr', array(
      'label'    => __( 'Enter your Tumblr url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_tumblr',
      'priority'    => 107,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_instagram', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_instagram', array(
      'label'    => __( 'Enter your Instagram url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_instagram',
      'priority'    => 108,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_flickr', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_flickr', array(
      'label'    => __( 'Enter your Flickr url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_flickr',
      'priority'    => 109,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_vimeo', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_vimeo', array(
      'label'    => __( 'Enter your Vimeo url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_vimeo',
      'priority'    => 110,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_rss', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_rss', array(
      'label'    => __( 'Enter your RSS url', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_rss',
      'priority'    => 112,
    ) ) );
    
    $wp_customize->add_setting( 'wpcontented_email', array (
      'sanitize_callback' => 'sanitize_email',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_email', array(
      'label'    => __( 'Enter your email address', 'wpcontented' ),
      'section'  => 'wpcontented_social_section',
      'settings' => 'wpcontented_email',
      'priority'    => 113,
    ) ) );
    
    /* slider options */
    
    $wp_customize->add_section( 'wpcontented_slider_section' , array(
      'title'       => __( 'Slider Settings', 'wpcontented' ),
      'priority'    => 33,
      'description' => __( 'Adjust the behavior of the image slider.', 'wpcontented' ),
    ) );

    $wp_customize->add_setting( 'wpcontented_slider_area', array (
      'sanitize_callback' => 'wpcontented_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control('slider_area', array(
      'settings' => 'wpcontented_slider_area',
      'label' => __('Disable home page slider?', 'wpcontented'),
      'section' => 'wpcontented_slider_section',
      'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting( 'wpcontented_slider_effect', array(
      'default' => __('scrollHorz','wpcontented'),
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'effect_select_box', array(
      'settings' => 'wpcontented_slider_effect',
      'label' => __( 'Select Effect:', 'wpcontented' ),
      'section' => 'wpcontented_slider_section',
      'type' => 'select',
      'choices' => array(
        'scrollHorz' => __('Horizontal (Default)','wpcontented'),
        'scrollVert' => __('Vertical','wpcontented'),
        'tileSlide' => __('Tile Slide','wpcontented'),
        'tileBlind' => __('Blinds','wpcontented'),
        'shuffle' => __('Shuffle','wpcontented'),
      ),
    ));
    
    $wp_customize->add_setting( 'wpcontented_slider_timeout', array (
      'sanitize_callback' => 'wpcontented_sanitize_integer',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wpcontented_slider_timeout', array(
      'label'    => __( 'Autoplay Speed in Seconds', 'wpcontented' ),
      'section'  => 'wpcontented_slider_section',
      'settings' => 'wpcontented_slider_timeout',
    ) ) );

     /* author bio in posts option */
    $wp_customize->add_section( 'wpcontented_posts_section' , array(
      'title'       => __( 'Post Settings', 'wpcontented' ),
      'priority'    => 35,
      'description' => __( '', 'wpcontented' ),
    ) );
    
    $wp_customize->add_setting( 'wpcontented_author_bio', array (
      'sanitize_callback' => 'wpcontented_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control('author_bio', array(
      'settings' => 'wpcontented_author_bio',
      'label' => __('Disable the Author Bio?', 'wpcontented'),
      'section' => 'wpcontented_posts_section',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'wpcontented_related_posts', array (
      'sanitize_callback' => 'wpcontented_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control('related_posts', array(
      'settings' => 'wpcontented_related_posts',
      'label' => __('Disable the Related Posts?', 'wpcontented'),
      'section' => 'wpcontented_posts_section',
      'type' => 'checkbox',
    ));

     $wp_customize->add_setting( 'wpcontented_post_widget_area', array (
      'sanitize_callback' => 'wpcontented_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control('post_widget_area', array(
      'settings' => 'wpcontented_post_widget_area',
      'label' => __('Disable widget area?', 'wpcontented'),
      'section' => 'wpcontented_posts_section',
      'type' => 'checkbox',
    ));
    
    $wp_customize->remove_section( 'nav');
  
  }
endif;

add_action('customize_register', 'wpcontented_theme_customizer');

add_filter( 'comment_form_defaults', 'wpcontented_remove_comment_form_allowed_tags' );
function wpcontented_remove_comment_form_allowed_tags( $defaults ) {

  $defaults['comment_notes_after'] = '';
  return $defaults;

}


/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'wpcontented_sanitize_checkbox' ) ) :
  function wpcontented_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
      return 1;
    } else {
      return '';
    }
  }
endif;


/**
 * Sanitize integer input
 */
if ( ! function_exists( 'wpcontented_sanitize_integer' ) ) :
  function wpcontented_sanitize_integer( $input ) {
    return absint($input);
  }
endif;
/**
* Apply Color Scheme
*/

if ( ! function_exists( 'wpcontented_apply_color' ) ) :
  function wpcontented_apply_color() {
    if ( get_theme_mod('wpcontented_color_settings') ) {
   ?>
  <style>
      body.home .side-nav span.fa-bars, body.archive .side-nav span,body.search .side-nav span,body.home #logo a, body.archive #logo a,body.search #logo a,body.home .social-icons a .fa, body.archive .social-icons a .fa
      body.search .social-icons a .fa,.blog-list .item h2 a,footer.footer[role="contentinfo"] p,.article-header h1,body .next-prev-post a,body .after-content-area footer .section-title
      ,body .info p.author,body .after-content-area h3.section-title, body .comment-reply-title,body .related ul li .related-info h3 a,body cite.fn,
      body .comment-reply-link:focus, body .comment-reply-link,.tag-links a,.tag-links,.scrollToTop,.widget h4.widgettitle,body.archive .archive-title,body.search .archive-title,body.page-template-template-featured .side-nav span,
      body.page-template-template-featured #logo a,body.page-template-template-featured .social-icons a .fa{color: <?php echo get_theme_mod('wpcontented_color_settings'); ?>!important;}

      .blog-list .item .no-featured-image,.widget #wp-calendar caption,.blog-list .item .format-link,
      .ias-trigger a,.no-more-post,.full-top-area,.blue-btn, .comment-reply-link, #submit,.slides .slide-noimg,button, html input[type="button"], input[type="reset"], input[type="submit"]{background:<?php echo get_theme_mod('wpcontented_color_settings'); ?>; }
  
      .sidebar-area .no-widgets-here p{border: 1px solid <?php echo get_theme_mod('wpcontented_color_settings'); ?>;}
  </style>
   <?php
    }

     if ( get_theme_mod('wpcontented_color_settings') ) {
   ?>
  <style>
     body.home .site-description a, body.archive .site-description a,body.search .site-description a,.slide-copy-wrap .date,.slide-copy-wrap .date a,.blog-list .item time,.blog-list .item a,
     .blog-list .item .date, .blog-list .item .quote-source,.ias-trigger a,footer.footer[role="contentinfo"] a,footer.footer[role="contentinfo"] span,
     footer.footer[role="contentinfo"] a:hover,.no-menu-widgets p,.title-wrap .date,.title-wrap .date a,.social-icons a .fa:hover,.entry-content p a{color: <?php echo get_theme_mod('wpcontented_color_settings_2'); ?>;}
     .bt-menu-open span,#main-navigation .widgettitle,body.page-template-template-featured .site-description a,.featured-widgets .featured-widgets-item .widget h4.widgettitle{color: <?php echo get_theme_mod('wpcontented_color_settings_2'); ?>!important;}

     .entry-content blockquote, .entry-content .chat-content, .single .status-content, .entry-content .format-link{border-color:<?php echo get_theme_mod('wpcontented_color_settings_2'); ?>;}
  
     .blog-list li .the-post-image span.fa{background: <?php echo get_theme_mod('wpcontented_color_settings_2'); ?>;}

     .blue-btn:hover, .comment-reply-link:hover, #submit:hover, .blue-btn:focus, .comment-reply-link:focus, #submit:focus{
  background-color: <?php echo get_theme_mod('wpcontented_color_settings_2'); ?>;}
  
  </style>
   <?php
    }

    
  }
endif;
add_action( 'wp_head', 'wpcontented_apply_color' ); 

if ( ! function_exists( 'wpcontented_apply_color_2' ) ) :
  function wpcontented_apply_color_2() {
      if ( is_super_admin() ) { ?> <style>@media screen and (max-width: 768px) { body .header[role="banner"]{margin-top: 50px;}}</style> <?php }
    }
endif;
add_action( 'wp_head', 'wpcontented_apply_color_2' ); 
/*-----------------------------------------------------------------------------------*/
/* custom functions below */
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 600, 600 );
}
define( 'NO_HEADER_TEXT', true );
define('THEMEURL', get_template_directory_uri());
define('IMAGES', THEMEURL.'/images'); 
define('JS', THEMEURL.'/js');
define('CSS', THEMEURL.'/css');
add_filter( 'post_thumbnail_html', 'wpcontented_remove_thumbnail_dimensions', 10, 3 );

function wpcontented_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'the_content', 'wpcontented_remove_br_gallery', 11, 2);
function wpcontented_remove_br_gallery($output) {
    return preg_replace('/<br style=(.*)>/mi','',$output);
}

function wpcontented_author_excerpt() {
      $text_limit = 50; //Words to show in author bio excerpt
      $read_more  = __('Read more','wpcontented'); //Read more text
      $end_of_txt = "...";
      $short_desc_author = wp_trim_words(strip_tags(
                          get_the_author_meta('description')), $text_limit, 
                          $end_of_txt
                        );

      return $short_desc_author;
}

function wpcontented_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function wpcontented_catch_that_image() {
  global $post;
  $pattern = '|<img.*?class="([^"]+)".*?/>|';
  $transformed_content = apply_filters('the_content',$post->post_content);
  preg_match($pattern,$transformed_content,$matches);
  if (!empty($matches[1])) {
    $classes = explode(' ',$matches[1]);
    $id = preg_grep('|^wp-image-.*|',$classes);
    if (!empty($id)) {
      $id = str_replace('wp-image-','',$id);
      if (!empty($id)) {
        $id = reset($id);
        $transformed_content = wp_get_attachment_url($id);  
        return $transformed_content;
      }
    }
  }
  
}

function wpcontented_catch_that_image_thumb() {
  global $post;
  $pattern = '|<img.*?class="([^"]+)".*?/>|';
  $transformed_content = apply_filters('the_content',$post->post_content);
  preg_match($pattern,$transformed_content,$matches);
  if (!empty($matches[1])) {
    $classes = explode(' ',$matches[1]);
    $id = preg_grep('|^wp-image-.*|',$classes);
    if (!empty($id)) {
      $id = str_replace('wp-image-','',$id);
      if (!empty($id)) {
        $id = reset($id);
        $transformed_content = wp_get_attachment_image($id,'thumbnail');  
         return $transformed_content;
      }
    }
  }
 
}

function wpcontented_catch_that_image_home() {
  global $post;
  $pattern = '|<img.*?class="([^"]+)".*?/>|';
  $transformed_content = apply_filters('the_content',$post->post_content);
  preg_match($pattern,$transformed_content,$matches);
  if (!empty($matches[1])) {
    $classes = explode(' ',$matches[1]);
    $id = preg_grep('|^wp-image-.*|',$classes);
    if (!empty($id)) {
      $id = str_replace('wp-image-','',$id);
      if (!empty($id)) {
        $id = reset($id);
        $transformed_content = wp_get_attachment_image($id,'wpcontented-home-1000');  
         return $transformed_content;
      }
    }
  }
 
}

function wpcontented_catch_gallery_image_full()  { 
    global $post;
    $gallery = get_post_gallery( $post, false );
    if ( !empty($gallery['ids']) ) {
      $ids = explode( ",", $gallery['ids'] );
      $total_images = 0;
      foreach( $ids as $id ) {
        $link = wp_get_attachment_url( $id );
        $total_images++;
        
        if ($total_images == 1) {
          $first_img = $link;
          return $first_img;
        }
      }
    } 
}

function wpcontented_catch_gallery_image_thumb()  { 
    global $post;
    $gallery = get_post_gallery( $post, false );
    if ( !empty($gallery['ids']) ) {
      $ids = explode( ",", $gallery['ids'] );
      $total_images = 0;
      foreach( $ids as $id ) {
        
        $image  = wp_get_attachment_image( $id, 'thumbnail');
        $total_images++;
        
        if ($total_images == 1) {
          $first_img = $image;
          return $first_img;
        }
      }
    } 
}

function wpcontented_catch_gallery_image_home()  { 
    global $post;
    $gallery = get_post_gallery( $post, false );
    if ( !empty($gallery['ids']) ) {
      $ids = explode( ",", $gallery['ids'] );
      $total_images = 0;
      foreach( $ids as $id ) {
        
        $image  = wp_get_attachment_image( $id, 'wpcontented-home-1000');
        $total_images++;
        
        if ($total_images == 1) {
          $first_img = $image;
          return $first_img;
        }
      }
    } 
}
/*social icons*/
function wpcontented_social_icons() {
    $social_networks = array(
      "wpcontented_facebook" => "fa-facebook", "wpcontented_twitter" => "fa-twitter", "wpcontented_google" => "fa-google-plus",
      "wpcontented_pinterest" => "fa-pinterest", "wpcontented_linkedin" => "fa-linkedin", "wpcontented_youtube" => "fa-youtube",
      "wpcontented_tumblr" => "fa-tumblr", "wpcontented_instagram" => "fa-instagram", "wpcontented_flickr" => "fa-flickr",
      "wpcontented_vimeo" => "fa-vimeo-square", "wpcontented_rss" => "fa-rss"
  );

  foreach ($social_networks as $key => $icon) {
     
      if (get_theme_mod( $key )){ ?>
       <a href="<?php echo esc_url( get_theme_mod($key) ); ?>" class="social-tw" title="<?php echo esc_url( get_theme_mod( $key ) ); ?>" target="_blank"><i class="fa <?php echo $icon; ?>"></i></a>
      <?php }
  }

  if(get_theme_mod('wpcontented_email')): ?>
        <a href="mailto:<?php echo esc_attr(get_theme_mod('wpcontented_email')); ?>" class="social-tw" title="<?php echo esc_attr( get_theme_mod('wpcontented_email')); ?>" target="_blank"><i class="fa fa-envelope"></i> </i></a>
  <?php endif;
}
/**
 *
 * This script will prompt the users to install the plugin required to
 * enable the "Menu Item" custom post type for magazino theme.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.3.6
 * @author     Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/library/class/class-tgm.php';

add_action( 'wpcontented_register', 'wpcontented_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the wpcontented library
 * and one from the .org repo.
 *
 * The variable passed to wpcontented_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into wpcontented_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function wpcontented_register_required_plugins() {
 
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
 
 
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => false,
        ),
 
    );
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'wpcontented-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'wpcontented' ),
            'menu_title'                      => __( 'Install Plugins', 'wpcontented' ),
            'installing'                      => __( 'Installing Plugin: %s', 'wpcontented' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'wpcontented' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'wpcontented' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'wpcontented' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'wpcontented' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    wpcontented( $plugins, $config );
 
}
/* DON'T DELETE THIS CLOSING TAG */ ?>