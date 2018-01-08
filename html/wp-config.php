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
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT );
define('MYSQL_SSL_CA', '/etc/ssl/certs/Baltimore_CyberTrust_Root.pem');

/** The name of the database for WordPress */
define('DB_NAME', getenv('agiwordpress'));

/** MySQL database username */
define('DB_USER', getenv('agiword@antigravitydb'));

/** MySQL database password */
define('DB_PASSWORD', getenv('make1tfl0ats1t3'));

/** MySQL hostname */
define('DB_HOST', getenv('antigravitydb.mysql.database.azure.com'));

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
    define('AUTH_KEY',         'e3.W}n1B~{1B+mQ8mX~ZL4W55vzw?bmGqS_aEDz,ezAQ:6jeM{_UX[tstcUs3K9x');
    define('SECURE_AUTH_KEY',  '~@TfO{r(r)N-G!]0gnjXuxkE=I|oyS=TiGCI+De9{%HH;JX?3~+?)ENY4|5ylq& ');
    define('LOGGED_IN_KEY',    'XDDI6V.jMeApsn>xf|Xp3 leA+=a^Z2w(m+b-!P+WWNr!hD`K=bFjS%tRnR-|$bV');
    define('NONCE_KEY',        'oSGdYXi{|Vmec]`<hb^CnnD|i-^HF)0Te*@28Vi_XF/}68|C|{J#?a|m;1?V@.`B');
    define('AUTH_SALT',        '0X{*Hp!:EZrqRiReW 76{|uV^%aWeB_^iie+|Md^X$UUm?]WM(Q1>}6Mz4)O*&6W');
    define('SECURE_AUTH_SALT', '<_#v)O9F*n-[+;b~w9qW5.m1*;beuWJGCe.|Z77`uj|pE`kiBR0Ik9v0(Oy`%<%8');
    define('LOGGED_IN_SALT',   's4.zonY*uzn-yy+ZK;enF)NJG~kd|(m+wyV#>P]E73{iBFqj-2cV|q&5fc/^K9B-');
    define('NONCE_SALT',       '|}r70#Xeu:WZcD*Ke>C2QX^8<]^k[vLd%EkASm7K|NoTSvCcehQZcTU5+|O&]P#(');

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
