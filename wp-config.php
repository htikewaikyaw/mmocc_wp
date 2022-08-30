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
define( 'DB_NAME', 'mmoccbackuptest24' );

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
define( 'AUTH_KEY',         'zcNUbqBvOX3Z;`jolH1F;?/:M3K?;Lbv@~7GxGd@&G40<00,)#;OWZ9Ua?Vb69(t' );
define( 'SECURE_AUTH_KEY',  'jyw5)r<) u_O1>Jx<,^?+/;XI?zMNc@dL$x@zutyZRmr)_65q;eEXTd4:`,T}Q]H' );
define( 'LOGGED_IN_KEY',    'Bo[@_QEwT:>$bI~V>m2x,1O)iV4q9Xp^0_0`F~4{ac#t}!)M~c0DyHUhF.{$v((~' );
define( 'NONCE_KEY',        'tUZ<;&To~VrGt!ttwXTxA7{r0cHAg:>f$>8#gX[$_2@M#_]tWXIXF{1bz`V#0^,z' );
define( 'AUTH_SALT',        'J$s!a%*yKD:qa5HLEH.vSC:Nvgm8xqnQwwIa6`)KVpMc~U$pSlkwlrB?MgZ},Rd|' );
define( 'SECURE_AUTH_SALT', '<L;LMZQ+=u?3G~;|OnAZKLnX$_(~{Iqq%,u~!ms-w*D?>QhXeW~cXzVfW3^I##NP' );
define( 'LOGGED_IN_SALT',   'Y q9tlinWSX0a1d8udX/)4)j!j>&9s1?$= FY1wb+`t -Q&ym^!< 76zaxA:>L#b' );
define( 'NONCE_SALT',       ',6x*CsRs-W9. `L1kSp}J_PhtiZ5EmIhLKD=AwLOO sSY:/eAO2)_s^Ou(R~KAmt' );

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
