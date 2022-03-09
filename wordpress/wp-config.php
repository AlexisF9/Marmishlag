<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'marmishlag' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'password' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*<P,X~5z4,hq.[^=i)Afg~#`^H<Jh=gCc{&-!ius^~]:Z36RgfOB/,DBK}r5CIk0' );
define( 'SECURE_AUTH_KEY',  'z L,06BXYhWzQ3Y-Eg~p-k4{>3zB`dtS5EjBsT`_~gTMYtw15IyY lE5(8~O%NsS' );
define( 'LOGGED_IN_KEY',    'Cu.8>`s:=Q`y~J0*f#%!ghJU*MnuY|Zp6R7)P/3Ti)ba`w[Qp^ZR> Gt-]?6YR0n' );
define( 'NONCE_KEY',        ']N6OT.eYpFg@>OnhU}817/ZM|mR$ cF|!*w,6&alj]e5|z{/.SX;~QS_nSXD{=7i' );
define( 'AUTH_SALT',        ']Q dO_:Sygsvj$vT`Y$NWome:o;V)52`tFiq`vmw8rQ&5SpB]lX8HZHU_j;)%Um/' );
define( 'SECURE_AUTH_SALT', 'gRT?XW;ignN/gMq[b-8:]h7{8|fhO<?*RD3LH>(ko6pda<@(K.Pppc<bc;6X*rg,' );
define( 'LOGGED_IN_SALT',   'wZD %QY@m=ExwaMfchqScrH{<$,+.K1,FYxYf#DPW*LuV/qcMv*6TzC2!^l>)i(H' );
define( 'NONCE_SALT',       'g6w^+q@S-?+en28}}Q:DX&f!y-B;fzVdk^.Rbs[Ac-VViVxC+DA)QbangyHam8a_' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
