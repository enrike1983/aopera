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
define('DB_NAME', 'aopera');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'n{Ne>:E1!}7mj%oqULM&Mu@!5s58^{>ed1;b0BbBe3-fR%9fvm!2XW0Gff%;amz,');
define('SECURE_AUTH_KEY',  '}>qsw4G?KweZhx0PNe?iE%+}%XZ6xt[ -QV7`-Q[@RGWwR4!7[qaqkT2_)RZIz j');
define('LOGGED_IN_KEY',    ':oR+Kul|V<|YF:2AQY(&]-06D@XK;}z4mNJ_/@s_8G+w|JFNm{t6B =jwk#0$iZ`');
define('NONCE_KEY',        ']~eV@.~iJi{^yG~+$cfvUpJ;,w2m{Xp5hL0f1:t/-.hBDBE7+m15P7aGfQ7D^Sk#');
define('AUTH_SALT',        'FcNTQ1^)b(mt+hu >Vr=FHV0i]+P;OZ>lf[:gi+|*u|>]pYzWCObKkge(Jvj=:l4');
define('SECURE_AUTH_SALT', '5q7a-;ueg$3?8N/7VF}Dcu7dU(4V2qU+[}(+4FphRFj4|dP9ccwlGDQt`NV$a()5');
define('LOGGED_IN_SALT',   'mUzi*BrErD9yj:J{>uVP7D=pq+#jV+-8ScZSX_ne|dSAoPh,$<|=<fN($_J{1zR]');
define('NONCE_SALT',       '5.3rW^z PhJ8ePju4co0r;`8:GI}V],1LqY7kezz&P9+-kJ#%/7v/W+oM7zIT0w_');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
