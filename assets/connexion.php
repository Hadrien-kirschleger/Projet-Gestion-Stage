<?php

$cnx = new PDO('mysql:host=localhost;dbname=kartes1', "kartes", "magicMagik123");
$cnx -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cnx -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

