<?php
use Doctrine\DBAL\DriverManager;

session_start();
$config = require 'config.php';
//$config akan dapat data dari config.php page


$db_conn = DriverManager::getConnection($config['db_connection']);