<?php

$cnx = new PDO('mysql:host=localhost;dbname=exemple', "login", "password");
$cnx -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cnx -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

