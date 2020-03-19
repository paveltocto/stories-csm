<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'stories_csm' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', 'ptocto0125' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', '127.0.0.1' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'dM+.crE}fgm`b{Q4ZB<u]G<ypsHPe5:m5:|c1R2ng}eJsjwxE.bR5vN}W@^b>*)O' );
define( 'SECURE_AUTH_KEY', 'bL>X3#Bfb1N5>:K?c^GZg~em@2[0:PnRKlBQ[Ti1;)}$(sx<f[AR{zjb2O8C(zao' );
define( 'LOGGED_IN_KEY', 'is ibN?:Ac@4~GM6{+Zkxq3642= .10,?^PfA9#9Ky.CG0X62T98Z`fM`MtR,tf|' );
define( 'NONCE_KEY', 'SRXZ,cZK6z0:@40mwy]8ooj4ji@RsPjX>=[iIG:o&7?kK|U``*DtS)>R^0ohcP[]' );
define( 'AUTH_SALT', '=s]00,)MzR6LL.ipw4OX>XU+7.W5$ybjv/>2:&^HncU!vve<,)x7.`FI Y4cPhXh' );
define( 'SECURE_AUTH_SALT', '54yuYkXz}uGRCrD%]FUX:k(z6ZeMM?&Q=*6&A%u`rdE&D5CZ0YhV:uHaz1Wykpo>' );
define( 'LOGGED_IN_SALT', '9n%0R{62 EoJa)Z_jhd~_H+0jgB?#L o`yqg9v[K;`nn@L;6J}n4em/MI]{r6U@<' );
define( 'NONCE_SALT', '[cTSEuSnLi Qn!3xAteGbW3|7{;a8Pz]E1?cNB <l{!mKF.^nebgyyy`Y78>/#kv' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'scm_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


