<?php
require "config.php";
$AVA = $_POST["ava"];
$NAME = $_POST["name"];
$TEXT = $_POST["text"];
$SQL = "INSERT INTO post (ava, name, text) VALUES (".$AVA.", ".$NAME.", ".$TEXT.")";
mysqli_query($CONN, $SQL);
mysqli_close($CONN);
