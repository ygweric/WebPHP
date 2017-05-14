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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '4H$fj@Z5~E$Y}<Vr=`.j)M*2^::p4c[9qlFj$Pt@<[lUdJekCG6.k8tZZNL0Hw0H');
define('SECURE_AUTH_KEY',  '`Z#QFqbCpv)b!oauaq~qkl#_A68DKrVE6S(OF^?#B{&{@6)&uJUEx2jhzv@v,5sF');
define('LOGGED_IN_KEY',    'm6I@&tLMui*ehE1v#&P0WR^P1So2y-f%[j*FcE?0b}hlzdveQw=cTXgPMi3Gn1Fp');
define('NONCE_KEY',        '|9WA>D2xY#s]a$QNzKP5&I/f@5~zi8Vn7OY6Tf9vBRhk=XjVO7r 8ybQPeup_gb|');
define('AUTH_SALT',        '/[V0w$Re:c5w/G&@3~B$>X2h`aWZr #4hk$&j.3Aj:kEKiQgwYlq<M8l^-Xj!%23');
define('SECURE_AUTH_SALT', 'nl39+Bro@Ne*RIWtAK[&x:gL+,!t[LuEb0@CnTfB B[*Nji?c1e2!El9y,;2p7XK');
define('LOGGED_IN_SALT',   'HK:]Vv:,f~dkxJy=G%$pGKBN<[4_?OP)sw4TpvnP_^9R{7UsMKM[yTP1w$o-9}z>');
define('NONCE_SALT',       'q`1W~?-w$theC870Hss&q5>X_$B<SI_)*HDs>m:#[b<Xf#E2AV{?`I?1#J)hK^uy');

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
