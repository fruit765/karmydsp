<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
if (file_exists( dirname( __FILE__ ) . '/wp-config-local.php' )) {

	include(dirname( __FILE__ ) . '/wp-config-local.php');
}
else {

	/** Имя базы данных для WordPress */
	define( 'DB_NAME', 'mdranev_dsp' );

	/** Имя пользователя MySQL */
	define( 'DB_USER', 'mdranev_dsp' );

	/** Пароль к базе данных MySQL */
	define( 'DB_PASSWORD', '*AnEI4Ut' );

	ini_set('log_errors','On');
    ini_set('display_errors','Off');
}

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'lEpv+8Ci]W*w%03j@z+oi(R3?S&W]?y,7)cd&g~:)`e8kXZ!g2?*|BFMQ<S2 I#7' );
define( 'SECURE_AUTH_KEY',  '=<9~q_sr T&D|~c?!;{Q0Gpi+`eC`JG;$;bxF%xiHI3S7GuPO%dlRn7DI)~:B};G' );
define( 'LOGGED_IN_KEY',    'Au]Qhy[@b/3zh]Y%ThvxD:KjP-Qt/3[1zlXPr7*x|RIGwQaneTj?ZC1im#o%/xrf' );
define( 'NONCE_KEY',        '..fFKY[^)9c=-p74LJ=k8Z5am5v|he<[+.uGg8BAGLo@2&$ea?@y] j&&?@Qx:Sf' );
define( 'AUTH_SALT',        'OMKr#{sFy}sAtuSK:@=}!^Z,g)e_c0x({bnvb/KEE6?I~+#0+`M V@5vQK]bZi5W' );
define( 'SECURE_AUTH_SALT', '=f5B~)81p|Wgi7:~0vLq2p}G#qJG_HEY0LFQ:RF_-4fuci~uqY?Y~5lM3-MMVrCT' );
define( 'LOGGED_IN_SALT',   'b`=f23#@FWe>aQ.^cl_kP0}POQ_]2ScU7s)l*h7kY[tc%8:LSI=7ra(-QbSBv}p`' );
define( 'NONCE_SALT',       '&Sd^1H?~L2NfBz*<OO3i]ne[c~|%Pag&2NldsdoTG)8Yv+=iF%0d{vGG_F;Tw<K-' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
