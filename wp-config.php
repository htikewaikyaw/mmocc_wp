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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mmoccbackuptest12' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ';x$Z@+!,bf:v+Q=UX$L:zsz3&iLj`Hh~ f8I[*wGt)vy*3boF>/z[(&[D40%0(R)' );
define( 'SECURE_AUTH_KEY',  'OGhUiW)9hq.s1+$x5~lCgJ)JGW|.OV@.R|()C+r_Dwz.0Qgd2#AbhCk-x3!}qk;-' );
define( 'LOGGED_IN_KEY',    '6R_UfCthMh[uy&kE!+c=U~`^UrsjRU b2!9~Al]`Frm7O]R-MCb*Be@~ZR;oCFu>' );
define( 'NONCE_KEY',        'jX5cTA0T1sKN_I7qT)w!y7AUcCB1yS`f~u~2qDBLjbz=+ Bs.}}tM]:tTJNTEQuH' );
define( 'AUTH_SALT',        '7$xaU:?7?#5^C{?&=.+(v}2^wUURZ<Qsr74j2*LIHX]hy*C*=&V~+xx[|Rt}oxAM' );
define( 'SECURE_AUTH_SALT', 'Wx^<)X(xbT C9*~d-/k{f-Z,Gg:Sltz8!2g6[5|/PdMbc2@{Z%1RQzR=7^~(_<D:' );
define( 'LOGGED_IN_SALT',   '(KSH47 9aU]5?G?>:/fvQ:2s^(Zh?#I?nGoF_lT&#[5;4clp(UZ`mcN:P@2M`6Ug' );
define( 'NONCE_SALT',       'pyr:Jri%[{fiGI`Tx]I}_= FdUd/p7}l7Y;d&Y=Aw<Ps9!6%3@O~PAI7)M~p6j~<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
