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
define('DB_NAME', 'debran5_wpmms');

/** MySQL database username */
define('DB_USER', 'debran5_wpmms');

/** MySQL database password */
define('DB_PASSWORD', '4p5.O45Sh(');

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
define('AUTH_KEY',         'jasfq75hc1i5whyiar2efdyy63duotztcddao438px9icptxbc0uiipmjqluwrut');
define('SECURE_AUTH_KEY',  'hoor0iwx2hr36qulh9mjf5b2f6wixb6jbskc8wm9n4f3nizvubucf6xqcayoafjn');
define('LOGGED_IN_KEY',    'obi7ovsjqphfqq7bgheaocnhxdak7wuwwqrgnq1wgdzsuxxp7pvbjv58lv3qtsdc');
define('NONCE_KEY',        'vfc5n5yo8xumwhafl3qyxhy7ugyjynfoutecgcbvakb8b7bnabee9ndpf2jmeumk');
define('AUTH_SALT',        'j67cml2mudyxc55u6shnag3xubvib0z1ercbohtmc8liafjbn6stk1ewmqgehjzu');
define('SECURE_AUTH_SALT', 'uqrb8n27khyf3rm5v3bpoky2bgekedsftt8baqvss6pqybjtge77kk5kjuhjgykp');
define('LOGGED_IN_SALT',   '2ri1h5v5g2ybkuxyg2oxcydvyxttvwvo2d3n79fax5ojjr4cxjkpv7d2vrivhchp');
define('NONCE_SALT',       'iyszpllzzqjlbp5cecmhjxjinrelzw2e9jsytxutkky0rwa8roxqm5fqi8rzq4tp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpbpy9_';

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
