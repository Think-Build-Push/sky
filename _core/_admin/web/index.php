<?php

// Set default error level for logging and reporting
const LOG_LEVEL = 'error';
const ADMIN_PORTAL = TRUE;

require_once( '../../../init/init.php' );

// Starts app, no need to call anything else.
$app = new _app();