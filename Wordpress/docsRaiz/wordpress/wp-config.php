<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'andersonbonetti_wordpress_5');

/** MySQL database username */
define('DB_USER', 'ander_wordpres_c');

/** MySQL database password */
define('DB_PASSWORD', '3NZbzf4O6#');

/** MySQL hostname */
define('DB_HOST', 'robb0262.publiccloud.com.br:3306');

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
define('AUTH_KEY',         'lIYLf)Xid8zc&pfq#NPop8kCan(m24B4mP%9S91*vofwqiHFM!9jm8OaGI8J%G(e');
define('SECURE_AUTH_KEY',  'u1LXa2*2I)9GkDzaspSXPb3PRr)QPtOKT45bP0bJ&0M(!BSN2Mnsa*H5Lo(0NJ&7');
define('LOGGED_IN_KEY',    'rSRoMa6eLuXIqMyIZWF47pszj&aW!wmmEqXTaaI2k8I%iE4HOssT!GqUii*X6HkE');
define('NONCE_KEY',        '#oYl5l*3hc3x7xJhGCyoQy2^8AXWW&Yt)P5%0zlG6C&KkhlcqY7kiTF9Q863Y(2l');
define('AUTH_SALT',        'sMFzOClMQl2bgVNtPbDW8)(KD4!i88c8)M4#DgmUZmH@odNkylx3j5#tobAtqMH3');
define('SECURE_AUTH_SALT', 'B91KTLZ*@a29Fd)CIac)H2l78h#SKKkbcub!54)fRSLVBvkGdN^3mdhF7C2h8DuB');
define('LOGGED_IN_SALT',   'U8l!ozdgiqC&Mto3o4u)lzxES!n!5Fq)1yH7HWxjI3mVGC(G%gBfdJAfkUM^p%6Y');
define('NONCE_SALT',       '4W0A5GvHWct8BgaxIPn^^qE!iWnQ#dHZSR6Uqhll4XcJPog#VxYEK^qMx*K%8%v6');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );
?>
