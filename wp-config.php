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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'arr-mk2' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
	define('AUTH_KEY',         '046CgX{IKY h{NC|JVk62`+Z(,ua/+DWI7y3`E#xIu}$HHd#Ub7tpNWA`G|*{z`1');
	define('SECURE_AUTH_KEY',  '[-0_0vlX;u12#b{rT=9(.s_L ]sw$9M~~rWkU+u:x~57AC tS`b@;d|O$|WE@hBk');
	define('LOGGED_IN_KEY',    'F;BJ/{8K|{h+CV{+RtFMI}}D0ghl57YC#lyT=D^*[g(??@TnYYi)_Dd36P0Vb(5-');
	define('NONCE_KEY',        '/(k^LysuIk6XAR>.wAysh7tWk{Kql~IF?#(Uk.d*VJ(paIm9x+PGsi&Z+7{-#IHw');
	define('AUTH_SALT',        '9/W:qTy/jJpq&>h<PgNX6U[=Up*ZtrAN7Z f86v+ZwroI[8^1Ld+d=6;JXj7~oo[');
	define('SECURE_AUTH_SALT', 'U7$`S~d&TG8KuPxh=I2+-:p_V[&}gAW]&!kma1@B0lzeRO4Va]9~nF6a#qIPYUb)');
	define('LOGGED_IN_SALT',   'V]Iv7Yd7)4y,S Y/?(a;(xSRE|np9A*):ivfJvL}4ASVYTTjn4eHOX?5}ym$B@<*');
	define('NONCE_SALT',       '.z:+@>XDxM.740SO:IZ6LedG=uBd EFMrzt9`[B/ 4g:n][zU<(gGhU>^sVrqPcf');
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
