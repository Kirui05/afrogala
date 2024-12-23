<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'afrogala' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

/** Database hostname */
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
define( 'AUTH_KEY',         'IgGqmb?87dRvtRjL~R?zF]T[xLLU-}*,|%=5&c!O,>Kfped=|75R+H[ AcX*TWd.' );
define( 'SECURE_AUTH_KEY',  '!|i%HvhmCz_$U14`Ns6[HtkFcLs>:A.z2F<?V@WuWuPV: ct}#u;t({a7}QaJMH,' );
define( 'LOGGED_IN_KEY',    'jV(%A(^UB@rbFlS#ggMd2%K,.#{c}M`@0?H&.%x`Ngq$0yfQ![:Q(O%0`w@HEf!L' );
define( 'NONCE_KEY',        'jPoJu# 1(I*WCiCBF^)Sg6w~Ls-tP?*y!A62]P2wC#(.hk_| :n=u7aSfqkM:]>D' );
define( 'AUTH_SALT',        't6X7X/(,L#AV`|+U]*5N-js7[bv%UbExU_hx%@,gGJE41JZ/(Y4)CCS({ C,eoyD' );
define( 'SECURE_AUTH_SALT', 'K+U8 =mg bl)7m4/ Rcu%v)7y)I>orcZ(@O#IH=P/V;j@jx|bDb Rw50*:b:ukI^' );
define( 'LOGGED_IN_SALT',   'UL(TRqB?G_{f>j2r)kM4dQv!1NQX!ga:u9:YuP@ GXB}1YpW{F=RN)D,NJ)u,k=q' );
define( 'NONCE_SALT',       'wa}uGL]7#r:t`dn&mUtt[4c}6RjIPuKg|}0}SZ/#&@{}YhPWVBu%k|xyc5- -vU%' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */


define('WP_MEMORY_LIMIT', '256M');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
