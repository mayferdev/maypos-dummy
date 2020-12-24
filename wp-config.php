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
define( 'DB_NAME', 'maypos_wp54122' );

/** MySQL database username */
define( 'DB_USER', 'maypos_wp54122' );

/** MySQL database password */
define( 'DB_PASSWORD', '7S.Bpob9Vr!.5[' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'cipkxx8efsoiti5ccuywv09pu94fp2zgmunwmqd0zqilxafprt8uzswhu8i4mnsg' );
define( 'SECURE_AUTH_KEY',  'xhbqqt4xe8jqtu3tvcy56dqleliwj68fiz5isvla2bp9zclbzplm32bidpiz0odt' );
define( 'LOGGED_IN_KEY',    'l5vqtknulwr5kifmaxifyvbyt2iefs9sqp4xvrezhmtv6lyldtdvv2vxlwlhbbqx' );
define( 'NONCE_KEY',        'srfxq0yyhqbrgnqevcn1jnewckxvmg7dwamno3ajrg0wttczagm2vqutfp4v6lsa' );
define( 'AUTH_SALT',        'flheksyzvykz8vtpsgqgnnsaa2jlroou9pw5nn5n3hew5wp0036rc4mzr84ewydb' );
define( 'SECURE_AUTH_SALT', 'fwag0xr8nduku5v3hytdp6z2ezqyurixksibnmi7uo3ix64uytryscmiqhzipmo0' );
define( 'LOGGED_IN_SALT',   'ii841hoevsagve8c2u95fmrmbpwurq7ezyp5wulhjb32ra2kuqwbv8ndm0yyxw2s' );
define( 'NONCE_SALT',       'jqehgw1dexdwkbmjgffmtaooojksvu7o9ummenold4gcafltk4qwb2gsqd99jz98' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpxk_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
