<?php
require "config.php";
$ID = $_POST["id"];
$SQL = "INSERT INTO act (post_id) VALUES (".$ID.")";
mysqli_query($CONN, $SQL);
mysqli_close($CONN);
