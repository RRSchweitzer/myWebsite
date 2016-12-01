<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 11/17/16
 * Time: 9:05 PM
 */

?>

<?php get_header(); ?>
<div id="hero" class"picture" style="background-image:url(<?php the_field('hero_image_1');?>)"></div>
<div class="content-row">
    <div class="content-text">
        <?php the_field('section_1'); ?>
    </div>
</div>
<div id="thinker" class"picture" style="background-image:url(<?php the_field('hero_image_2');?>)"></div>
<div class="content-row">
    <div class="content-text">
        <?php the_field('section_2'); ?>
    </div>
</div>
<div class="third-image" id="biggity" style="background-image:url(<?php the_field('hero_image_3');?>)"></div>
<div class="content-row">
    <div class="content-text">
        <?php the_field('section_3'); ?>
    </div>
</div>



<?php get_footer(); ?>

