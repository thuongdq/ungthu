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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ungthu.nguoiduatin.vn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cUoYy|Z$i<ms`W!Lk|[$:?oe%^UKL[LzhfTS.tkZLG|CoCcX{@s2)p>O6II^tzSi');
define('SECURE_AUTH_KEY',  '^e8c[7hI*%H1&y;}hjx <.v6>XKdM^VU[ _K5|7C+XCMIUj2T6F6:Y5C7+7p&-;T');
define('LOGGED_IN_KEY',    '5$Y|k>:z,!/cne NjFj+cl</KkV?X(.5>@^H^_Anm/+vKS/Ip/utU<`Pk8eB9caq');
define('NONCE_KEY',        ']J$=z;R$t;x`A_brdH!;BUEe,w&pXYg+!.q`tdkgRMkwy`;*5@zG=Oo~nQw{~_1A');
define('AUTH_SALT',        'k/%+>qEkUk++mp*ik| s~kVR9Lc@:xW%Yj5a0mvJy%lcakOY>R4.6ja#? aTEyCD');
define('SECURE_AUTH_SALT', 'pNY{YF7$0=iE$WSr+UL&*|6_`d1)K*g7h~=0Pf[~<d[xv9I g)TI~.kdT^quT wP');
define('LOGGED_IN_SALT',   'VA@~+_s4|&H9Q)|X=}(}g$v.(6Xq5Wh:VA,R!nuP`a;S=4EA4=Zff:6q,j;+b*u]');
define('NONCE_SALT',       'XSNz[V})]#Il}l>`brp6mWPJu4AI.k;14==tJ/=,i;X?F bA[{aS2UBF&_g5)/H@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hlbc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
