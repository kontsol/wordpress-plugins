<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '}:_iwu$Gue6zG9^@f*Yb>st-pzUMibGSU|fOXVCxs^[wEWL@7qEGoF!sSLyg!HXB' );
define( 'SECURE_AUTH_KEY',   'T|)#&%keQ0$USxAKF4(J!W.u&]19++3&0jVQzT:Gs@RW+j=9}$O`Yu=b:QQWF`5n' );
define( 'LOGGED_IN_KEY',     'nSb1hnc`f/+U#LDua(5<i~;<G[.POW)$5@=.hL`Yv$(3G`X(I`q5)@8#ye [_=)f' );
define( 'NONCE_KEY',         'hs=Bg/34Z?l;DC3_:j>cdw3S,6tPc;X[9VYYhzDt/}n0~q_3dpnGhCy6L1wQT**2' );
define( 'AUTH_SALT',         'V){%<#r&G>*C:g&elOd09d>|Hu-WnU_|m4j.Z*$wcQ8[M?.YJfX+!^Hk!<#wh.xA' );
define( 'SECURE_AUTH_SALT',  'p?^OwfF^-k72gQpiIHcAF=O1C$M(|}u@yZ>rd+z;+q|y?xJ@YBa?B$fTeYif9Pbk' );
define( 'LOGGED_IN_SALT',    'J*Hg$_4y|3bw3X6&)A9.Ds6U]d*)sl@W>9Iu.>yC%A1h$t@fknmO4.4Q%1)jB~uC' );
define( 'NONCE_SALT',        ')qBJKqY{:ASvCli<4fC@Obvwu/UM*mkgu /}U>i@D>BjdC,gbm,tz0u[ip+faQWa' );
define( 'WP_CACHE_KEY_SALT', '0vI*.5B/p8BR?q^$5oGTe+zJ$4q-5}yPBb,&;hDI3>-+!CmRJ`J9go|(Gn16&Z0E' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
