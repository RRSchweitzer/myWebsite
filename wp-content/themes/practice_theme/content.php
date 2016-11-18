<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 10/23/16
 * Time: 9:41 PM
 */
?>
<div class="blog-post">
    <h2 class="blog-post-title"><?php the_title(); ?></h2>
    <p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>

    <?php the_content(); ?>

</div><!-- /.blog-post -->
