<?php 
# CPT 283 Program 8 - mysqli_connect.php
# Created by Hannah Holmes
# This script gives information for connecting to the database
# Created 01 Oct 2023

// database constants
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'sesame80');
DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_NAME', 'weatherstats');
DEFINE ('DB_PORT', '3306');

// connection function
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// encoding
mysqli_set_charset($dbc, 'utf8');