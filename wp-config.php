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
//define( 'DB_NAME', 'database_name_here' );
define('DB_NAME', 'wordpress');

/** MySQL database username */
//define( 'DB_USER', 'username_here' );
define( 'DB_USER', 'wpuser' );


/** MySQL database password */
//define( 'DB_PASSWORD', 'password_here' );
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** filesystem access method **/
define('FS_METHOD', 'direct');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}2/cNi0Y6BK*ZDo}j|<0}I*4JCe6H6;-Vhd!;|45n7?< J_rx9l`.q~mP+&Y/5e;');
define('SECURE_AUTH_KEY',  'zu m<|+@HS 4+?0+Gp`LpEfq}VO/?_X:Rg*-!X];|vrp{kJl4nu8mg6}X~jwY`-K');
define('LOGGED_IN_KEY',    '+e9+>x*Fc)~V R4k=!Q2Crzy|P(ui{7Ev8EM|:&Yz2[Tojkh.Zv,b+CNK:Q^Sdyq');
define('NONCE_KEY',        'gBOq0]2c`D6mJ:c[N}`|oxLQiJ|=q#|eb=9CTnGX&#F1Z$mZ-Rg|1e1I7RU5,!h ');
define('AUTH_SALT',        '[HUkYUn8k)Fjw^12K;zQ#Klfd4U!8,4+v.|b=rO(m!;Y_EO%{*30!+e+CHOkP4,5');
define('SECURE_AUTH_SALT', '?U7KQ$f&cy)ou1nj9+XRJ?m0rT+!CPqbk&3X@O4u1_~WqCl/#3W4wwsGL+J?9q5!');
define('LOGGED_IN_SALT',   'z?[[>.MSo`m&=z[c#m$Q}hbdj Q]Q??V0>j2G-2@+=&)fe(B#Xk?u>d-d9Ww_f1-');
define('NONCE_SALT',       '?hAxg46wYbtIwJSA=43>=Ny)V^{6ZI8@P!oR%rEe^~n.74tbsH]BT1DWlp-j]MiX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
//define( 'WP_DEBUG', false );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

define('WP_ALLOW_MULTISITE', false);
/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

//define('WP_ALLOW_REPAIR', true);

@ini_set( 'upload_max_size' , '20M' );
@ini_set( 'post_max_size', '13M');
@ini_set( 'memory_limit', '15M' );