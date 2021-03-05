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
define( 'DB_NAME', 'smb-template' );

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
define('AUTH_KEY',         'aA1nB$yMfvKY Ex+3Pfq<DNu-(w@C|Z4|8|dD-A<cV[uK~HOQPCyv!5+kW1RSQ>Z');
define('SECURE_AUTH_KEY',  'Fys{U20A4kUK#S/]&o.ocq6AsSVKjIPgfL*(@:k7A|V#P^--r+LWinP1Rd6c,<<7');
define('LOGGED_IN_KEY',    'PqX(o(#E;STJm_.N~Y8R|9,KDOn^pbu!mx-whFIx3^{cx?BSoJognx=Fv8R6q(:%');
define('NONCE_KEY',        'gv8.ZVkJ/gM-Vl7|dX0%gB|`Q=XAD8|3UH*&WBa1Xi$PRVJBK6+orK5d_vjm+mYW');
define('AUTH_SALT',        'SXh$x*h>N;ZX/aqOYY5XSJ<,,bLaWf|zCN51oK0^-_P-l]0r$|p2>_pCY%|jq92|');
define('SECURE_AUTH_SALT', '7X*0+pE,~n7x3|6?bmBr}}^JsId@=o5bTM657fDO(M0W{@y8@P[c 8&c-EE5T-F1');
define('LOGGED_IN_SALT',   '+hvq!dc-zuHmG9*NSM<BUb&H^YSG!dwttQz&mKc0KY0/LB12y57M=m)Rtue8ElJw');
define('NONCE_SALT',       '*qMOg!#;U_vpKPcH~t&e^@n+@z(z4,w,?W=KYbGhv2zi9adb,~$a+D?Rpps-Ui%N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cm_website_';

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
define('WP_DEBUG', true);
define( 'WP_DEBUG_DISPLAY', false );
define('WP_MEMORY_LIMIT', '512M');
define('ALLOW_UNFILTERED_UPLOADS', true);
define('FS_METHOD','direct');
define( 'DISALLOW_FILE_EDIT', true );

//Define What Converts For Brand
define('wc_key', '9-041940e9597cf124');
define('wc_secret', '36648f2d0dd1eaea4d464dba513d1e94');
define('account_id', '9');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
