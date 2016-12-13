<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 12/13/16
 * Time: 6:09 PM
 */
?>
<?php get_header(); ?>

<?php //First Block ?>
<div id="hero" class="hero-image" style="background-image:url(<?php the_field('hero_image_1');?>)">
    <div class="hero-text">
        <?php the_field('hero_text_1');?>
    </div>
</div>
<div class="content-row">
    <div class="content-text">
        <?php the_field('section_1'); ?>
    </div>
</div>

<?php //Second Block ?>
<div class="hero-image" style="background-image:url(<?php the_field('hero_image_2');?>)">
    <div class="hero-text">
        <?php the_field('hero_text_2');?>
    </div>
</div>
<div class="content-row">
    <div class="content-text">
        <?php the_field('section_2'); ?>
    </div>
</div>


<?php //Third Block ?>
<div class="hero-image" style="background-image:url(<?php the_field('hero_image_3');?>)">
    <div class="hero-text">
        <?php the_field('hero_text_3');?>
    </div>
</div>
<div class="content-row">
    <div class="content-text">
        <?php the_field('section_3'); ?>
    </div>
</div>
<?php get_footer(); ?>

