<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 11/17/16
 * Time: 9:05 PM
 */
?>

<?php get_header(); ?>
<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
    } // end while
} // end if
?>



<?php get_footer(); ?>

