<?php
//We start sessions
session_start();

/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

//We log to the DataBase
mysql_connect('hote', 'username', 'password');
mysql_select_db('database');

//Webmaster Email
$mail_webmaster = 'admin@piratesvpn.com';

//Top site root URL
$url_root = 'http://piratesvpn.com';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'index.php';

//Design Name
$design = 'default';
?>
