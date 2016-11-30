<?php
/**
 * Created by PhpStorm.
 * User: Ryan1
 * Date: 11/17/16
 * Time: 9:04 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo get_bloginfo('name'); ?></title>


    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <?php wp_head(); ?>
</head>


<div id="header">
    <div id="nav-wrap">
        <div class="my-name"><a href="/"><?php echo get_bloginfo('name'); ?></a></div>
        <div class="burger">&#9776;</div>
        <div class="left-menu">
            <ul>
                <li><a href="/about">About</a></li>
                <li><a href="/experience">Experience</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="burger-nav">
    <ul class="menu">
        <div class="close-button">&times</div>
        <li><a>About</a></li>
        <li><a>Experience</a></li>
        <li><a>Contact</a></li>
    </ul>
</div>
