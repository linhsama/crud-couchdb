<?php

// config.php
// Định nghĩa các hằng số cho cấu hình CouchDB
define('COUCHDB_USERNAME', 'admin');
define('COUCHDB_PASSWORD', 'password');
define('COUCHDB_HOST', '127.0.0.1');
define('COUCHDB_PORT', '5984');
define('COUCHDB_URL', 'http://' . COUCHDB_USERNAME . ':' . COUCHDB_PASSWORD . '@' . COUCHDB_HOST . ':' . COUCHDB_PORT);
define('COUCHDB_DATABASE', 'db_novels');
?>
