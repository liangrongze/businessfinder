<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'businessfinder');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'O4wY]1&+ 043/74)^iD6_X=#m#^!Z+Ah#g:1/B+{zFfLmR_@3x&fLw+{agD]OSS4');
define('SECURE_AUTH_KEY',  '2ijpN+~L][UQRr$D,@dV)8m6rGfuEe@x$%}u)8yEQLJ:kq}Arm.DEQ|x$5rN=$@_');
define('LOGGED_IN_KEY',    '/m/.{6>.u~CwB(hfz3G;09sh,#]n,Pyx(r}a|<Z2qmOk%JaX2<5/k#_Y_VVGKv!<');
define('NONCE_KEY',        ',-??1wI3m)n<@~.-da#KeY9f<|]giJihQ)+q ^3AgS:||y!N&%DJRGu|#j9{.xHA');
define('AUTH_SALT',        'S{MhfC8[)|5Dh!D1{-eqOf }V;rIDIrl3=-IIn|oK|>jA|-y5s}1Rh|KGo7x.2E2');
define('SECURE_AUTH_SALT', 'V*MrQL99<Az|GC0?FZ;)=cTEV*uqZT?ws$kuP@iHNvD|M$F]c,tLO2}bdwLjbKXW');
define('LOGGED_IN_SALT',   'Y)XB,n40G0+O8.x?Vvh<qR|q]<0?hm|=kB~)&&%dV5{t:z*9mJ4`EH(7XIF{zc[6');
define('NONCE_SALT',       'FXPTj2!LUm;VhPPI]3M,-YywQeL&[8IH{g`5S-ubVL3c%f; %Uttg+<L))A,t>Z*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
