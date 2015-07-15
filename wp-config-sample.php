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
define('DB_NAME', 'kooba');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'wBZ8yD{hb;[)YaV[p?(.p*;_i`U|e[SgvkLMZ[&g$BQV|Rd.Tv%2NiHhp2e^I#r8');
define('SECURE_AUTH_KEY',  'CM+:nV_+j 5YLzC}cQa/D[3w^5QHZxr,n}9v:}{g~GA&T]3M9p-n[)GF9)9QWJi8');
define('LOGGED_IN_KEY',    'Yk*m+mOs>K>uZ.JG38Rw77J6pM%RHW.Q.r^O_wsn[K^[d&hvSQ9Zg<? T_V8H/T0');
define('NONCE_KEY',        'NfyQoyVLE;HII s^q=,>&bi /dz~4Ff(Bf6dAQ1@Z-(huMplinYb_0-y=?a=Y$_.');
define('AUTH_SALT',        'xUJmm,U|- pUds)F PVv&UD<~W?6&]+|$r/J2gbU*>Bo8%e7iuCG[Dx9*s]O>|rZ');
define('SECURE_AUTH_SALT', 'Eo5Je|bKN^Q/#DNT%6y{TyPh8[$Z-]iES)yFD5#XthV +@(.1f-r;eD7.d(X:p&=');
define('LOGGED_IN_SALT',   '+0eHk8AEZR+_3V0Jo4cQ>9kba5)e`;Ei4HNv@*VTb-C<(*,IO4]KN@3#-?t(+PZY');
define('NONCE_SALT',       'uD 67VaUcVv(ibkk/Z%K=$Xu:7s~;++Fe)zCbjI!>s~R:~QKb6o`mHj&r!.-)QyA');

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
