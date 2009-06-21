<?php

$Module = array( 'name' => 'CustomFilter02', 'variable_params' => true );

$ViewList = array();
$ViewList['action'] = array(
                          'script' => 'action.php',
                          "default_navigation_part" => 'ezcontentnavigationpart',
                          "unordered_params" => array( 'order' => 'Order', 'et' => 'Et', 'lib' => 'Lib', 'kw' => 'Kw', 'do' => 'Do', 'date' => 'Date', 'x' => 'X', 'y' => 'Y' ) 
);

?>
