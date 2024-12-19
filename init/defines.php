<?php

/**
 * The defines are the constants which must be defined. Mostly,
 * they are directories and file locations. Since they are constants,
 * the order of creation is not important except where one constant
 * may need another constant to be defined prior to creation.
 * 
 * $path is defined in the calling index.php
 */

 /** @var string $path */
define("BASE",		$path . DIRECTORY_SEPARATOR);
define("CORE",		BASE . "_core" . DIRECTORY_SEPARATOR);
define("APP",		BASE . "app" . DIRECTORY_SEPARATOR);
define("CONF",		BASE . "conf" . DIRECTORY_SEPARATOR);
define("INIT",		BASE . "init" . DIRECTORY_SEPARATOR);
define("CRON",		BASE . "cron" . DIRECTORY_SEPARATOR);
define("KEYS",		CONF . "keys" . DIRECTORY_SEPARATOR);
define("LOG",		BASE . "log" . DIRECTORY_SEPARATOR);
define("VENDOR",	BASE . "vendor" . DIRECTORY_SEPARATOR);
define("WEB",		BASE . "web" . DIRECTORY_SEPARATOR);
define("ADMIN",		CORE . "_admin" . DIRECTORY_SEPARATOR);

define("CTLR_CORE",			CORE . "ctlr" . DIRECTORY_SEPARATOR);
define("OBJ_CORE",			CORE . "obj" . DIRECTORY_SEPARATOR);
define("MODEL_CORE",		CORE . "model" . DIRECTORY_SEPARATOR);
define("PAGE_CORE",			CORE . "page" . DIRECTORY_SEPARATOR);
define("TPL_CORE",			CORE . "tpl" . DIRECTORY_SEPARATOR);
define("EXCEPTION_CORE",	CORE . "exception" . DIRECTORY_SEPARATOR);

define("CTLR_APP",		APP . "ctlr" . DIRECTORY_SEPARATOR);
define("OBJ_APP",		APP . "obj" . DIRECTORY_SEPARATOR);
define("MODEL_APP",		APP . "model" . DIRECTORY_SEPARATOR);
define("PAGE_APP",		APP . "page" . DIRECTORY_SEPARATOR);
define("TPL_APP",		APP . "tpl" . DIRECTORY_SEPARATOR);
define("EXCEPTION_APP",	APP . "exception" . DIRECTORY_SEPARATOR);

define( 'ULID_AS_ID', TRUE );