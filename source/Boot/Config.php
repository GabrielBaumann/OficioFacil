<?php

// DATABASE
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "db_office");

// URLs
define("CONF_URL_BASE", "https://www.oficiofacil.com.br");
define("CONF_URL_TEST", "http://localhost/OficioFacil");


// VIEW
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");


// MESSAGE
define("CONF_MESSAGE_CLASS", "message");
define("CONF_MESSAGE_INFO", "info icon-info");
define("CONF_MESSAGE_SUCCESS", "p-4 rounded-2xl bg-green-100 text-green-800 border border-green-300");
define("CONF_MESSAGE_WARNING", "p-4 rounded-2xl bg-yellow-100 text-yellow-800 border border-yellow-300 shadow-md flex items-start gap-2 animate-fade-in");
define("CONF_MESSAGE_ERROR", "max-w-md mx-auto mt-4 p-4 rounded-2xl bg-red-100 text-red-800 border border-red-300");

define("CONF_IMG_ERROR", "<svg class='w-6 h-6 mt-1 text-red-500' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'>
    <path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'/>
    </svg>");

define("CONF_IMG_SUCESS", "<svg class='w-6 h-6 mt-1 text-green-500' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'>
    <path stroke-linecap='round' stroke-linejoin='round' d='M5 13l4 4L19 7'/>
    </svg>");

define("CONF_IMG_WARNING", "<svg class='w-6 h-6 mt-1 text-yellow-500' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'>
    <path stroke-linecap='round' stroke-linejoin='round' d='M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z' />
    </svg>");