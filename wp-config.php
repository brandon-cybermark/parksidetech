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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'parksidetech' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'i#KCb-DzC?a|=7(Ttv&Tqm<?gnw!z@.Go5zwB}P$&*?gqN^q8|GBt,1+bU$|_2SS');
define('SECURE_AUTH_KEY',  'EJ!2v,`&(H)hw.}iEnujmuLh>fZFTQ)L9<0R VnT|`;K0;BiYgrb;Yx iw^0-N(|');
define('LOGGED_IN_KEY',    'OQ KL+<Y:u4);4t08lMEOCogaq9FTF !%Z.dXfA15KK)3Z!WtbC[|I:i6a/-JGhq');
define('NONCE_KEY',        '@1NB9&[#lftm4s&ch-~3`)Lw|%11.C+N|md f#=x3W/>Q13B>8+^|<f !qz.B84_');
define('AUTH_SALT',        'Xh?q[cm0EBMfB#H.oC5fb|3i)VwGlK2)U48i[-hCYr-g]RPgrFKW}v_=%wH{.a-3');
define('SECURE_AUTH_SALT', 'YO-WSw<3>|D*<yrN|&5X}W%^v>s;K>%;RDQJc+axP>JsgYTb4+29aGY$sl_*<y3,');
define('LOGGED_IN_SALT',   'n7etWD+NA9o3fool+E=AIP?,En5=:_v|^HUH;GE#ZMU7 RSq0Q..{RVkg8V|CD#D');
define('NONCE_SALT',       '6esHoP|%i${Xz|!eJD<;{3OGgm.nRf!`z{~/$c,.F2y<Xp,-^ME{qsZ@PxdtpN)c');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'elevative_cms_';

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
define( 'WP_DEBUG', true );
define('ALLOW_UNFILTERED_UPLOADS', true);
define('WP_MEMORY_LIMIT', '512M');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
