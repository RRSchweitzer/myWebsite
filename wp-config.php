<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_|r#3$VEA;@E6DP.2-,Wa>btN1)YnTKNIg*H|{.=gL/=#AuvC CWO_Op|F?9gk-(');
define('SECURE_AUTH_KEY',  '[U2@:8sxf4e_31jp>XgvM3i-3]^U+$IFlNy9t^ny#X e ll^nb]MZ%M53Z7l(eJ|');
define('LOGGED_IN_KEY',    'z45bh3JPqJ/lA=oigGH|v_w+L?]iphkA((UU6R5jF]7iaJyGY}P;R]5 RMw<?olx');
define('NONCE_KEY',        ':jT4utb{OB96uHMh1<:/IN7.Xlq9u_b{74PO@sk+e$%u.jU:*}.)a;TRF?;(UeB?');
define('AUTH_SALT',        'cHt}LA>Ijf*BW9b4wf:/kN-7Gw<7nt/izUwL/gK@4pP4(*3^(jJeJ7]j^sv^CY>D');
define('SECURE_AUTH_SALT', '-:GrZr2)P%0mI:!7tvB~BIp|VQp.C&DZZy&4gw%+W9#5Lgp)I`eP:rTyU-DC4cga');
define('LOGGED_IN_SALT',   'p8h]*]/x`nR?8%|H0,BG`0oy>Q3F>-0$F|v3.9X}azYAgh1e^a5-N2m/lwq.zC?G');
define('NONCE_SALT',       'oLq T#``[i*K!)5zlQ~*`hZQQtywcl6,|-`R5d?H9A-.Y1}z(fyqb6]%1|h:W6s ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
