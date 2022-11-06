<?php

// imports config onject
include_once("./config/configuration.php");

// connect database
define("SERVER_NAME", $config['server_name']);
define("USER_NAME", $config['db_user_name']);
define("PASSWORD", $config['db_password']);
define("DB_NAME", $config['db_name']);

// create connection
$root = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD);

if(!$root) {
    die("Connection failed: " . mysqli_connect_error());
} 

// create database 
$sql = "CREATE DATABASE IF NOT EXISTS ". DB_NAME;

if(!mysqli_query($root, $sql)) {
    echo "Error creating database" . mysqli_error($root);
} 

// close root connection
mysqli_close($root);

// create database connection with created database
$conn = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD, DB_NAME);

if(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
} 
