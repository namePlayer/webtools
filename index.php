<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();

require_once __DIR__.'/config/folders.php';
require_once SCRIPT_DIR.'/functions.php';
require_once __DIR__.'/vendor/autoload.php';
require_once SCRIPT_DIR.'/database.php';
require_once SCRIPT_DIR.'/TemplateEngine.php';
require_once SCRIPT_DIR.'/AccountManager.php';

$templateEngine = new TemplateEngine();
$accountManager = new AccountManager($dbConnection, getLoginId(), false);

require_once SCRIPT_DIR.'/router.php';