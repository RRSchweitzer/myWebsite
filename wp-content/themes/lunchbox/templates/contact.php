<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 11/26/16
 * Time: 12:28 PM
 */
?>


<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

    <div id="contact_body">
        <div id="contact_hero" class="hero-image" style="background-image:url(<?php the_field('contact_hero');?>)">
            <div class="hero-text">
                <?php the_field('contact_hero_text');?>
            </div>
        </div>
    </div>
<?php the_field('contact_form_7');?>

<?php get_footer(); ?>