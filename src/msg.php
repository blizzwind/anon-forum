<?php
require "config.php";
$AVA = $_POST["ava"];
$NAME = $_POST["name"];
$TEXT = $_POST["text"];
$ID = $_POST["id"];
$SQL = "INSERT INTO msg (ava, name, text, post_id) VALUES (".$AVA.", ".$NAME.", ".$TEXT.", ".$ID.")";
mysqli_query($CONN, $SQL);
mysqli_close($CONN);
