<?php 
$links = json_decode(file_get_contents("links.json"), true);

// layout
$layout = $_GET['layout'] ?? 'default';

switch ($layout) {
    case '2x2':  $cols = 2; break;
    case '3x3': $cols = 3; break;
    default:     $cols = 1; break;
}

?>