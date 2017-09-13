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
define('DB_NAME', 'mg_wp');

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
define('AUTH_KEY',         '?Y)0YbeOtmQcTd4@-eB.M2~ep8nqXSA)P,V`qc:yxbz&blizV:_y_+FrDOek!&}z');
define('SECURE_AUTH_KEY',  'Cxt/+0o5=U*VV<n_5^5JeJ^$@6D7H<[ ASURu@+@9_FenJ1M#_l{I|m`aL@[4lo=');
define('LOGGED_IN_KEY',    'd45,_pbNf,jJB7Z<nAs+^YE09=xh#IdJZ9f&X5!$Mf3G-o?ZCOdg0h-}q1  I7By');
define('NONCE_KEY',        'k%yr|)LuP@Xe$AmskK?B?-FwHq^G1wv!-Ue:>fR3 -C.91oO*m-5%:J9<;wCe%*u');
define('AUTH_SALT',        'eK@!Xx}GU`%Z$-{$Qrap6s.Ddoj}Y(#P+J|h0Eu`_aR-rxImC ugfMga/4t*^;TB');
define('SECURE_AUTH_SALT', 'i6T;A>1-C]hyec51Jj2|tMR{ir8jcKeK!BJ3,QQoyqp!?.j{ma[d}IAYUz0)Oa5a');
define('LOGGED_IN_SALT',   '@;_=iL>?&$+]65fcs?_j5_d]lMHXG^}M}k0MEfu4+e5@qqfdydR%SS`pQsS$S*q0');
define('NONCE_SALT',       '@f:!_RTx[6o5ADf_, JbvcBI*$PSUkrd<hseoKC]X6tAcsCKl%>PBa9=F~`VbYy6');

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
