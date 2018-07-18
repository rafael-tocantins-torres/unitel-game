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
define('DB_NAME', 'unitelgames_db');

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
define('AUTH_KEY',         'i/UjrSqr~vEKUJYDH+hnJA#W8_CBH2#S~zK>VxTk8XT{qFZ7olf(|Zzj>`!FH4sg');
define('SECURE_AUTH_KEY',  '7jsUkS%p6<Aqi&npQb,*LL2JA t< rbVg-@*P{.0BgAPmuH7eI,3V~cKi[V1uLn6');
define('LOGGED_IN_KEY',    'ETcoqCH!1r;jVW[+z&FLXw3.%<-(A~M.bY 0x8La{7?#C^>UGu7V)y3dGX>}2SH.');
define('NONCE_KEY',        'rFd{3B?OTEd5G%:;:JK|@*=4nmd(gq}7g=#W9HNrQ>E{`UaZ8{t3ZPedFy9riD&[');
define('AUTH_SALT',        'l1K^,: @Z gv1#`zUROHBKR-bh-i4E}voY776W1`JZeMI|ST!ph3b-R,J=_Mvq*d');
define('SECURE_AUTH_SALT', '6Az,]`|]Vb^CUSbvyZ7N7eq_V*[~]Yy/@|>nZ[?nv+w:-j97gSA{B<c;|6i6C%zv');
define('LOGGED_IN_SALT',   'nlPo{4[emp?-8eu*5];pK9_5%bvt82O`Ah|D(U{u$2h8uJN#Dlm}}X?9Q42Rq }|');
define('NONCE_SALT',       'xL]>ABIEzZ!s@^1u3@CT]:>Tkt&-RZw1Lph&gA^vz1N>_V5GQpodC.SS,@sVak N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
