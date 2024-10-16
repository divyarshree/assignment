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
define( 'DB_NAME', 'assignment' );

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
define( 'AUTH_KEY',         'zyM4f4GM XOn^<uc uTmVN8#!jTwaRh0ZNjW4G/z?$;EX(*fnVG$#)j43VQ41L?P' );
define( 'SECURE_AUTH_KEY',  'S]+;9VR;p!e1d46j7b:%)WToWxTP&bU/{RPfwiAk+$$C(xDD<7u@USSf:^uYKOFC' );
define( 'LOGGED_IN_KEY',    'WvD1yTf0EY$?FVCb~^6`0GxuPQ#+-Ne!6h$Q1o~3gZs[>6p0GQF3s!%yco;=MwEm' );
define( 'NONCE_KEY',        'h6ZO.>tV*v1>.MUzV ||@PaZ{vV53r4XALO,22Qm}/xM8/}nqR/<t>a^sJNfR9c]' );
define( 'AUTH_SALT',        '+&o:0%u;xXx*z>=gZD~,E}0+YrRh@`!C^KHp<iDq}cpBe8[7bIXf]u(eTPq`C2D1' );
define( 'SECURE_AUTH_SALT', 'KU;42OSr,8-DjGbv,YtJ}USfQNvmcS.iFrR|^N)rp/LC<?j3Okls]SYbDc0L>N V' );
define( 'LOGGED_IN_SALT',   'M[fJJv<v;z!~d`<]:MN_F?+(c^M2(?o[-Am`B#E`sqVz^J63XhyFZ6#$hWv@(<wV' );
define( 'NONCE_SALT',       '[-(8=luX7iv[]2/KnOS5;lf;T_,,H3#-F%Y`S}h~dH^bs#%,qZE&MXpB.Q%lTQI/' );

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
