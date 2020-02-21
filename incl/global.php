<?php
// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$url = parse_url('mysql://bfe344d917d9e6:4212ed92@us-cdbr-iron-east-03.cleardb.net/heroku_5481d3e276397ed?reconnect=true');

$host = $url["host"];
$dbUser = $url["user"];
$dbPass = $url["pass"];
$dbName = substr($url["path"], 1);

$db = new MySQL($host, $dbUser, $dbPass, $dbName);
?>
