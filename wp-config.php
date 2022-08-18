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
define( 'DB_NAME', 'mmoccbackuptest19' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'r=/A6p3v!`t]SXV_,~FK>+M~G~6l@y/KnI<u`>`tNrrt]w?t2#,)8f,8@Iub8v75' );
define( 'SECURE_AUTH_KEY',  'VM|J$2vh`/{8r-vFq(Eu.Rpy25;ggA86ud:C)@YiVCYGWit^]##K%^oAE(XPK)92' );
define( 'LOGGED_IN_KEY',    'htGCq}:+k[ZcD@p(2SjK%r=Hq[f/-n&U+dJYtsbW5xijPQZ~yeFl#?]<ppD0GF;F' );
define( 'NONCE_KEY',        'Hg)|QXO~3TZ`Jt%OOnDI!-/:Vu@Ff-Q(y~ IuE1ZTF4A29 7c@/SDG+#6CDmYOuh' );
define( 'AUTH_SALT',        'JN5M-F@{AY9GTK*90M=(c+wzJMvBZ88b%_LD@w9m:E3t[3}o8){x^&)nY{P[ij^H' );
define( 'SECURE_AUTH_SALT', 'c9S_$!>=eq&.n1{(>`5ePETbntFe(g2MG Ku]PX@z].V2Zv(Tu{d=7#pZ]Am<WQ_' );
define( 'LOGGED_IN_SALT',   'yn Q>G0:ZYuqIG&(7NjkVG{>9*`nKRed9XN97^#?vRx*.t>YHU:vXS6^07[k0<w_' );
define( 'NONCE_SALT',       '9(:K-?yi~G@s!,Q0Ypg>P05^#(VZ@;_NAqg$cX/POO!mBRJ{Qpkju)vI^?^DI98L' );

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
