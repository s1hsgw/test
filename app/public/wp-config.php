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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nRghMpSygjZeYCiwaWU8OA3flqB5cgQKfIqzoBuCmRVUSszVe94WHKUg8jj8GqwfWmz6yKx5Q6U5PGcyBKwvTQ==');
define('SECURE_AUTH_KEY',  'gJdUMMtWHG3A4V6ubTcghenm7YKWepw83IVKqi/xYGa5d7sHFIefbAupBAxDkTBTbBskIB/HnIOPVYNk0NQmQw==');
define('LOGGED_IN_KEY',    'grO/G8SK4eGumEujWI1brJ6H0KulNIHMSHzlwuTJBGEg6R0n/pp5wBrvgYt3AAqnzcMPgDEvXC0QbB5evvIi0A==');
define('NONCE_KEY',        'topHxTDD1yVgEn78CimiK4bdG7xwRD9yr3izsfDwtbXX/33jNVvn5DpO943ETPQuMSt/5uK163E3u656sJvrZQ==');
define('AUTH_SALT',        'sGljdpmsMudsYeSTdDIA17xVdGMGBMe/lMZpOTuSt8NEYS2Vis/Bjsqb2h3oml+QXxH43phEXs3NEnX59LQXcA==');
define('SECURE_AUTH_SALT', 'ufx4cdrLMYrfimqTRcYk/AWjVXY6pjHStgex8aTOBpU2xzvKgqyDgZD2PkGU5DaxuOVMbFXSQoIiSNNY7+89yQ==');
define('LOGGED_IN_SALT',   'a4/hKeSAWpnlu0zGYKXhxs7onVrVmu29iRU4Jp9n7AHdnGaoVtHGAZEUO4yic9sQnl7r3GI6pVdDLmEutbo0Og==');
define('NONCE_SALT',       'QVFnqFGX+JPv6ruu5+7Ii9WUEtYcDcGyROcHnplCAMMXNbkm1Y0QiVFmxR5Y6uDydSwmB9sSYHNGeoL9jbxtLw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
