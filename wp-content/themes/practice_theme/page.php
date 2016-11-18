<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 10/25/16
 * Time: 10:57 PM
 */
?>
<?php get_header(); ?>

<div class="row">
    <div class="col-sm-12">

        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();

            get_template_part( 'content', get_post_format() );

        endwhile; endif;
        ?>

    </div> <!-- /.col -->
</div> <!-- /.row -->

<?php get_footer(); ?>
