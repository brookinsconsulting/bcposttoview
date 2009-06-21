<?php

$Module = $Params['Module'];
$http = eZHTTPTool::instance();
$parameters = array();

$parameterNodeID = $http->postVariable( 'NodeID' );
$parameters['et'] = $http->postVariable( 'et' );
$parameters['lib'] = $http->postVariable( 'lib' );
$parameters['do'] = $http->postVariable( 'do' );
$parameters['kw'] = $http->postVariable( 'kw' );
$parameters['date'] = $http->postVariable( 'date' );
$parameters['today'] = $http->postVariable( '(today)' );

foreach( $parameters as $p => $id ) {
    $pname = $p;
    $pvalue = $id;
    if( $parameters["$pname"] == '' ) {
        $parameters["$pname"] = 'null';
    }
}
posttoview( $parameterNodeID, $parameters );

function posttoview( $parameterNodeID, $parameters = array(), $s = '' ) {
  foreach( $parameters as $p => $id ) {
  	$pname = $p;
  	$pvalue = $id;
        if( $id != 'null')
  	$s .= '/('.$pname.')/'.$pvalue;
  }
  $node = new eZContentObjectTreeNode();
  $node = $node->fetch( $parameterNodeID );
  $node_url_alias = $node->urlAlias();
  $location = '/'. $node_url_alias .$s;
  // die( print_r( $location ) );
  header( "Location: " . $location );
  die();
}

?>
