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
define('AUTH_KEY',         '&zD@P0|5>(EVn96Z,ql@H+~t-ld)~Z!:$bF>lY)M^yp|V>e.!2XL7$yX3IUxFP:Z');
define('SECURE_AUTH_KEY',  'xyL]/-8S5h9AU~.,;#D9R![k A.Y[+N>44wuHvYAq-0dP (GBv:#LJ?g6d5+Ap{c');
define('LOGGED_IN_KEY',    'AgIxd 8>7RrU-Pa:f~&j=VYC&!E+TQTEhHb#,)0+fo4vGjp#uhXadX-(|e%)%~-@');
define('NONCE_KEY',        'NF_/+m+cbW>u&)DTdN/O!1@M&7D-L<-qA,zLY>oBUFjuA|9m#4X|/5=_yURKo/%6');
define('AUTH_SALT',        '#+sG{,g+-JBeglfGb|n4+N7Tg%0hMWnG2K|1F3x$ x QFmG&WBffCYa>V>+d*b{!');
define('SECURE_AUTH_SALT', 'es/v|Tm|K!8d+@W).czKy.gCIa#]6PaDl{f-OY|HX|}G%+JpWd}5 v><?|* p%iV');
define('LOGGED_IN_SALT',   '{K%~ &3O|L2a:-8E$[Zb?oS`xBa{][i|E;rHvR&ZhLl&|h_ku5x~AJE,znx?Py:N');
define('NONCE_SALT',       'd;KO|j8BV.xPb~RV+%?-/i=QGWqLgFp/).W#Lscf9^FN;Lj6VCIpi+lV?%=VO<*&');
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
