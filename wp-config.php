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
define( 'DB_NAME', 'mmocc_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8_general_ci' );

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
define( 'AUTH_KEY',         '}<aK!2QkUbO]OJWP!%Pg1%<RXt:F-WXsri^0nW||_tIOiPk&%].Iulf`hx{;7Mj$' );
define( 'SECURE_AUTH_KEY',  '9:=S-R}x9%GLMBLEGapb*=WPBA?Dqbf%ToVk?<%LPB-#b@rfPmLg_@%}3Alh}#}N' );
define( 'LOGGED_IN_KEY',    'UE_r3qO6Q*wXVv>d1 83l|qq[*m`5S1o/b@Xx7yenR?Issy*su+1)dr!sd6N*$C7' );
define( 'NONCE_KEY',        '&=9*)+uZFdnwDf#^}Z2<:ks[rV8Cd?-|`i=!Y=,1vS=v%Nl hcLE @^HqaL[<!/ ' );
define( 'AUTH_SALT',        'FP#|-U/5)5Kl}{@[GZt|Pf$tA5j<NhD20/S%nqTu`JNhh~bf.M1Dd,Vf/Y(rTZ|4' );
define( 'SECURE_AUTH_SALT', 'B1eyQcU7A<xUWo&ATuPuUC)i5S6[l;%,FP$UaA?H f*@:_1N)S!CHA_>i^6#61#h' );
define( 'LOGGED_IN_SALT',   'B<~QxpF=q&_dN|-.>z&ckSYY.B@>]Y(?!],TN!pLps_~,(07Q% e=>Vg[?7Ofbs3' );
define( 'NONCE_SALT',       'ayC6#uU0^&voXi718O<#8$uPEkU([P.K$tgiZl5WFP&uX|[)!wPH^Hz#xZZlH(=r' );

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
