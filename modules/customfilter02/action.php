<?php

$Module = $Params['Module'];
$http = eZHTTPTool::instance();
$parameters = array();

$parameterUrl = $http->postVariable( 'DestinationURL' );
$parameters['et'] = $http->postVariable( '(et)' );
$parameters['lib'] = $http->postVariable( '(lib)' );
$parameters['do'] = $http->postVariable( '(do)' );
$parameters['kw'] = $http->postVariable( '(kw)' );
$parameters['date'] = $http->postVariable( '(date)' );
$parameters['today'] = $http->postVariable( '(today)' );

foreach( $parameters as $p => $id ) {
    $pname = $p;
    $pvalue = $id;
    if( $parameters["$pname"] == '' ) {
        $parameters["$pname"] = 'null';
    }
}
posttoview( $parameterUrl, $parameters );

function posttoview( $parameterUrl, $parameters = array(), $s = '' ) {
  foreach( $parameters as $p => $id ) {
  	$pname = $p;
  	$pvalue = $id;
        if( $id != 'null' && $pvalue != '' && $pvalue != ' ' && $pvalue != '  ' )
  	$s .= '/('.$pname.')/'.$pvalue;
  }
  $location = '/'. $parameterUrl .$s;
  // die( print_r( $location ) );
  header( "Location: " . $location );
  die();
}

?>