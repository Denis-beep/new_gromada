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
define( 'DB_NAME', "gromada" );

/** MySQL database username */
define( 'DB_USER', "root" );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

// Имя пользователя для SMTP авторизации
define( 'SMTP_USER', 'denis.patriev@gmail.com' );

// Пароль пользователя для SMTP авторизации
define( 'SMTP_PASS', 'codname47');

// Хост почтового сервера
define( 'SMTP_HOST', 'smtp.gmail.com' );

// Обратный Email
define( 'SMTP_FROM', 'gromada@gmail.com' );

// Имя для обратного мыла
define( 'SMTP_NAME', 'Громадянин' );

// Номер порта (25, 465, 587)
define( 'SMTP_PORT', 587 );

// Тип шифиования (ssl или tls)
define( 'SMTP_SECURE', 'tls' );

// Включение/отключение шифрования
define( 'SMTP_AUTH', true );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'I}c[eD/C<<%}?avxy[A <8TH|p5J,@F=rYN]a?@G)wuqjI:2Y^Y[mS}BXrL3~R;A' );
define( 'SECURE_AUTH_KEY',  'THq#MzaEN4SCKgTex1&rL}<p-u;!&+^r2 bZ}x>XRrUZv@ij2rhb},yls$,QN]!j' );
define( 'LOGGED_IN_KEY',    'D{/}!p= n2QTUHU~,7$7}u?wifNzamhn5:/mRAs`5,G Pq4o5$$lk$G7&R?TN0&M' );
define( 'NONCE_KEY',        '%ni_TORTrn2ah)GS$x@u*Z7/O7NV2JEmJ[T#s5shU|pC7N8uazQdYv:Y3@#uw#G]' );
define( 'AUTH_SALT',        'nGxLuk:rehaFO7G*}f}CwI,*ih[|fC[=>A.ez;:uqFf}f}RoC3[Te+pb~O8s)h{u' );
define( 'SECURE_AUTH_SALT', '%<_X0WY]*:uNlb{kQbFvu64&j y1z`#kK*8x %PfN`=-4%xk3;s^0lY1A&,w]s`l' );
define( 'LOGGED_IN_SALT',   '9|dT|+VWYgm&{*O(e~O}e#KyLjO!`Mm*rF^0WrF&c>Wt75)THc%@;|HnJ5]}`aGF' );
define( 'NONCE_SALT',       'y1Ksy~mx#Y0#s#7RCL<oYH(7<Fx+tP;&2&K,b~hpZbtCwF|lFx(r^3V(r4z*m8b(' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
