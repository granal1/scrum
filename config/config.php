<?php
define('ROOT', dirname(__DIR__)); //W:/domains/localhost

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Логин админа: admin
// Пароль админа: admin
// Логин пользователя: user
// Пароль пользователя: 123

/* DB config */
define('HOST', 'localhost:3306');
define('USER', 'root');
define('PASS', '');
define('DB', 'php_1.0_project');

define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');
define('ENGINE_DIR', '../engine/');
define('MODELS_DIR', '../models/');

define('IMAGES_DIR_CATALOG', './img/catalog/');
define('IMAGES_DIR_GALLERY_THUMBNAILS', './img/gallery/thumbnails/');
define('IMAGES_DIR_GALLERY_BIG', './img/gallery/big/');
define('MAX_IMAGE_SIZE', 30000000);
define('THUMBNAILS_WIDTH', 150);
define('THUMBNAILS_HEIGHT', 100);

require_once ROOT . '/vendor/autoload.php';
