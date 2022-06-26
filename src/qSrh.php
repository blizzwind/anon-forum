<?php
require "config.php";
$SRH = $_POST["srh"];
$SQL = "SELECT * FROM post WHERE MATCH(text) AGAINST(".$SRH." IN NATURAL LANGUAGE MODE)";
$RESULT = mysqli_query($CONN, $SQL);
if (mysqli_num_rows($RESULT) > 0) {
  $LIST = "";
  while($ROW = mysqli_fetch_assoc($RESULT)) {
	$NOW = strtotime("now");
	$DATE = strtotime("-1 week", $NOW);
	$DATE = date("Y-m-d H:i:s", $DATE);
	$ACTSQL = "SELECT COUNT(*) as total FROM act WHERE post_id=".$ROW["id"]." AND created > '".$DATE."'";
	$ACTRESULT = mysqli_query($CONN, $ACTSQL);
	$ACTRESULT = mysqli_fetch_assoc($ACTRESULT)["total"];
	$MSGSQL = "SELECT COUNT(*) as total FROM msg WHERE post_id=".$ROW["id"];
	$MSGRESULT = mysqli_query($CONN, $MSGSQL);
	$MSGRESULT = mysqli_fetch_assoc($MSGRESULT)["total"];
    $LIST .= "<div id='".$ROW["id"]."' class='post'><img src='".$ROW["ava"]."' onerror='reAva(this)'><div class='name'>".$ROW["name"]."</div><div class='time'>".$ROW["created"]."</div><a id='flag-".$ROW["id"]."' class='s-btn right' onclick='flagPost(this)'><span class='icon-flag'></span></a><div class='txt'>".$ROW["text"]."</div><a class='m-btn' href='/post/".$ROW["id"]."'><span class='icon-msg'></span>".$MSGRESULT."</a><a id='act-".$ROW["id"]."' class='m-btn' onclick='act(this)'><span class='icon-act'></span>".$ACTRESULT."</a><a id='share-".$ROW["id"]."' class='m-btn' onclick='share(this)'><span class='icon-share'></span></a></div>";
  }
} else {
  $LIST = "";
}
echo $LIST;
mysqli_close($CONN);
