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
/** enable SSL to Azure MySQL */
define('MYSQL_SSL_CA', '/etc/ssl/certs/Baltimore_CyberTrust_Root.pem');
/** The name of the database for WordPress */
define('DB_NAME', 'WORDPRESS_DB_NAME');
/** MySQL database username */
define('DB_USER', 'WORDPRESS_DB_USER');
/** MySQL database password */
define('DB_PASSWORD', 'WORDPRESS_DB_PASSWORD');
/** MySQL hostname */
define('DB_HOST', 'WORDPRESS_DB_HOST');
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
define('AUTH_KEY',         'ZRX=*iB,vNC<BWj?[)Pf6-mJ3cE|%RA~i8-P|9=tP`GW1DSk1@(,6hzQb-zOy%u>');
define('SECURE_AUTH_KEY',  '1+TT0))MV1{@WvS0L~>F][.-Xto`OS/BPd7^{^88GN~]@iJjbPJxH[AL`hsX[R-#');
define('LOGGED_IN_KEY',    '3_?ms9idzp+7/~)np$yNoquys]8Sw<3(Ri-71Ng,)gFlx7-}t 7$_&5D};&Xv|I9');
define('NONCE_KEY',        'n5k:8CO@<!$(DWa[LZXz^v|. )PP|e#Qe6=&AA!_/Xuy%18(bfAvA|b#%I-|5dx6');
define('AUTH_SALT',        'T{+>t}7)`d xMo||oqLUSbKgLNc$$ou9B[+mdFf,x1b%8^/bx(2qzV5kKV~]7JS>');
define('SECURE_AUTH_SALT', 'Eq=- D8b(@}GGF)6t#uz>2,5?h,PJfi)YginYZD3[dKl)Q`@~_fZmqi$,w=pjvKq');
define('LOGGED_IN_SALT',   'Jkog4tJ7m%G;>>nV+o`U!+Zn|0A_!O{,&G$n;t}&&RATi|vX.<G}Y+LX|hTN`{>+');
define('NONCE_SALT',       'F=~.bfmg=recBMi(O]BTLfr@JE0~P^NW K+:0/o6vMV%y|[0{01WWV3sQtFJm{%X');
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
// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
$_SERVER['HTTPS'] = 'on';
}
/** Enable x-arr-ssl header support for App Services for Linux */
if (isset($_SERVER['HTTP_X_ARR_SSL'])) {
$_SERVER['HTTPS'] = 'on';
}
/** Force redirect to SSL */
if(strtolower(getenv('FORCE_SSL')) == 'true' && $_SERVER['HTTPS'] != 'on' && empty($_SERVER['HTTP_X_ARR_SSL'])){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
