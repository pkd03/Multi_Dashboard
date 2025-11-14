<?php
$id = $_GET['id'];
$links = json_decode(file_get_contents("links.json"), true);
unset($links[$id]);
$links = array_values($links); // reset index
file_put_contents("links.json", json_encode($links, JSON_PRETTY_PRINT));
header("Location: index.php");
