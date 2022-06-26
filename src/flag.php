<?php
require "config.php";
$ID = $_POST["id"];
$TYPE = $_POST["type"];
$SQL = "INSERT INTO flag (type, all_id) VALUES (".$TYPE.", ".$ID.")";
mysqli_query($CONN, $SQL);
mysqli_close($CONN);
