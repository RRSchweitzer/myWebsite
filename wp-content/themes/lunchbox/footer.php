<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 11/17/16
 * Time: 9:04 PM
 */
?>
<link
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
    rel="stylesheet"  type='text/css'>
        <div id="footer">
            <?php if(is_front_page()): ?>
                <a href="#header" class="back-to-top">
                    <span>Top</span>
                </a>
            <?php endif; ?>
            <div class="footer-wrapper">
                <div class="nav">
                    <div class="footer-icon">
                        <a href="http://codepen.io/rrschweitzer" class="fa fa-codepen" aria-hidden="true"></a>
                    </div>
                    <div class="footer-icon">
                        <a href="https://github.com/RRSchweitzer" class="fa fa-github"></a>
                    </div>
                    <div class="footer-icon">
                        <a href="https://www.linkedin.com/in/rrschweitzer" class="fa fa-linkedin"></a>
                    </div>
                </div>
            </div>
        </div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/g.js" type="text/javascript"></script>
<?php wp_footer(); ?>
    </body>
</html>
