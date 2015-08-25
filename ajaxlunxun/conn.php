<?php
$dsn = "mysql:host=localhost;dbname=test";
$passwd = '';
$usename = 'root';
$dbh = new PDO($dsn,$usename,$passwd);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');