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
define( 'DB_NAME', 'wordpress_gymfitness' );

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
define( 'AUTH_KEY',         'y/kGXp%ps:PH)JSi#(~1tOb,3lYX|b*(S!Dg!foeu!Fs-u!<2U{pW<dl2/$G#sqi' );
define( 'SECURE_AUTH_KEY',  'mtwDJ$*2{sY>c5t<b4WQBUF0@)ADG0N-qol:OFjB}j6Jj!h>Ra#hmIPX=%w,`~*U' );
define( 'LOGGED_IN_KEY',    'O GQ]_!i?V,5xnqie5YEFmEtN6kjwrYS?JR`aL9elE@!-N[bDyO#,L~([AlUpn^+' );
define( 'NONCE_KEY',        'WOP*TvrbC(Tqv,V2b@%oG%`ZgrD#n|`$LjO$+5m!~gzGXp[uYI4@8CHxN`2c/hD>' );
define( 'AUTH_SALT',        'r&&g;C#UwEMcCUV$5&w6aXxaIi#eGXqf*>,VO9ngdvs~goE^DRus]y8534Xc/Ub>' );
define( 'SECURE_AUTH_SALT', ';cK{*z{ErFcmzf2GQv9> )i[}@H!Zy@~&1K<]yq}b<qG~zuTz<8|t|ijW*`PFzz*' );
define( 'LOGGED_IN_SALT',   'h_HImJ>[mfzkq%:0l* a,?}2a:BZXwVxP;kWV)d;!L_bI=tWnI=3v6$$`jByuY>-' );
define( 'NONCE_SALT',       '6EVp6Be2,cgq0S&h&lRjGxn2a3;e9SHe3C#f,`]Xf(,qfDWyRHXsa<?q$/7;L;:.' );

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
